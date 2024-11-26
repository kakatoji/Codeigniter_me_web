<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;
use App\Models\KomikModel;
use App\Models\OrangModel;

class Home extends BaseController
{
  protected $komikModel;
  protected $orang;
  public function __construct()
  {
    $this->komikModel = new KomikModel();
    $this->orangModel = new OrangModel();
  }
  public function index()
  {
    $data = [
      "title" => "Web blog",
      "orang" => $this->orangModel->findAll(),
    ];
    return view("home/index", $data);
  }
  public function about()
  {
    $data = [
      "title" => "About Me",
    ];

    return view("home/about", $data);
  }
  public function contak()
  {
    $data = [
      "title" => "contac me",
    ];

    return view("home/contak", $data);
  }
  public function komik()
  {
    #$komik = $this->komikModel->findAll();
    $data = [
      "title" => "kumpulan komik",
      "komik" => $this->komikModel->getKomik(),
    ];
    return view("home/komik", $data);
  }
  public function detail($slug)
  {
    $data = [
      "title" => "Detail komik",
      "komik" => $this->komikModel->getKomik($slug),
    ];
    if (empty($data["komik"])) {
      throw new \CodIgniter\Exceptions\PageNotFoundException(
        "Judul
      komik" .
          $slug .
          "tidak di temukan"
      );
    }
    return view("home/detail", $data);
  }
  public function create()
  {
    session();
    $data = [
      "title" => "Tambah data",
      "validation" => \Config\Services::validation(),
    ];
    return view("home/create", $data);
  }
  public function save()
  {
    //validasi input
    if (
      !$this->validate([
        "judul" => [
          "rules" => "required|is_unique[komik.judul]",
          "errors" => [
            "required" => "judul tidak boleh kosong",
            "is_unique" => "judul tidak boleh sama",
          ],
        ],
        "sampul" => [
          "rules" =>
            "max_size[sampul,5024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]",
          "errors" => [
            "max_size" => "ukuran terlalu besar",
            "is_image" => "bukan gambar",
            "mime_in" => "bukan gambar",
          ],
        ],
      ])
    ) {
      #$validation = \Config\Services::validation();
      #return redirect()->to(base_url("komik/create"))->withInput()->with("validation", $validation);
      return redirect()
        ->to(base_url("komik/create"))
        ->withInput();
    }
    //ambil gambar
    $filesampul = $this->request->getFile("sampul");
    if ($filesampul->getError() == 4) {
      $namaSmapul = "default.jpeg";
    } else {
      //generate nama sampul
      $namaSmapul = $filesampul->getRandomName();
      $filesampul->move("home/img", $namaSmapul);
      #$namaSmapul = $filesampul->getName();
    }
    $slug = url_title($this->request->getVar("judul"), "-", true);
    $this->komikModel->save([
      "judul" => $this->request->getVar("judul"),
      "slug" => $slug,
      "penulis" => $this->request->getVar("penulis"),
      "penerbit" => $this->request->getVar("penerbit"),
      "sampul" => $namaSmapul,
    ]);
    session()->setFlashdata("pesan", "Data berhasil di tambah kan");
    return redirect()->to(base_url("komik"));
  }
  public function hapus($id)
  {
    $komik = $this->komikModel->find($id);
    if ($komik["sampul"] != "default.jpeg") {
      unlink("home/img/" . $komik["sampul"]);
    }
    $this->komikModel->delete($id);
    session()->setFlashdata("pesan", "Data berhasil di hapus");
    return redirect()->to(base_url("komik"));
  }
  public function edit($slug)
  {
    $data = [
      "title" => "Ubah data",
      "validation" => \Config\Services::validation(),
      "komik" => $this->komikModel->getKomik($slug),
    ];
    return view("home/edit", $data);
  }
  public function update($id)
  {
    $komiklama = $this->komikModel->getKomik($this->request->getVar("slug"));
    if ($komiklama["judul"] == $this->request->getVar("judul")) {
      $rule_judul = "required";
    } else {
      $rule_judul = "required|is_unique[komik.judul]";
    }
    if (
      !$this->validate([
        "judul" => [
          "rules" => $rule_judul,
          "errors" => [
            "required" => "judul tidak boleh kosong",
            "is_unique" => "judul tidak boleh sama",
          ],
        ],
        "sampul" => [
          "rules" =>
            "max_size[sampul,5024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]",
          "errors" => [
            "max_size" => "ukuran terlalu besar",
            "is_image" => "bukan gambar",
            "mime_in" => "bukan gambar",
          ],
        ],
      ])
    ) {
      return redirect()
        ->to(base_url("komik/edit" . $this->request->getVar("slug")))
        ->withInput();
    }
    $filesampul = $this->request->getFile("sampul");
    if ($filesampul->getError() == 4) {
      $namaSmapul = $this->request->getVar("sampulLama");
    } else {
      $namaSmapul = $filesampul->getRandomName();
      $filesampul->move("home/img", $namaSmapul);
      unlink("home/img/" . $this->request->getVar("sampulLama"));
    }
    $slug = url_title($this->request->getVar("judul"), "-", true);
    $this->komikModel->save([
      "id" => $id,
      "judul" => $this->request->getVar("judul"),
      "slug" => $slug,
      "penulis" => $this->request->getVar("penulis"),
      "penerbit" => $this->request->getVar("penerbit"),
      "sampul" => $namaSmapul,
    ]);
    session()->setFlashdata("pesan", "Data berhasil di ubah");
    return redirect()->to(base_url("komik"));
  }
}

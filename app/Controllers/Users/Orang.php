<?php

namespace App\Controllers\Users;
use App\Controllers\BaseController;
use App\Models\OrangModel;
class Orang extends BaseController
{
  protected $orangModel;
  public function __construct()
  {
    $this->orangModel = new OrangModel();
  }
  public function index()
  {
    $curentPage = $this->request->getVar("page_orang")
      ? $this->request->getVar("page_orang")
      : 1;
    $keyword=$this->request->getVar("keyword");
    if($keyword){
      $orang = $this->orangModel->search($keyword);
    }else{
      $orang = $this->orangModel;
    }
    
    
    $data = [
      "title" => "Halaman Member",
      "orang" => $this->orangModel->paginate(4, "orang"),
      "pager" => $this->orangModel->pager,
      "curentpage" => $curentPage,
    ];
    return view("home/orang", $data);
  }
}

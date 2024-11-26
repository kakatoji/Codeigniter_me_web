<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= base_url("home") ?>/img/<?= $komik[
  "sampul"
] ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $komik["judul"] ?></h5>
        <p class="card-text"><b>Penulis  : </b><?= $komik["penulis"] ?></p>
        <p class="card-text"><b>Penerbit : </b><?= $komik["penerbit"] ?></p>
        <p class="card-text"><small class="text-body-secondary"><?= $komik[
          "created_at"
        ] ?></small></p>
        <a href="<?= base_url("komik") ?>/edit/<?= $komik['slug'];?>" class="btn btn-warning">Edit</a>
        <form action="<?= base_url("komik") ?>/<?= $komik["id"] ?>"
        method="post" class="d-inline">
          <?= csrf_field();?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" onclick="return
          confirm('yakin di hapus?');">Delete</button>
        </form>
        <br><br>
        <a href="<?= base_url("komik") ?>">Kembali ke daftar komik</a>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

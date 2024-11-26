<?= $this->extend("layout/template") ?> 
<?= $this->section("content") ?> 
<div class="container">
  <div class="row">
    <div class="col-8">
      <h2>Form Edit Data</h2>
      <?= $validation->listErrors() ?>
      <form action="<?= base_url("komik") ?>/update/<?= $komik[
  "id"
] ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="slug" value="<?= $komik["slug"] ?>">
        <input type="hidden" name="sampulLama" value="<?= $komik["sampul"] ?>">
        
        <?= csrf_field() ?>
      <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
          <input type="text" name="judul" class="form-control" id="judul"
          autofocus value="<?= old("judul")
            ? old("judul")
            : $komik["judul"] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
        <div class="col-sm-10">
          <input type="text" name="penulis" class="form-control" id="penulis"
          autofocus value="<?= old("penulis")
            ? old("penulis")
            : $komik["penulis"] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
          <input type="text" name="penerbit" class="form-control" id="penerbit"
          autofocus value="<?= old("penerbit")
            ? old("penerbit")
            : $komik["penerbit"] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="sampul" class="form-label">sampul</label>
        <div class="col-sm-2">
          <img src="<?= base_url("home") ?>/img/<?= $komik["sampul"] ?>" alt=""
          class="img-thumbnail img-preview">
        </div>
        <input class="form-control <?= $validation->hasError("sampul")
          ? "is-invalid"
          : "" ?>" type="file" name="sampul"
        id="sampul" onchange="imgPreview();">
        <div class="invalid-feedback">
          <?= $validation->getError("judul") ?>
        </div>
        </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Edit Data</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->extend("layout/template") ?> 
<?= $this->section("content") ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-2">Daftar komik</h1>
      <a href="<?= base_url(
        "komik"
      ) ?>/create" class="btn btn-primary mt">Tambah Data</a>
      <?php if (session()->getFlashdata("pesan")): ?>
      <div class="alert alert-success" role="alert"><?=
      session()->getFlashdata("pesan");?></div>
      <?php endif; ?>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">SAMPUL</th>
      <th scope="col">JUDUL</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($komik as $k): ?>
    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><img src="home/img/<?= $k["sampul"] ?>" alt="" class='sampul'></td>
      <td><?= $k["judul"] ?></td>
      <td>
        <a href="<?= base_url() ?>detail/<?= $k[
  "slug"
] ?>" class="btn btn-success">Detail</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

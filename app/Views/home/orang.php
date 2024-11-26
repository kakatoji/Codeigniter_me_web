<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1>DAFTAR MEMBER</h1>
      <form action="" method="post">
      <div class="input-group mb-3">
      <button class="btn btn-info" type="submit" id="button-addon1">Cari</button>
      <input type="text" name="keyword" class="form-control" placeholder="Cari Data.....!" aria-label="Example text with button addon"
      aria-describedby="button-addon1">
      </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col">
     <table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">NAMA</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 + 4 * ($curentpage - 1); ?>
    <?php foreach ($orang as $w): ?>
    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><?= $w["nama"] ?></td>
      <td><?= $w["alamat"] ?></td>
      <td>
        <a href=""  class="btn btn-info">Detail</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $pager->links("orang", "halaman_pagination") ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

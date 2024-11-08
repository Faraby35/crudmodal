<?php
//panggil koneksi ke database
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - MODAL BOOSTRAP 5</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
  </head>
  <body>
    <div class="container">
    <div class="mt-3">
    <h3 class="text-center">CRUD - MYSQL - BOOTSTRAP 5</h3>
    <h4 class="text-center">BY SUDFISH</h4>
    </div>

<!-- CARD -->
            <div class="card mt-3">
        <div class="card-header bg-success text-white">
            Data Mahasiswa
        </div>
        <div class="card-body bg-light">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
  Tambah Data
</button>

<!-- Tombol Search -->
<div class="card-body">
  <div class="col-md-6 mx-auto">
<form method="POST">
<div class="input-group mb-3">
  <input type="text" name="tcari" class="form-control" placeholder="Cari apa deck ... " autocomplete="off">
  <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
  <button class="btn btn-danger" name="breset" type="submit">Reset</button>
</div>
</form>
  </div>
</div>

<!-- END BUTTON -->
            <!-- TABLE -->
<table class="table table-bordered table-striped table-hover">
<tr>
    <th>No.</th>
    <th>Nim</th>
    <th>Nama Lengkap</th>
    <th>Alamat</th>
    <th>Jurusan</th>
    <th>Aksi</th>
</tr>
<!-- Persiapan menampilkan data -->
<?php
$no = 1;

//untuk pencarian data
//jika tombol cari di klik
if(isset($_POST['bcari'])){
  //tampilkan data yg di cari
  $keyword = $_POST['tcari'];
  $q = "SELECT * FROM tmhs WHERE nim like '%$keyword%' or
                                 nama like '%$keyword%' or
                                 alamat like '%$keyword%' or
                                 prodi like '%$keyword%' order by
  id_mhs desc";
} else {
  $q = "SELECT * FROM tmhs order by id_mhs desc";
}


$tampil = mysqli_query($koneksi, $q);
while($data = mysqli_fetch_array($tampil)) :
?>

<tr>
    <th><?= $no++ ?></th>
    <th><?= $data['nim']; ?></th>
    <th><?= $data['nama']; ?></th>
    <th><?= $data['alamat']; ?></th>
    <th><?= $data['prodi'] ?></th>
    <th>
        <a href="#" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop2<?= $no ?>">Ubah</a>
        <a href="#" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#staticBackdrop3<?= $no ?>">Hapus</a>
    </th>
</tr>

<!-- Awal Modal Ubah -->
<div class="modal fade" id="staticBackdrop2<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

  <!-- FORM -->
  <form method="POST" action="aksi_crud.php">
  <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']; ?>">
      <div class="modal-body">

  <div class="mb-3">
  <label class="form-label">NIM</label>
  <input type="text" class="form-control" name="tnim" value="<?= $data['nim'] ?>" placeholder="Masukkan NIM Anda">
  </div>

  <div class="mb-3">
  <label class="form-label">Nama Lengkap</label>
  <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama Lengkap Anda">
  </div>

  <div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea class="form-control" name="talamat"  rows="3"><?= $data['alamat'] ?></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Prodi</label>
    <select class="form-select" name="tprodi">
        <option value="<?= $data['prodi'] ?>"><?= $data['prodi'] ?></option>
        <option value="D4 - Manajemen Informatika">D4 - Manajemen Informatika</option>
        <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
        <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
        <option value="S1 - Pendidikan Teknologi Informasi">S1 - Pendidikan Teknologi Informasi</option>
    </select>
  </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-warning text-white" name="bubah">Ubah</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
      </div>
      </form>
      <!-- END FORM -->
    </div>
  </div>
</div>
<!-- End Modal Ubah -->

<!-- Awal Modal Hapus -->
<div class="modal fade" id="staticBackdrop3<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 " id="staticBackdropLabel">Hapus Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

  <!-- FORM -->
  <form method="POST" action="aksi_crud.php">
  <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']; ?>">
      <div class="modal-body">

  <h6 class="text-center">Apakah Anda Yakin Akan Menghapus Data ini?
  <span class="text-danger"><?= $data['nim'] ?> - <?= $data['nama'] ?></span>
  </h6>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger text-white" name="bhapus">Hapus</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
      </div>
      </form>
      <!-- END FORM -->
    </div>
  </div>
</div>
<!-- End Modal Hapus -->

<?php endwhile; ?>
</table>
<!-- TABLE END -->



<!-- Awal Modal Tambah -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


  <form method="POST" action="aksi_crud.php">
      <div class="modal-body">

  <div class="mb-3">
  <label class="form-label">NIM</label>
  <input type="text" class="form-control" name="tnim" placeholder="Masukkan NIM Anda" autocomplete="off">
  </div>

  <div class="mb-3">
  <label class="form-label">Nama Lengkap</label>
  <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Lengkap Anda">
  </div>

  <div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea class="form-control" name="talamat" rows="3"></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Prodi</label>
    <select class="form-select" name="tprodi">
        <option value=""></option>
        <option value="D4 - Manajemen Informatika">D4 - Manajemen Informatika</option>
        <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
        <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
        <option value="S1 - Pendidikan Teknologi Informasi">S1 - Pendidikan Teknologi Informasi</option>
    </select>
  </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bsimpan">Tambah</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
      </div>
      </form>

    </div>
  </div>
  </div>
<!-- End Modal Tambah -->

        </div>
        </div>
<!-- END CARD -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include 'koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit;
}

$sql = "SELECT * FROM mahasiswa INNER JOIN jurusan ON mahasiswa.jurusan_id = jurusan.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Data Mahasiswa</title>
        <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
</head>
<body>
  
    <h2>Data Mahasiswa</h2>
    
    
    <button type="button" class="btn btn-primary" onclick="window.location.href = ('tambah_mahasiswa.php')">Tambah Data</button>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Logout
</button>
<table class="table table-success table-striped">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Nomor</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
<?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['nomor']; ?></td>
            <td><?php echo $row['nama_jurusan']; ?></td>
            <td>
                <a href="edit_mahasiswa.php?id=<?php echo $row['id']; ?>"><a href="" class="btn btn-success">Edit</a></a> |
                <a href="hapus_mahasiswa.php?id=<?php echo $row['id']; ?>"><a href="" class="btn btn-danger">Hapus</a></a>
            </td>
        </tr>
<?php } ?>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin keluar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href = ('logout.php')">iya, keluarin</button>
      </div>
    </div>
  </div>
</div>
<script src="bootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn -> close(); ?>
<?php
require "Koneksi.php";
require "Model.php";

if (isset($_POST['delete'])) {
    $id_buku = $_POST['id_buku'];
    if (delete($id_buku, 'buku', 'id_buku')) {
        header("location:Buku.php");
        exit();
    } else {
        echo "Terjadi error";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Daftar Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Buku</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <a href="FormBuku.php" class="btn btn-primary">Tambah Data Baru</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = selectalldata("buku");
                while ($data = $result->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <tr>
                        <td><?php echo $data['id_buku']; ?></td>
                        <td><?php echo $data['judul_buku']; ?></td>
                        <td><?php echo $data['penulis']; ?></td>
                        <td><?php echo $data['penerbit']; ?></td>
                        <td><?php echo $data['tahun_terbit']; ?></td>
                        <td>
                            <a href="FormBuku.php?id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
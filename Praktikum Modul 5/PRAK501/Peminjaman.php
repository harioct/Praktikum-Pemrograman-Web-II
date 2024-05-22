<?php
require "Koneksi.php";
require "Model.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id_peminjaman'];
    if (delete($id, 'peminjaman', 'id_peminjaman')) {
        header("location:Peminjaman.php");
        exit();
    } else {
        echo "Terjadi error";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Daftar Peminjaman</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Peminjaman</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <a href="FormPeminjaman.php" class="btn btn-primary">Tambah Data Baru</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>ID Member</th>
                    <th>ID Buku</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = selectalldata("peminjaman");
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <tr>
                        <td><?php echo $row['id_peminjaman']; ?></td>
                        <td><?php echo $row['tgl_pinjam']; ?></td>
                        <td><?php echo $row['tgl_kembali']; ?></td>
                        <td><?php echo $row['id_member']; ?></td>
                        <td><?php echo $row['id_buku']; ?></td>
                        <td>
                            <a href="FormPeminjaman.php?id_peminjaman=<?php echo $row['id_peminjaman']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id_peminjaman" value="<?php echo $row['id_peminjaman']; ?>">
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
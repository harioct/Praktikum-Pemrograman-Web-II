<?php
require "Koneksi.php";
require "Model.php";

if (isset($_POST['delete'])) {
    $id_member = $_POST['id_member'];
    if (delete($id_member, 'member', 'id_member')) {
        header("location:Member.php");
        exit();
    } else {
        echo "Terjadi error";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Daftar Member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Member</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <a href="FormMember.php" class="btn btn-primary">Tambah Data Baru</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor Telp</th>
                    <th>Alamat</th>
                    <th>Tahun Mendaftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = selectalldata("member");
                while ($data = $result->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <tr>
                        <td><?php echo $data['id_member']; ?></td>
                        <td><?php echo $data['nama_member']; ?></td>
                        <td><?php echo $data['nomor_member']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['tgl_mendaftar']; ?></td>
                        <td><?php echo $data['tgl_terakhir_bayar'] ?></td>
                        <td>
                            <a href="FormMember.php?id_member=<?php echo $data['id_member']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="Member.php" style="display:inline-block;">
                                <input type="hidden" name="id_member" value="<?php echo $data['id_member']; ?>">
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
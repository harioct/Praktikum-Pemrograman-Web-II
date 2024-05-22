<?php
require "Koneksi.php";
require "Model.php";

if (isset($_POST['submit'])) {
    $data = array(
        "id_peminjaman" => $_POST['id_peminjaman'],
        "tgl_pinjam" => $_POST['tgl_pinjam'],
        "tgl_kembali" => $_POST['tgl_kembali'],
        "id_member" => $_POST['id_member'],
        "id_buku" => $_POST['id_buku']
    );
    insert($data, 'peminjaman');
    header('location:Peminjaman.php');
    exit();
}

$id = isset($_GET['id_peminjaman']) ? $_GET['id_peminjaman'] : '';
$data = selectdatabyid("peminjaman", $id, "id_peminjaman");

if (isset($_POST['edit'])) {
    $data = array(
        "id_peminjaman" => $_POST['id_peminjaman'],
        "tgl_pinjam" => $_POST['tgl_pinjam'],
        "tgl_kembali" => $_POST['tgl_kembali'],
        "id_member" => $_POST['id_member'],
        "id_buku" => $_POST['id_buku']
    );
    update($data, 'peminjaman', $id, "id_peminjaman");
    header("location:Peminjaman.php");
    exit();
}

if (isset($_POST['kembali'])) {
    header("location:Peminjaman.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Form Peminjaman</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php if (isset($_GET['id_peminjaman'])) : ?>
            <h1 style="text-align: center;" class="mt-2">Edit Peminjaman</h1>
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <form method="POST">
                        <div class="mb-3 mt-3">
                            <label class="form-label">ID</label>
                            <input type="text" name="id_peminjaman" value="<?php echo $data['id_peminjaman']; ?>" placeholder="Masukkan ID Peminjaman" required class="form-control col-form-label-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Peminjaman</label>
                            <input type="date" name="tgl_pinjam" value="<?php echo $data['tgl_pinjam']; ?>" placeholder="Masukkan Tanggal Peminjaman" required class="form-control col-form-label-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" value="<?php echo $data['tgl_kembali']; ?>" placeholder="Masukkan Tanggal Kembali" required class="form-control col-form-label-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih ID Member</label>
                            <select class="form-select form-control" id="id_member" name="id_member">
                                <?php
                                $result = selectalldata("member");
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['id_member'] . '"' . ($row['id_member'] == $data['id_member'] ? ' selected' : '') . '>' . $row['id_member'] . ' - ' . $row['nama_member'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih ID Buku</label>
                            <select class="form-select form-control" id="id_buku" name="id_buku">
                                <?php
                                $result = selectalldata("buku");
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['id_buku'] . '"' . ($row['id_buku'] == $data['id_buku'] ? ' selected' : '') . '>' . $row['id_buku'] . ' - ' . $row['judul_buku'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="edit" onclick="return confirm('Simpan perubahan?')">Submit</button>
                        <a href="Peminjaman.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        <?php else : ?>
            <h1 style="text-align: center;" class="mt-2">Tambah Peminjaman</h1>
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <form method="POST">
                        <div class="mb-3 mt-3">
                            <label class="form-label">ID</label>
                            <input type="text" name="id_peminjaman" placeholder="Masukkan ID Peminjaman" required class="form-control col-form-label-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Peminjaman</label>
                            <input type="date" name="tgl_pinjam" placeholder="Masukkan Tanggal Peminjaman" required class="form-control col-form-label-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" placeholder="Masukkan Tanggal Kembali" required class="form-control col-form-label-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih ID Member</label>
                            <select class="form-select form-control" id="id_member" name="id_member" required>
                                <option value="" selected disabled hidden>--Pilih Member--</option>
                                <?php
                                $result = selectalldata("member");
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['id_member'] . '">' . $row['id_member'] . ' - ' . $row['nama_member'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih ID Buku</label>
                            <select class="form-select form-control" id="id_buku" name="id_buku" required>
                                <option value="" selected disabled hidden>--Pilih Buku--</option>
                                <?php
                                $result = selectalldata("buku");
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['id_buku'] . '">' . $row['id_buku'] . ' - ' . $row['judul_buku'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Tambah data?')">Submit</button>
                        <a href="Peminjaman.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
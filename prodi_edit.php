<?php
require_once "Prodi.php";

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: prodi.php");
    exit;
}

$prodi = new Prodi();
$data  = $prodi->edit($id);

if ($data === false) {
    header("Location: prodi.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Prodi</title>
</head>
<body>

    <h2>Edit Program Studi</h2>

    <form action="proses_prodi.php?action=update" method="POST">
        <input type="hidden" name="prodi_id" value="<?= (int) $data['prodi_id'] ?>">

        <label for="prodi_kode">Kode Prodi</label>
        <input type="text" name="prodi_kode" id="prodi_kode"
               value="<?= htmlspecialchars($data['prodi_kode']) ?>" required>

        <label for="prodi_nama">Nama Prodi</label>
        <input type="text" name="prodi_nama" id="prodi_nama"
               value="<?= htmlspecialchars($data['prodi_nama']) ?>" required>

        <button type="submit">Update</button>
        <a href="prodi.php">Kembali</a>
    </form>

</body>
</html>

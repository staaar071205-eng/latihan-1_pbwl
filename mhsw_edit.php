<?php
require_once "Mahasiswa.php";

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$mhsw = new Mahasiswa();
$data = $mhsw->edit($id);

if ($data === false) {
    header("Location: index.php");
    exit;
}

$daftarProdi = $mhsw->daftarProdi();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>

    <h2>Edit Mahasiswa</h2>

    <form action="proses.php?action=update" method="POST">
        <input type="hidden" name="mhsw_id" value="<?= (int) $data['mhsw_id'] ?>">

        <label for="mhsw_nim">NIM</label>
        <input type="text" name="mhsw_nim" id="mhsw_nim"
               value="<?= htmlspecialchars($data['mhsw_nim']) ?>" required>

        <label for="mhsw_nama">Nama</label>
        <input type="text" name="mhsw_nama" id="mhsw_nama"
               value="<?= htmlspecialchars($data['mhsw_nama']) ?>" required>

        <label for="prodi_id">Program Studi</label>
        <select name="prodi_id" id="prodi_id" required>
            <option value="">-- Pilih Prodi --</option>
            <?php foreach ($daftarProdi as $p) : ?>
                <option value="<?= (int) $p['prodi_id'] ?>"
                    <?= ((int) $data['prodi_id'] === (int) $p['prodi_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($p['prodi_nama']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="mhsw_alamat">Alamat</label>
        <textarea name="mhsw_alamat" id="mhsw_alamat" rows="3" required><?=
            htmlspecialchars($data['mhsw_alamat'] ?? '') ?></textarea>

        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>

</body>
</html>

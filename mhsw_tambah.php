<?php
require_once "Mahasiswa.php";

$mhsw        = new Mahasiswa();
$daftarProdi = $mhsw->daftarProdi();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>

    <h2>Tambah Mahasiswa</h2>

    <form action="proses.php?action=simpan" method="POST">
        <label for="mhsw_nim">NIM</label>
        <input type="text" name="mhsw_nim" id="mhsw_nim" required>

        <label for="mhsw_nama">Nama</label>
        <input type="text" name="mhsw_nama" id="mhsw_nama" required>

        <label for="prodi_id">Program Studi</label>
        <select name="prodi_id" id="prodi_id" required>
            <option value="">-- Pilih Prodi --</option>
            <?php foreach ($daftarProdi as $p) : ?>
                <option value="<?= (int) $p['prodi_id'] ?>">
                    <?= htmlspecialchars($p['prodi_nama']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="mhsw_alamat">Alamat</label>
        <textarea name="mhsw_alamat" id="mhsw_alamat" rows="3" required></textarea>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>

</body>
</html>

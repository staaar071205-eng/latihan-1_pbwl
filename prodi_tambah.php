<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Prodi</title>
</head>
<body>

    <h2>Tambah Program Studi</h2>

    <form action="proses_prodi.php?action=simpan" method="POST">
        <label for="prodi_kode">Kode Prodi</label>
        <input type="text" name="prodi_kode" id="prodi_kode" required>

        <label for="prodi_nama">Nama Prodi</label>
        <input type="text" name="prodi_nama" id="prodi_nama" required>

        <button type="submit">Simpan</button>
        <a href="prodi.php">Kembali</a>
    </form>

</body>
</html>

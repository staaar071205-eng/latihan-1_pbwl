<?php
require_once "Prodi.php";

$prodi  = new Prodi();
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'simpan':
        $prodi->simpan(
            trim($_POST['prodi_kode'] ?? ''),
            trim($_POST['prodi_nama'] ?? '')
        );
        break;

    case 'update':
        $prodi->update(
            (int) ($_POST['prodi_id'] ?? 0),
            trim($_POST['prodi_kode'] ?? ''),
            trim($_POST['prodi_nama'] ?? '')
        );
        break;

    case 'delete':
        $id = (int) ($_GET['id'] ?? 0);
        if ($id > 0) {
            $prodi->delete($id);
        }
        break;

    default:
        die("Aksi tidak valid.");
}

header("Location: prodi.php");
exit;

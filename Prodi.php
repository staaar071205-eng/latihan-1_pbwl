<?php
require_once "Model.php";

class Prodi extends Model
{
    public function tampil(): array
    {
        $sql  = "SELECT * FROM tb_prodi ORDER BY prodi_id DESC";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function simpan(string $kode, string $nama): void
    {
        $sql = "INSERT INTO tb_prodi (prodi_kode, prodi_nama)
                VALUES (:prodi_kode, :prodi_nama)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":prodi_kode" => $kode,
            ":prodi_nama" => $nama,
        ]);
    }

    public function edit(int $id): array|false
    {
        $sql  = "SELECT * FROM tb_prodi WHERE prodi_id = :prodi_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":prodi_id" => $id]);

        return $stmt->fetch();
    }

    public function update(int $id, string $kode, string $nama): void
    {
        $sql = "UPDATE tb_prodi
                   SET prodi_kode = :prodi_kode,
                       prodi_nama = :prodi_nama
                 WHERE prodi_id   = :prodi_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":prodi_kode" => $kode,
            ":prodi_nama" => $nama,
            ":prodi_id"   => $id,
        ]);
    }

    public function delete(int $id): void
    {
        $sql  = "DELETE FROM tb_prodi WHERE prodi_id = :prodi_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":prodi_id" => $id]);
    }
}

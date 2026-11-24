<?php
require_once "Model.php";

class Mahasiswa extends Model
{
    // Menampilkan seluruh data mahasiswa beserta nama program studinya
    public function tampil(): array
    {
        $sql = "SELECT m.*, p.prodi_nama
                  FROM tb_mhsw m
                  LEFT JOIN tb_prodi p ON m.prodi_id = p.prodi_id
                 ORDER BY m.mhsw_id DESC";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    // Menyimpan data mahasiswa baru
    public function simpan(string $nim, string $nama, string $alamat, ?int $prodiId): void
    {
        $sql = "INSERT INTO tb_mhsw (mhsw_nim, mhsw_nama, mhsw_alamat, prodi_id)
                VALUES (:mhsw_nim, :mhsw_nama, :mhsw_alamat, :prodi_id)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":mhsw_nim"    => $nim,
            ":mhsw_nama"   => $nama,
            ":mhsw_alamat" => $alamat,
            ":prodi_id"    => $prodiId,
        ]);
    }

    // Mengambil satu data mahasiswa berdasarkan id
    public function edit(int $id): array|false
    {
        $sql  = "SELECT * FROM tb_mhsw WHERE mhsw_id = :mhsw_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":mhsw_id" => $id]);

        return $stmt->fetch();
    }

    // Memperbarui data mahasiswa
    public function update(int $id, string $nim, string $nama, string $alamat, ?int $prodiId): void
    {
        $sql = "UPDATE tb_mhsw
                   SET mhsw_nim     = :mhsw_nim,
                       mhsw_nama    = :mhsw_nama,
                       mhsw_alamat  = :mhsw_alamat,
                       prodi_id     = :prodi_id
                 WHERE mhsw_id      = :mhsw_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":mhsw_nim"    => $nim,
            ":mhsw_nama"   => $nama,
            ":mhsw_alamat" => $alamat,
            ":prodi_id"    => $prodiId,
            ":mhsw_id"     => $id,
        ]);
    }

    // Menghapus data mahasiswa
    public function delete(int $id): void
    {
        $sql  = "DELETE FROM tb_mhsw WHERE mhsw_id = :mhsw_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":mhsw_id" => $id]);
    }

    // Mengambil daftar prodi untuk dropdown form
    public function daftarProdi(): array
    {
        $sql  = "SELECT prodi_id, prodi_nama FROM tb_prodi ORDER BY prodi_nama";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }
}

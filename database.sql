CREATE DATABASE IF NOT EXISTS dbakademik
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE dbakademik1;

CREATE TABLE tb_prodi (
    prodi_id    INT UNSIGNED NOT NULL AUTO_INCREMENT,
    prodi_kode  VARCHAR(10)  NOT NULL,
    prodi_nama  VARCHAR(100) NOT NULL,
    PRIMARY KEY (prodi_id),
    UNIQUE KEY uq_prodi_kode (prodi_kode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_prodi (prodi_kode, prodi_nama) VALUES
('TI', 'Teknik Informatika'),
('SI', 'Sistem Informasi'),
('MI', 'Manajemen Informatika');

CREATE TABLE tb_mhsw (
    mhsw_id     INT UNSIGNED NOT NULL AUTO_INCREMENT,
    mhsw_nim    VARCHAR(25)  NOT NULL,
    mhsw_nama   VARCHAR(100) NOT NULL,
    mhsw_alamat TEXT,
    PRIMARY KEY (mhsw_id),
    UNIQUE KEY uq_mhsw_nim (mhsw_nim)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE tb_mhsw
    ADD COLUMN prodi_id INT UNSIGNED NULL AFTER mhsw_nim,
    ADD CONSTRAINT fk_mhsw_prodi
        FOREIGN KEY (prodi_id) REFERENCES tb_prodi(prodi_id)
        ON UPDATE CASCADE
        ON DELETE SET NULL;
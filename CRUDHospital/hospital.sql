CREATE DATABASE IF NOT EXISTS hospital;
USE hospital;

create table if not exists Dokter(
	id_dokter varchar(6) not null primary key,
	nama_dokter varchar(25) not null,
	id_spesialisasi varchar(6) not null,
	telp varchar(15));

create table if not exists Pasien(
	id_pasien varchar(6) not null primary key,
	nama_pasien varchar(25) not null,
	kelamin varchar(1) not null,
	alamat varchar(40),
	telp varchar(15));

create table if not exists Obat(
	id_obat varchar(6) not null primary key,
	nama_obat varchar(25) not null);

create table if not exists Konsultasi(
	id_konsultasi varchar(6) not null primary key,
	id_dokter varchar(6) not null,
	id_pasien varchar(6) not null,
	id_obat varchar(6),
	keterangan varchar(40));

create table if not exists Spesialisasi(
	id_spesialisasi varchar(6) not null primary key,
	nama_spesialisasi varchar(25) not null);

ALTER TABLE konsultasi 
   ADD FOREIGN KEY (id_dokter) REFERENCES dokter (id_dokter),
   ADD FOREIGN KEY (id_pasien) REFERENCES pasien (id_pasien),
   ADD FOREIGN KEY (id_obat) REFERENCES obat (id_obat);
ALTER TABLE dokter
   ADD FOREIGN KEY (id_spesialisasi) REFERENCES spesialisasi (id_spesialisasi);
   
insert into spesialisasi(id_spesialisasi,nama_spesialisasi) values
('SPS001','Penyakit Dalam'),
('SPS002','Saraf'),
('SPS003','Anak'),
('SPS004','Kandungan'),
('SPS005','Bedah'),
('SPS006','Kulit dan Kelamin'),
('SPS007','THT'),
('SPS008','Mata'),
('SPS009','Psikiater'),
('SPS010','Gigi');

insert into dokter(id_dokter,nama_dokter,id_spesialisasi,telp) values
('DKR001','Ivan','SPS003','08123425423'),
('DKR002','Abdul','SPS009','08136573857'),
('DKR003','Anissa','SPS004','08137583657');

insert into pasien(id_pasien,nama_pasien,kelamin,alamat,telp) values
('PSN001','Jack','L','Jakarta','08164647245'),
('PSN002','Ali','L','Bandung','08145738563'),
('PSN003','Thoaf','L','Jayapura','08154926573');

insert into obat(id_obat,nama_obat) values
('OBT001','Paracetamol'),
('OBT002','Antibiotik'),
('OBT003','Dexamethasone');

insert into konsultasi(id_konsultasi,id_dokter,id_pasien,id_obat,keterangan) values
('KSI001','DKR002','PSN003','OBT001','Batuk Ringan');


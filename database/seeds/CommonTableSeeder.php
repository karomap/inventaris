<?php

use App\Bidang;
use App\Golongan;
use App\Kelompok;
use Illuminate\Database\Seeder;

class CommonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Golongan::insert([
          ['id' => '01', 'golongan' => '01', 'uraian' => 'GOLONGAN TANAH'],
          ['id' => '02', 'golongan' => '02', 'uraian' => 'GOLONGAN PERALATAN DAN MESIN'],
          ['id' => '03', 'golongan' => '03', 'uraian' => 'GOLONGAN GEDUNG DAN BANGUNAN'],
          ['id' => '04', 'golongan' => '04', 'uraian' => 'GOLONGAN JALAN, IRIGASI DAN JARINGAN'],
          ['id' => '05', 'golongan' => '05', 'uraian' => 'GOLONGAN ASSET TETAP LAINNYA'],
          ['id' => '06', 'golongan' => '06', 'uraian' => 'GOLONGAN KONSTRUKSI DLM PENGERJAAN']
        ]);

        Bidang::insert([
          ['id_gol' => '01', 'bidang' => '01', 'id' => '0101', 'uraian' => 'TANAH'],
          ['id_gol' => '02', 'bidang' => '01', 'id' => '0201', 'uraian' => 'ALAT-ALAT BESAR'],
          ['id_gol' => '02', 'bidang' => '02', 'id' => '0202', 'uraian' => 'ALAT-ALAT ANGKUTAN'],
          ['id_gol' => '02', 'bidang' => '03', 'id' => '0203', 'uraian' => 'ALAT BENGKEL DAN ALAT UKUR'],
          ['id_gol' => '02', 'bidang' => '04', 'id' => '0204', 'uraian' => 'ALAT PERTANIAN'],
          ['id_gol' => '02', 'bidang' => '05', 'id' => '0205', 'uraian' => 'ALAT KANTOR DAN RUMAH TANGGA'],
          ['id_gol' => '02', 'bidang' => '06', 'id' => '0206', 'uraian' => 'ALAT STUDIO DAN ALAT KOMUNIKASI'],
          ['id_gol' => '02', 'bidang' => '07', 'id' => '0207', 'uraian' => 'ALAT-ALAT KEDOKTERAN'],
          ['id_gol' => '02', 'bidang' => '08', 'id' => '0208', 'uraian' => 'ALAT LABORATORIM'],
          ['id_gol' => '02', 'bidang' => '09', 'id' => '0209', 'uraian' => 'ALAT-ALAT PERSENJATAAN/KEAMANAN'],
          ['id_gol' => '03', 'bidang' => '01', 'id' => '0301', 'uraian' => 'BANGUNAN GEDUNG'],
          ['id_gol' => '03', 'bidang' => '02', 'id' => '0302', 'uraian' => 'MONUMEN'],
          ['id_gol' => '04', 'bidang' => '01', 'id' => '0401', 'uraian' => 'JALAN DAN JEMBATAN'],
          ['id_gol' => '04', 'bidang' => '02', 'id' => '0402', 'uraian' => 'BANGUNAN AIR/IRIGASI'],
          ['id_gol' => '04', 'bidang' => '03', 'id' => '0403', 'uraian' => 'INSTALASI'],
          ['id_gol' => '04', 'bidang' => '04', 'id' => '0404', 'uraian' => 'JARINGAN'],
          ['id_gol' => '05', 'bidang' => '01', 'id' => '0501', 'uraian' => 'BUKU DAN PERPUSTAKAAN'],
          ['id_gol' => '05', 'bidang' => '02', 'id' => '0502', 'uraian' => 'BARANG BERCORAK KEBUDAYAAN'],
          ['id_gol' => '05', 'bidang' => '03', 'id' => '0503', 'uraian' => 'HEWAN DAN TERNAK SERTA TANAMAN']
        ]);

        Kelompok::insert([
          ['id_bidang' => '0101', 'id' => '010101', 'uraian' => 'PERKAMPUNGAN'],
          ['id_bidang' => '0101', 'id' => '010102', 'uraian' => 'TANAH PERTANIAN'],
          ['id_bidang' => '0101', 'id' => '010103', 'uraian' => 'TANAH PERKEBUNAN'],
          ['id_bidang' => '0101', 'id' => '010104', 'uraian' => 'KEBUN CAMPURAN'],
          ['id_bidang' => '0101', 'id' => '010105', 'uraian' => 'HUTAN'],
          ['id_bidang' => '0101', 'id' => '010106', 'uraian' => 'KOLAM IKAN'],
          ['id_bidang' => '0101', 'id' => '010107', 'uraian' => 'DANAU/RAWA'],
          ['id_bidang' => '0101', 'id' => '010108', 'uraian' => 'TANAH TANDUS/RUSAK'],
          ['id_bidang' => '0101', 'id' => '010109', 'uraian' => 'ALANG-ALANG DAN PADANG RUMPUT'],
          ['id_bidang' => '0101', 'id' => '010110', 'uraian' => 'TANAH PENGGUNA LAIN'],
          ['id_bidang' => '0101', 'id' => '010111', 'uraian' => 'TANAH UNTUK BANGUNAN GEDUNG'],
          ['id_bidang' => '0101', 'id' => '010112', 'uraian' => 'TANAH PERTAMBANGAN'],
          ['id_bidang' => '0101', 'id' => '010113', 'uraian' => 'TANAH UNTUK BANGUNAN BUKAN GEDUNG'],
          ['id_bidang' => '0201', 'id' => '020101', 'uraian' => 'ALAT -ALAT BESAR DARAT'],
          ['id_bidang' => '0201', 'id' => '020102', 'uraian' => 'ALAT-ALAT BESAR APUNG'],
          ['id_bidang' => '0201', 'id' => '020103', 'uraian' => 'ALAT-ALAT BANTU'],
          ['id_bidang' => '0202', 'id' => '020201', 'uraian' => 'ALAT ANGKUTAN DARAT BERMOTOR'],
          ['id_bidang' => '0202', 'id' => '020202', 'uraian' => 'ALAT ANGKUTAN BERAT TAK BERMOTOR'],
          ['id_bidang' => '0202', 'id' => '020203', 'uraian' => 'ALAT ANGKUT APUNG BERMOTOR'],
          ['id_bidang' => '0202', 'id' => '020204', 'uraian' => 'ALAT ANGKUT APUNG TAK BERMOTOR'],
          ['id_bidang' => '0202', 'id' => '020205', 'uraian' => 'ALAT ANGKUT UDARA BERMOTOR'],
          ['id_bidang' => '0203', 'id' => '020301', 'uraian' => 'ALAT BENGKEL BERMESIN'],
          ['id_bidang' => '0203', 'id' => '020302', 'uraian' => 'ALAT BENGKEL TAK BERMESIN'],
          ['id_bidang' => '0203', 'id' => '020303', 'uraian' => 'ALAT UKUR'],
          ['id_bidang' => '0204', 'id' => '020401', 'uraian' => 'ALAT PENGOLAHAN'],
          ['id_bidang' => '0204', 'id' => '020402', 'uraian' => 'ALAT PEMELIHARAAN TANAMAN/ALAT PENYIMPANAN'],
          ['id_bidang' => '0205', 'id' => '020501', 'uraian' => 'ALAT KANTOR'],
          ['id_bidang' => '0205', 'id' => '020502', 'uraian' => 'ALAT RUMAH TANGGA'],
          ['id_bidang' => '0205', 'id' => '020503', 'uraian' => 'KOMPUTER'],
          ['id_bidang' => '0205', 'id' => '020504', 'uraian' => 'MEJA DAN KURSI KERJA/RAPAT PEJABAT'],
          ['id_bidang' => '0206', 'id' => '020601', 'uraian' => 'ALAT STUDIO'],
          ['id_bidang' => '0206', 'id' => '020602', 'uraian' => 'ALAT KOMUNIKASI'],
          ['id_bidang' => '0206', 'id' => '020603', 'uraian' => 'PERALATAN PEMANCAR'],
          ['id_bidang' => '0207', 'id' => '020701', 'uraian' => 'ALAT KEDOKTERAN'],
          ['id_bidang' => '0207', 'id' => '020702', 'uraian' => 'ALAT KESEHATAN'],
          ['id_bidang' => '0208', 'id' => '020801', 'uraian' => 'UNIT UNIT LABORATORIUM'],
          ['id_bidang' => '0208', 'id' => '020802', 'uraian' => 'ALAT PERAGA / PRAKTEK SEKOLAH'],
          ['id_bidang' => '0208', 'id' => '020803', 'uraian' => 'UNIT ALAT LABORATORIUM KIMIA NUKLIR'],
          ['id_bidang' => '0208', 'id' => '020804', 'uraian' => 'ALAT LABORATORIUM FISIKA NUKLIR /'],
          ['id_bidang' => '0208', 'id' => '020805', 'uraian' => 'ALAT PROTEKSI RADIASI / PROTEKSI'],
          ['id_bidang' => '0208', 'id' => '020806', 'uraian' => 'RADIATION APPLICATION AND NON DESTRUCTIVE'],
          ['id_bidang' => '0208', 'id' => '020807', 'uraian' => 'ALAT LABORATORIUM LINGKUNGAN HIDUP'],
          ['id_bidang' => '0208', 'id' => '020808', 'uraian' => 'PERALATAN LABORATORIUM HIDRODINAMIKA'],
          ['id_bidang' => '0209', 'id' => '020901', 'uraian' => 'SENJATA API'],
          ['id_bidang' => '0209', 'id' => '020902', 'uraian' => 'PERSENJATAAN NON SENJATA API'],
          ['id_bidang' => '0209', 'id' => '020903', 'uraian' => 'AMUNIISI'],
          ['id_bidang' => '0209', 'id' => '020904', 'uraian' => 'SENJATA SINAR'],
          ['id_bidang' => '0301', 'id' => '030101', 'uraian' => 'BANGUNAN GEDUNG TEMPAT KERJA'],
          ['id_bidang' => '0301', 'id' => '030102', 'uraian' => 'BANGUNAN GEDUNG TEMPAT TINGGAL'],
          ['id_bidang' => '0301', 'id' => '030103', 'uraian' => 'BANGUNAN MENARA'],
          ['id_bidang' => '0302', 'id' => '030201', 'uraian' => 'BANGUNAN BERSEJARAH'],
          ['id_bidang' => '0302', 'id' => '030202', 'uraian' => 'TUGU PERINGATAN'],
          ['id_bidang' => '0302', 'id' => '030203', 'uraian' => 'CANDI'],
          ['id_bidang' => '0302', 'id' => '030204', 'uraian' => 'MONUMEN/BANUNAN BERSEJARAH'],
          ['id_bidang' => '0302', 'id' => '030205', 'uraian' => 'TUGU PERINGATAN'],
          ['id_bidang' => '0302', 'id' => '030206', 'uraian' => 'TUGU TITIK KONTROL/PASTI'],
          ['id_bidang' => '0302', 'id' => '030207', 'uraian' => 'RAMBU-RAMBU'],
          ['id_bidang' => '0302', 'id' => '030208', 'uraian' => 'RAMBU-RAMBU LALU LINTAS UDARA'],
          ['id_bidang' => '0401', 'id' => '040101', 'uraian' => 'JALAN'],
          ['id_bidang' => '0401', 'id' => '040102', 'uraian' => 'JEMBATAN'],
          ['id_bidang' => '0402', 'id' => '040201', 'uraian' => 'BANGUNAN AIR IRIGASI'],
          ['id_bidang' => '0402', 'id' => '040202', 'uraian' => 'BANGUNAN AIR PASANG SURUT'],
          ['id_bidang' => '0402', 'id' => '040203', 'uraian' => 'BANGUNAN AIR PASANG SURUT LAINNYA'],
          ['id_bidang' => '0402', 'id' => '040204', 'uraian' => 'BANGUNAN PENGAMAN SUNGAI'],
          ['id_bidang' => '0402', 'id' => '040205', 'uraian' => 'BANGUNAN PENGEMBANGAN SUMBER AIR DAN AIR TANAH'],
          ['id_bidang' => '0402', 'id' => '040206', 'uraian' => 'BANGUNAN AIR BERSIH/BAKU'],
          ['id_bidang' => '0402', 'id' => '040207', 'uraian' => 'BANGUNAN AIR KOTOR'],
          ['id_bidang' => '0402', 'id' => '040208', 'uraian' => 'BANGUNAN AIR'],
          ['id_bidang' => '0403', 'id' => '040301', 'uraian' => 'INSTALASI AIR MINUM/BERSIH'],
          ['id_bidang' => '0403', 'id' => '040302', 'uraian' => 'INSTALASI AIR KOTOR'],
          ['id_bidang' => '0403', 'id' => '040303', 'uraian' => 'INSTALASI PENGOLAHAN SAMPAH NON ORGANIK'],
          ['id_bidang' => '0403', 'id' => '040304', 'uraian' => 'INSTALASI PENGOLAHAN BAHAN BANGUNAN'],
          ['id_bidang' => '0403', 'id' => '040305', 'uraian' => 'INSTALASI PEMBANGKIT LISTRIK'],
          ['id_bidang' => '0403', 'id' => '040306', 'uraian' => 'INSTALASI GARDU LISTRIK'],
          ['id_bidang' => '0403', 'id' => '040307', 'uraian' => 'INSTALASI PERTAHANAN'],
          ['id_bidang' => '0403', 'id' => '040308', 'uraian' => 'INSTALASI GAS'],
          ['id_bidang' => '0403', 'id' => '040309', 'uraian' => 'INSTALASI PENGAMAN'],
          ['id_bidang' => '0404', 'id' => '040401', 'uraian' => 'JARINGAN AIR MINUM'],
          ['id_bidang' => '0404', 'id' => '040402', 'uraian' => 'JARINGAN LISTRIK'],
          ['id_bidang' => '0404', 'id' => '040403', 'uraian' => 'JARINGAN TELEPON'],
          ['id_bidang' => '0404', 'id' => '040404', 'uraian' => 'JARINGAN GAS'],
          ['id_bidang' => '0501', 'id' => '050101', 'uraian' => 'BUKU'],
          ['id_bidang' => '0501', 'id' => '050102', 'uraian' => 'BUKU LAINNYA'],
          ['id_bidang' => '0501', 'id' => '050103', 'uraian' => 'BARANG-BARANG PERPUSTAKAAN'],
          ['id_bidang' => '0502', 'id' => '050201', 'uraian' => 'BARANG BERCORAK KEBUDAYAAN'],
          ['id_bidang' => '0502', 'id' => '050202', 'uraian' => 'ALAT OLAH RAGA LAINNYA'],
          ['id_bidang' => '0503', 'id' => '050301', 'uraian' => 'HEWAN'],
          ['id_bidang' => '0503', 'id' => '050302', 'uraian' => 'TANAMAN']
        ]);
    }
}

composer install --ignore-platform-reqs


SELECT t_puskes.id_puskes, t_desa.nama_desa, t_puskes.nama_puskes, t_puskes.jumlah_balita, t_puskes.pendek, t_puskes.sangat_pendek,
SUM(t_puskes.pendek + t_puskes.sangat_pendek) AS total FROM t_puskes INNER JOIN t_desa ON t_desa.id_desa=t_puskes.id_desa
GROUP BY id_puskes;


SELECT t_puskes.id_puskes, t_puskes.nama_puskes, t_puskes.alamat, t_desa.nama_desa, t_desa.kd_kecamatan,t_puskes.status,
SUM(t_balita.hasil) AS total FROM t_puskes 

LEFT JOIN t_balita
ON t_balita.id_puskes=t_puskes.id_puskes

RIGHT JOIN t_desa
ON t_desa.kd_desa=t_puskes.kd_desa
GROUP BY id_puskes



            $selesai_dipinjam = Peminjaman::select(DB::raw('count(*) as count, tanggal_pengembalian'))
                ->groupBy('tanggal_pengembalian')
                ->whereMonth('tanggal_pengembalian', $bulan)
                ->whereYear('tanggal_pengembalian', $tahun)
                ->where('status', 3)
                ->get();

$puskes = Puskes::select(DB::raw('count(+) as count, id_puskes'))
    ->groupBy('id_puskes')
    

SELECT t_balita.id_balita, t_balita.nama_balita, t_jenkel.jenis_kelamin,  t_balita.tgl_lahir,  t_balita.tb_lahir,
 t_balita.bb_lahir,  t_balita.nama_ortu, t_puskes.nama_puskes, t_balita.alamat, t_balita.tgl_pengukuran, t_balita.tb, t_balita.bb,
 t_balita.hasil
FROM t_balita
RIGHT JOIN t_jenkel ON t_balita.id_jenis_kelamin = t_jenkel.id_jk
RIGHT JOIN t_puskes ON t_balita.id_puskes = t_puskes.id_puskes

SELECT t_balita.id_balita, t_balita.nama_balita, t_jenkel.jenis_kelamin,  t_balita.tgl_lahir,  t_balita.tb_lahir,
 t_balita.bb_lahir,  t_balita.nama_ortu, t_puskes.nama_puskes, t_desa.nama_desa, t_balita.alamat, t_balita.tgl_pengukuran, t_balita.tb, t_balita.bb,
 t_balita.hasil
FROM t_balita
RIGHT JOIN t_jenkel ON t_balita.id_jenis_kelamin = t_jenkel.id_jk
RIGHT JOIN t_puskes ON t_balita.id_puskes = t_puskes.id_puskes
RIGHT JOIN t_puskes ON t_puskes.kd_desa = t_desa.kd_desa


SELECT t_kecamatan.kd_kecamatan, t_kecamatan.nama_kecamatan, t_desa.nama_desa
FROM t_kecamatan
RIGHT JOIN t_desa
ON t_kecamatan.kd_kecamatan = t_desa.kd_kecamatan
INNER JOIN t_puskes
ON t_desa.kd_desa = t_puskes.kd_desa


SELECT t_kecamatan.kd_kecamatan, t_kecamatan.nama_kecamatan, t_kecamatan.latitude, t_kecamatan.longitude,
 t_kecamatan.gambar, t_desa.nama_desa, t_balita.nama_balita
FROM t_kecamatan
RIGHT JOIN t_desa
ON t_kecamatan.kd_kecamatan = t_desa.kd_kecamatan
INNER JOIN t_puskes
ON t_desa.kd_desa = t_puskes.kd_desa
INNER JOIN t_balita
ON t_puskes.id_puskes = t_balita.id_puskes


SELECT t_kecamatan.kd_kecamatan, t_kecamatan.nama_kecamatan, t_kecamatan.latitude, t_kecamatan.longitude,
 t_kecamatan.gambar, t_desa.nama_desa, t_balita.nama_balita, SUM(t_balita.hasil) AS total
FROM t_kecamatan
RIGHT JOIN t_desa
ON t_kecamatan.kd_kecamatan = t_desa.kd_kecamatan
INNER JOIN t_puskes
ON t_desa.kd_desa = t_puskes.kd_desa
INNER JOIN t_balita
ON t_puskes.id_puskes = t_balita.id_puskes


SELECT t_kecamatan.kd_kecamatan, t_kecamatan.nama_kecamatan, t_kecamatan.latitude, t_kecamatan.longitude,
 t_kecamatan.gambar, t_desa.nama_desa, t_balita.nama_balita, SUM(t_balita.hasil) AS total, t_balita.hasil = "pendek" AS pendek, t_balita.hasil = "sangat pendek" AS sangat_pendek
FROM t_kecamatan
RIGHT JOIN t_desa
ON t_kecamatan.kd_kecamatan = t_desa.kd_kecamatan
INNER JOIN t_puskes
ON t_desa.kd_desa = t_puskes.kd_desa
INNER JOIN t_balita
ON t_puskes.id_puskes = t_balita.id_puskes
GROUP BY kd_kecamatan

SELECT t_puskes.nama_puskes, t_desa.nama_desa, t_kecamatan.nama_kecamatan, SUM(t_balita.hasil) AS total
FROM t_balita

RIGHT JOIN t_puskes
ON t_balita.id_puskes=t_puskes.id_puskes
RIGHT JOIN t_desa
ON t_balita.kode_desa=t_desa.kd_desa
RIGHT JOIN t_kecamatan
ON t_desa.kd_kecamatan=t_kecamatan.kd_kecamatan
GROUP BY kode_desa

SUM(t_balita.hasil) AS total, 
SUM(t_balita.hasil = "pendek") AS pendek, SUM(t_balita.hasil = "sangatpendek") AS sangat_pendek


SELECT t_puskes.nama_puskes, t_desa.nama_desa, t_kecamatan.nama_kecamatan, COUNT(t_balita.hasil) AS total,
SUM(t_balita.hasil ="pendek") AS pendek, SUM(t_balita.hasil = "sangatpendek") AS sangat_pendek
FROM t_balita

RIGHT JOIN t_puskes
ON t_balita.id_puskes=t_puskes.id_puskes
RIGHT JOIN t_desa
ON t_balita.kode_desa=t_desa.kd_desa
RIGHT JOIN t_kecamatan
ON t_desa.kd_kecamatan=t_kecamatan.kd_kecamatan
GROUP BY kode_desa


SELECT t_desa.kd_desa, t_desa.nama_desa, t_desa.kd_kecamatan, COUNT(t_balita.hasil) AS total,
SUM(t_balita.hasil ="pendek") AS pendek, SUM(t_balita.hasil = "sangatpendek") AS sangat_pendek
FROM t_desa

INNER JOIN t_balita
ON t_desa.kd_desa = t_balita.kode_desa
GROUP BY kd_kecamatan


SELECT t_desa.kd_desa, t_desa.nama_desa, t_desa.kd_kecamatan, COUNT(t_balita.hasil) AS jumlah_sasaran,
SUM(t_balita.hasil ="pendek") AS status_pendek, SUM(t_balita.hasil = "sangatpendek") AS status_sangat_pendek,
COUNT(t_balita.hasil = 'pendek'+'sangatpendek') AS pendek_sangat_pendek,
CAST((t_balita.hasil / t_balita.hasil * 100) AS DECIMAL) AS pravelensi
FROM t_desa


INNER JOIN t_balita
ON t_desa.kd_desa = t_balita.kode_desa
GROUP BY kd_kecamatan

SELECT SUM(t_balita.hasil="pendek"),SUM(t_balita.hasil="sangatpendek")
FROM t_balita
GROUP BY id_jenis_kelamin


SELECT  t_desa.kd_kecamatan, COUNT(t_balita.hasil),
SUM(t_balita.hasil ="pendek") AS status_pendek, SUM(t_balita.hasil = "sangatpendek") AS status_sangat_pendek,
COUNT(t_balita.hasil = 'pendek'+'sangatpendek') AS pendek_sangat_pendek,
CAST((t_balita.hasil / t_balita.hasil * 100) AS DECIMAL) AS pravelensi
FROM t_desa

LEFT JOIN t_balita
ON t_balita.kode_desa=t_desa.kd_desa
GROUP BY kd_kecamatan




SELECT t_puskes.nama_puskes, t_desa.nama_desa, t_kecamatan.nama_kecamatan, COUNT(t_balita.hasil) AS total,
SUM(t_balita.hasil ="pendek") AS status_pendek, SUM(t_balita.hasil = "sangatpendek") AS status_sangat_pendek,
COUNT(t_balita.hasil = 'pendek'+'sangatpendek') AS pendek_sangat_pendek,
CAST((t_balita.hasil / t_balita.hasil * 100) AS DECIMAL) AS pravelensi
FROM t_balita

RIGHT JOIN t_puskes
ON t_balita.id_puskes=t_puskes.id_puskes
RIGHT JOIN t_desa
ON t_balita.kode_desa=t_desa.kd_desa
RIGHT JOIN t_kecamatan
ON t_desa.kd_kecamatan=t_kecamatan.kd_kecamatan
GROUP BY kode_desa






SELECT t_puskes.nama_puskes, t_desa.nama_desa, t_kecamatan.nama_kecamatan, 
COUNT(t_balita.hasil) AS total,
SUM(t_balita.hasil ='normal') AS normal,
SUM(t_balita.hasil ="pendek") AS status_pendek, 
SUM(t_balita.hasil = "sangatpendek") AS status_sangat_pendek,
COUNT(t_balita.hasil = 'pendek'+'sangatpendek') AS pendek_sangat_pendek,
SUM(((t_balita.hasil='pendek') + (t_balita.hasil='sangatpendek') /  t_balita.hasil) * 100 ) AS pravelensi,
CAST((t_balita.hasil / t_balita.hasil * 100) AS DECIMAL) AS pravelensi
CAST((((t_balita.hasil= 'pendek') + (t_balita.hasil ='sangatpendek') / t_balita.hasil) * 100) AS DECIMAL ) AS pravelensi

FROM t_balita

RIGHT JOIN t_puskes
ON t_balita.id_puskes=t_puskes.id_puskes
RIGHT JOIN t_desa
ON t_balita.kode_desa=t_desa.kd_desa
RIGHT JOIN t_kecamatan
ON t_desa.kd_kecamatan=t_kecamatan.kd_kecamatan
GROUP BY kode_desa
<?php
$koneksi = mysqli_connect("localhost","root","","hrisori");
if (mysqli_connect_errno()){
	echo "<script>alert('Gagal tersambung dengan database: ".mysqli_connect_error()."')</script>";
}


// 2 fungsi dibawah untuk mengupdate database jika ada .sql baru
// ----- mengecek semua tabel di database
// $query = mysqli_query($koneksi,"SHOW TABLES");

// $tables = [];
// while ($row = mysqli_fetch_array($query)) {
//     $tables[] = $row[0]; // Ambil nama tabel dari hasil query
// }

// // Cetak hasil dalam bentuk list
// echo json_encode($tables);  // list nya bisa dicopy utk dipakai di bawah
// -------------------------------------


// ----- Daftar tabel yang ingin dihapus
// $tables_to_drop = ["table_name"];

// foreach ($tables_to_drop as $table) {
//     $query = "DROP TABLE IF EXISTS `$table`"; // Hindari error jika tabel tidak ada
//     if (mysqli_query($koneksi, $query)) {
//         echo "Tabel <b>$table</b> berhasil dihapus.<br>";
//     } else {
//         echo "Gagal menghapus tabel <b>$table</b>: " . mysqli_error($koneksi) . "<br>";
//     }
// }

// // Tutup koneksi
// mysqli_close($koneksi);
// -------------------------------------


// -- query untuk mengecek apakah ada table yang kosong
// SELECT table_name FROM information_schema.tables 
// WHERE table_schema = 'hrisori' AND table_rows < 1;



// -- Query utk backup Membuat database backup dari list table
// CREATE DATABASE IF NOT EXISTS backup_db;

// -- Menggunakan database backup
// USE backup_db;

// -- Daftar nama tabel input
// SET @table_names = 'table_one, table_two';

// -- Memisahkan daftar nama tabel menjadi individu tabel dan melakukan insert
// DROP PROCEDURE IF EXISTS insert_tables;
// DELIMITER $$
// CREATE PROCEDURE insert_tables()
// BEGIN
//     DECLARE done INT DEFAULT 0;
//     DECLARE tbl_name VARCHAR(255);
//     DECLARE table_list CURSOR FOR SELECT TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(@table_names, ',', numbers.n), ',', -1)) AS tbl_name
//                                   FROM (SELECT 1 n UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15) numbers
//                                   WHERE numbers.n <= 1 + (LENGTH(@table_names) - LENGTH(REPLACE(@table_names, ',', '')));
//     DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

//     OPEN table_list;
//     read_loop: LOOP
//         FETCH table_list INTO tbl_name;
//         IF done THEN
//             LEAVE read_loop;
//         END IF;
//         SET @sql = CONCAT('CREATE TABLE IF NOT EXISTS ', tbl_name, ' AS SELECT * FROM hrisori.', tbl_name);
//         PREPARE stmt FROM @sql;
//         EXECUTE stmt;
//         DEALLOCATE PREPARE stmt;
//     END LOOP;
//     CLOSE table_list;
// END$$
// DELIMITER ;

// -- Menjalankan prosedur untuk insert tabel
// CALL insert_tables();

?>
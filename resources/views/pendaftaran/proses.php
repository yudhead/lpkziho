<?php
// Koneksi ke database
$host = 'localhost';
$db   = 'pendaftaran';
$user = 'localhost';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Ambil nilai dari form
$pekerjaan = $_POST['pekerjaan'];
$bekerja_detail = !empty($_POST['bekerja_detail']) ? $_POST['bekerja_detail'] : null;
$freelance_detail = !empty($_POST['bekerja_detail']) ? $_POST['bekerja_detail'] : null;



try {
    if ($pekerjaan === 'FreeLance' && !empty($freelance_detail)) {
        $stmt = $pdo->prepare('INSERT INTO freelance_detail (jenis_pekerjaan, detail_pekerjaan) VALUES (:pekerjaan, :detail)');
        $stmt->execute(['pekerjaan' => $pekerjaan, 'detail' => $freelance_detail]);
        echo 'Data berhasil disimpan untuk FreeLance.';
    } elseif ($pekerjaan === 'Bekerja' && !empty($bekerja_detail)) {
        $stmt = $pdo->prepare('INSERT INTO bekerja_detail (jenis_pekerjaan, detail_pekerjaan) VALUES (:pekerjaan, :detail)');
        $stmt->execute(['pekerjaan' => $pekerjaan, 'detail' => $bekerja_detail]);
        echo 'Data berhasil disimpan untuk Bekerja.';
    } else {
        echo 'Mohon lengkapi detail pekerjaan sesuai pilihan.';
    }
} catch (PDOException $e) {
    echo 'Kesalahan: ' . $e->getMessage();
}

?>

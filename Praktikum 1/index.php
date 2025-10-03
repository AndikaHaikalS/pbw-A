<?php
// =================================================================
// PRAKTIKUM 1: APLIKASI PENDAFTARAN EVENT
// =================================================================

// KONSEP: CONSTANT
define('NAMA_EVENT', 'Belajar PHP 2025');
define('FILE_PENDAFTARAN', 'pendaftar.txt');

// KONSEP: GLOBAL VARIABLE
$status_message = '';
$error_messages = [];

// KONSEP: FUNGSI & REGEX
function validateEmail($email) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}

function validateDate($date) {
    $pattern = '/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-(19[0-9]{2}|20[0-9]{2})$/';
    return preg_match($pattern, $date);
}

// KONSEP: FORM (POST) HANDLING
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);

    if (empty($nama) || empty($email) || empty($tanggal_lahir)) {
        $error_messages[] = "Semua field wajib diisi.";
    }
    if (!validateEmail($email)) {
        $error_messages[] = "Format email tidak valid.";
    }
    if (!validateDate($tanggal_lahir)) {
        $error_messages[] = "Format tanggal lahir harus DD-MM-YYYY.";
    }

    if (empty($error_messages)) {
        $data_pendaftar = "{$nama};{$email};{$tanggal_lahir}\n";
        file_put_contents(FILE_PENDAFTARAN, $data_pendaftar, FILE_APPEND);
        $status_message = "Terima kasih, {$nama}! Pendaftaran Anda untuk event " . NAMA_EVENT . " berhasil.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Event Digital</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            margin: 0; padding: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background: #fff;
            margin-top: 30px;
            border-radius: 12px;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.15);
        }
        h1, h2 {
            text-align: center;
            color: #444;
        }
        p { text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 6px; font-weight: bold; }
        input[type="text"] {
            width: 100%; padding: 10px;
            border: 1px solid #ccc; border-radius: 8px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #667eea; outline: none;
            box-shadow: 0 0 6px rgba(102,126,234,0.4);
        }
        button {
            padding: 12px 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none; border-radius: 8px;
            cursor: pointer; font-size: 16px;
            transition: transform 0.2s, opacity 0.2s;
        }
        button:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
        .error {
            background: #ffe5e5;
            color: #c00;
            border: 1px solid #f5c2c2;
            padding: 10px; border-radius: 8px;
            margin-bottom: 15px;
        }
        .success {
            background: #e6ffed;
            color: #0a8a3a;
            border: 1px solid #b6f2c7;
            padding: 10px; border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }
        table {
            width: 100%; border-collapse: collapse; min-width: 600px;
        }
        th, td {
            border: 1px solid #ddd; padding: 10px; text-align: left;
        }
        th {
            background: #667eea;
            color: white;
        }
        tr:nth-child(even) { background: #f9f9f9; }
        @media (max-width: 600px) {
            h1, h2 { font-size: 1.4rem; }
            button { width: 100%; }
        }
    </style>
</head>
<body>
<div class="container">

<?php if (!empty($status_message)): ?>
    <p class="success"><?php echo $status_message; ?></p>
<?php endif; ?>

<?php if (!empty($error_messages)): ?>
    <div class="error">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            <?php foreach ($error_messages as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<h1>Form Pendaftaran Event "<?php echo NAMA_EVENT; ?>"</h1>
<p>Silakan isi data diri Anda untuk mendaftar pada event kami.</p>

<form action="index.php" method="POST">
    <div class="form-group">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" required>
    </div>
    <div class="form-group">
        <label for="email">Alamat Email:</label>
        <input type="text" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir (DD-MM-YYYY):</label>
        <input type="text" id="tanggal_lahir" name="tanggal_lahir" required>
    </div>
    <button type="submit">Daftar Sekarang</button>
</form>

<hr>

<h2>Daftar Peserta yang Sudah Mendaftar</h2>
<div class="table-container">
<table>
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (file_exists(FILE_PENDAFTARAN)) {
            $pendaftar = file(FILE_PENDAFTARAN, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($pendaftar as $data) {
                list($nama, $email, $tanggal_lahir) = explode(';', $data);
                echo "<tr>";
                echo "<td>" . htmlspecialchars($nama) . "</td>";
                echo "<td>" . htmlspecialchars($email) . "</td>";
                echo "<td>" . htmlspecialchars($tanggal_lahir) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Belum ada pendaftar.</td></tr>";
        }
        ?>
    </tbody>
</table>
</div>

</div>
</body>
</html>

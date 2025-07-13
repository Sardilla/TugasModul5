<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            padding: 25px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #0073aa;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn-submit {
            background-color: #0073aa;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #005f8d;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .result {
            margin-top: 20px;
            background: #e0f7fa;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Buku Tamu Digital STITEK Bontang</h2>

        <?php
        $nama = $email = $pesan = "";
        $error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nama"]) || empty($_POST["email"]) || empty($_POST["pesan"])) {
                $error = "Semua kolom wajib diisi!";
            } else {
                $nama = htmlspecialchars($_POST["nama"]);
                $email = htmlspecialchars($_POST["email"]);
                $pesan = htmlspecialchars($_POST["pesan"]);
            }
        }
        ?>

        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
            </div>
            <div class="form-group">
                <label for="email">Alamat Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="pesan">Pesan / Komentar:</label>
                <textarea id="pesan" name="pesan" rows="5"><?php echo $pesan; ?></textarea>
            </div>
            <button type="submit" class="btn-submit">Kirim Pesan</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)): ?>
            <div class="result">
                <h3>Pesan Anda:</h3>
                <p><strong>Nama:</strong> <?php echo $nama; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Pesan:</strong> <?php echo nl2br($pesan); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = trim($_POST["semester"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    }
    if ($prodi === "") {
        $error[] = "Program studi wajib diisi.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (
        !ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 ||
        (int)$semesterInput > 14
    ) {
        $error[] = "Semester harus berupa angka 1-14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mini Project - Data Mahasiswa</title>
</head>
<body>
    <h2>Formulir Data Mahasiswa</h2>

    <form method="POST" action="">
        <div>
            <label for="nama">Nama:</label><br>
            <input id="nama" name="nama" type="text" value="<?php echo htmlspecialchars($_POST["nama"] ?? "", ENT_QUOTES, "UTF-8"); ?>" required>
        </div><br>

        <div>
            <label for="nim">NIM:</label><br>
            <input id="nim" name="nim" type="text" value="<?php echo htmlspecialchars($_POST["nim"] ?? "", ENT_QUOTES, "UTF-8"); ?>" required>
        </div><br>

        <div>
            <label for="prodi">Program Studi:</label><br>
            <input id="prodi" name="prodi" type="text" value="<?php echo htmlspecialchars($_POST["prodi"] ?? "", ENT_QUOTES, "UTF-8"); ?>" required>
        </div><br>

        <div>
            <label for="semester">Semester (1-14):</label><br>
            <input id="semester" name="semester" type="number" min="1" max="14" value="<?php echo htmlspecialchars($_POST["semester"] ?? "", ENT_QUOTES, "UTF-8"); ?>" required>
        </div><br>

        <div>
            <label for="email">Email:</label><br>
            <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES, "UTF-8"); ?>" required>
        </div><br>

        <button type="submit">Kirim</button>
    </form>

    <?php if (!empty($error)): ?>
        <h3>Pesan Kesalahan:</h3>
        <ul>
            <?php foreach ($error as $pesan): ?>
                <li><?php echo htmlspecialchars($pesan, ENT_QUOTES, "UTF-8"); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($data !== null): ?>
        <h3>Ringkasan Data Mahasiswa</h3>
        <p>Nama: <?php echo htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8"); ?></p>
        <p>NIM: <?php echo htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8"); ?></p>
        <p>Program Studi: <?php echo htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8"); ?></p>
        <p>Semester: <?php echo htmlspecialchars((string)$data["semester"], ENT_QUOTES, "UTF-8"); ?></p>
        <p>Email: <?php echo htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8"); ?></p>
    <?php endif; ?>
</body>
</html>
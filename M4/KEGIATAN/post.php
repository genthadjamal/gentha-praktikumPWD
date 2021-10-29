<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi</title>
</head>
<style>
 .error {
     color: #FF0000;
    }
 </style>
<body>
<?php
 // define variables and set to empty values
 $namaErr = $emailErr = $genderErr = $nimErr = $prodiErr = "";
 $nama = $email = $gender = $prodi = $nim = "";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])) {
        $namaErr = "Nama harus diisi";
    }else {
        $nama = test_input($_POST["nama"]);
    }
 
 if (empty($_POST["email"])) {
        $emailErr = "Email harus diisi";
    }else {
        $email = test_input($_POST["email"]);
 
 // check if e-mail address is well-formed
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email tidak sesuai format"; 
    }
 }
 
 if (empty($_POST["nim"])) {
        $nimErr = "Nim Harus Diisi";
    }else {
        $nim = test_input($_POST["nim"]);
 }
 
 if (empty($_POST["prodi"])) {
    $prodiErr = "Prodi Harus Diisi";
 }else {
    $prodi = test_input($_POST["prodi"]);
 }
 
 if (empty($_POST["gender"])) {
    $genderErr = "Gender harus dipilih";
 }else {
    $gender = test_input($_POST["gender"]);
    }
 }
 
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
 ?>

<h2>Data Mahasiswa</h2>
 
 <p><span class = "error">* Harus Diisi.</span></p>
 
 <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <table>
    <tr>
        <td>Nama:</td>
        <td><input type = "text" name = "nama">
        <span class = "error">* <?php echo $namaErr;?></span>
        </td>
    </tr>
    <tr>
        <td>NIM: </td>
        <td><input type = "text" name = "nim">
        <span class = "error">* <?php echo $nimErr;?></span>
        </td>
    </tr>
    <tr>
        <td>E-mail:</td>
        <td> <input type = "text" name = "email">
        <span class = "error"><?php echo $emailErr;?></span>
        </td>
    </tr>
    <tr>
        <td>Prodi:</td>
        <td><input type="text" name="prodi">
        <span class="error">* <?php echo $prodiErr; ?></span></td>
    </tr>
    <tr>
        <td>Jenis Kelamin:</td>
        <td>
            <input type = "radio" name = "gender" value = "L">Laki-Laki
            <input type = "radio" name = "gender" value = "P">Perempuan
            <span class = "error">* <?php echo $genderErr;?></span>
        </td>
    </tr>
    <td>
        <input type = "submit" name = "submit" value = "Submit"> 
    </td>
 </table>
 </form>
 
 <?php
    echo "<h2>Data yang anda isi:</h2>";
    echo "<table border=1>";
    echo "<tr>
            <td>Nama</td>
            <td>: $nama</td>
          </tr>";
    echo "<tr>
            <td>NIM</td>
            <td>: $nim</td>
          </tr>";
    echo "<tr>
            <td>Email</td>
            <td>: $email</td>
         </tr>";
    echo "<tr>
            <td>Prodi</td>
            <td>: $prodi</td>
         </tr>";
    echo "<tr>
            <td>Jenis Kelamin</td>
            <td>: $gender</td>
         </tr>
         </table>";
 ?>
 
</body>
</html>
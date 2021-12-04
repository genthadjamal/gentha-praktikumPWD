<?php
include '../M3/koneksi.php';
?>

<h3>Form Pencarian DATA KHS Dengan PHP</h3>

<form action="" method="get">
    <label for="">Cari : </label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
$result = 0;
if (isset($_GET['cari'])){
    $cari = $_GET['cari'];
    echo "<b> Hasil Pencarian : ".$cari."</b>";
}
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>Nilai</th>
    </tr>
    <?php
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $sql = "SELECT mahasiswa.nim, mahasiswa.namaMHS, matakuliah.kodeMK, matakuliah.nama, khs.nilai FROM mahasiswa INNER JOIN khs ON mahasiswa.nim = khs.nim INNER JOIN matakuliah ON matakuliah.kodeMK = khs.kodeMK WHERE mahasiswa.nim = '".$cari."'";
            $result = mysqli_query($con,$sql);
        } else{
            $sql = "SELECT mahasiswa.nim, mahasiswa.namaMHS, matakuliah.kodeMK, matakuliah.nama, khs.nilai FROM mahasiswa INNER JOIN khs ON mahasiswa.nim = khs.nim INNER JOIN matakuliah ON matakuliah.kodeMK = khs.kodeMK";
            $result = mysqli_query($con,$sql);
        }
        $no = 1;
        while($r = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nim']; ?></td>
            <td><?php echo $r['namaMHS']; ?></td>
            <td><?php echo $r['kodeMK']; ?></td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
        <?php } ?>
</table>
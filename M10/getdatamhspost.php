<?php
    //Panggil file untuk koneksi ke database
    include "../M3/koneksi.php";
    
    // percabangan jika tidak kosong maka eksekusi
    if(!empty($_GET['cari'])){
        //tampilkan isi data table mahasiswa dengan nim sesuai isi dari variable cari
        $sql = "SELECT * FROM mahasiswa WHERE nim = '" . $_GET['cari'] . "';";
    } else {
        //tampilkan semua data table mahasiswa
        $sql = "SELECT * FROM mahasiswa";
    }
    // Jalankan query
    $query = mysqli_query($con,$sql);

    // Masukkan setiap baris data yang didapat kedalam
    // Array $data
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    // Deskripsikan jenis isi konten adalah json
    header('content-type: application/json');
    
    // Tampilkan data yang didapat kedalam format json
    echo json_encode($data);

    // menutup koneksi
    mysqli_close($con);
?>
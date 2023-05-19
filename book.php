<?php
 
// koneksi ke mysql
 
$con = mysqli_connect("localhost","root","","login");
$tanggal_sekarang = date('Y-m-d');
$tahun_update = 1;

$insert = mysqli_query($con,"INSERT INTO (nama,email,komentar,tanggal)VALUES('ilman','ilman@pemudamajelis.com','apaadsdasd','$tanggal_sekarang')");

$tampil = mysqli_query($con,"SELECT * FROM guestbook");
while($d = mysqli_fetch_array($tampil)){
    echo $d['nama'];
}



// setting timer
 

$lama = 3; // lama data adalah 3 hari 
// proses penghapusan data
 
$query = "DELETE FROM guestbook
          WHERE DATEDIFF(CURDATE(), tanggal) > $lama";
$hasil = mysqli_query($con,$query);
 
?>

<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Headers: Content-Type, Authorisation, X-Requested-with' );

$mysqli = mysqli_connect('localhost', 'root', '', 'ionic4login');
date_default_timezone_set('Asia/Jakarta');

function format_tgl($i){
    return date("d-m-Y",strtotime($i));
}

if (isset($_GET['api'])) {

    if ($_GET['api'] == "login") {
        $u = $_GET['username'];
        $p = $_GET['password'];
        $query = mysqli_query($mysqli,"SELECT * FROM login WHERE username='$u' AND password='$p'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            while ($result = mysqli_fetch_array($query)) {
                $arr[] = array(
                    "user_id" => $result['user_id'],
                    "full_name" => $result['full_name'],
                    "phone_number" => $result['phone_number'],
                    "username" => $result['username'],
                    "password" => $result['password'],
                );
            }
            echo json_encode($arr); 
        }else{
            echo"Login gagal";
        }
        
    // } elseif ($_GET['api'] == "create") {
    //     $judul = $_GET['judul'];
    //     $lirik = $_GET['lirik'];

    //     $query = mysqli_query($mysqli,"INSERT INTO sholawat(judul,lirik) VALUES('$judul','$lirik')");

    //     if ($query) {
    //         # code...
    //         $data = array(
    //             "status" => 1,
    //             "keterangan" => "berhasil di tambahkan"
    //         );
    //         echo json_encode($data);
    //     } else {
    //         # code...
    //         $data = array(
    //             "status" => 0,
    //             "keterangan" => "Gagal di tambahkan"
    //         );
    //         echo json_encode($data);
    //     }
    // }elseif($_GET['api'] == "delete"){
    //     $id = $_GET['id'];
    //     $query = mysqli_query($mysqli,"DELETE FROM sholawat WHERE id='$id'");

    //     if ($query) {
    //         # code...
    //         $data = array(
    //             "status" => 1,
    //             "keterangan" => "berhasil di Hapus"
    //         );
    //         echo json_encode($data);
    //     } else {
    //         # code...
    //         $data = array(
    //             "status" => 0,
    //             "keterangan" => "Gagal di Hapus"
    //         );
    //         echo json_encode($data);
    //     }
    // }

} else {
    $arr = array(
        "status" => "Unauthorized",
        "Info" => "Api Tutorial Ionic 4 | by Ilman Huda",
    );
    echo json_encode([$arr]);
} }

?>
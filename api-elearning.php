<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Headers: Content-Type, Authorisation, X-Requested-with' );

$mysqli = mysqli_connect('localhost', 'root', '', 'ds_elearning');
date_default_timezone_set('Asia/Jakarta');

function format_tgl($i){
    return date("d-m-Y",strtotime($i));
}

if (isset($_GET['api'])) {

    if ($_GET['api'] == "getHome") {
        $query = mysqli_query($mysqli,"SELECT * FROM kursus");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            while ($result = mysqli_fetch_array($query)) {
                $arr[] = array(
                    "id" => $result['id'],
                    "judul" => $result['judul'],
                    "level" => $result['level'],
                    "deskripsi" => $result['deskripsi'],
                    "gambar" => $result['gambar'],
                    "link" => $result['link'],
                    "user_id" => $result['user_id'],
                );
            }
            echo json_encode($arr);
        }else{
            echo"Data Kosong";
        }
        
    } else if ($_GET['api'] == "getMenu") {
        $query = mysqli_query($mysqli,"SELECT * FROM pekan");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            while ($result = mysqli_fetch_array($query)) {
                $arr[] = array(
                    "id_minggu" => $result['id_minggu'],
                    "minggu" => $result['minggu'],
                );
            }
            echo json_encode($arr);
        }else{
            echo"Data Kosong";
        }
        
    }else if ($_GET['api'] == "getSubmenu") {
        $query = mysqli_query($mysqli,"SELECT * FROM pekan inner join kurikulum on pekan.id_minggu = kurikulum.id_minggu");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            while ($result = mysqli_fetch_array($query)) {
                $arr[] = array(
                    "id_minggu" => $result['id_minggu'],
                    "minggu" => $result['minggu'],
                    "id_judul" => $result['id_judul'],
                    "learn" => $result['learn'],
                    "judul" => $result['judul'],
                    "deskripsi" => $result['deskripsi'],
                    "link" => $result['link'],
                    "youtube" => $result['youtube'],
                );
            }
            echo json_encode($arr);
        }else{
            echo"Data Kosong";
        }
        
    } 

} else {
    $arr = array(
        "status" => "Unauthorized",
        "Info" => "Api Tutorial Ionic 4 | by Ilman Huda",
    );
    echo json_encode([$arr]);
} 

?>
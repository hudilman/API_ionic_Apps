<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Headers: Content-Type, Authorisation, X-Requested-with' );


$mysqli = mysqli_connect('localhost', 'id11220193_sholawat', 'hudailman321', 'id11220193_ionic');
date_default_timezone_set('Asia/Jakarta');

function format_tgl($i){
    return date("d-m-Y",strtotime($i));
}

if (isset($_GET['api'])) {

    if ($_GET['api'] == "getdata") {
        $query = mysqli_query($mysqli,"SELECT * FROM sholawat order by judul ASC");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            while ($result = mysqli_fetch_array($query)) {
                $arr[] = array(
                    "judul" => $result['judul'],
                    "lirik" => $result['lirik'],
                );
            }
            echo json_encode($arr);
        }else{
            echo"Data Kosong";
        }
        
    } elseif ($_GET['api'] == "create") {
        $judul = $_GET['judul'];
        $lirik = $_GET['lirik'];

        $query = mysqli_query($mysqli,"INSERT INTO sholawat(judul,lirik) VALUES('$judul','$lirik')");

        if ($query) {
            # code...
            $data = array(
                "status" => 1,
                "keterangan" => "berhasil di tambahkan"
            );
            echo json_encode($data);
        } else {
            # code...
            $data = array(
                "status" => 0,
                "keterangan" => "Gagal di tambahkan"
            );
            echo json_encode($data);
        }
    }elseif($_GET['api'] == "delete"){
        $id = $_GET['id'];
        $query = mysqli_query($mysqli,"DELETE FROM sholawat WHERE id='$id'");

        if ($query) {
            # code...
            $data = array(
                "status" => 1,
                "keterangan" => "berhasil di Hapus"
            );
            echo json_encode($data);
        } else {
            # code...
            $data = array(
                "status" => 0,
                "keterangan" => "Gagal di Hapus"
            );
            echo json_encode($data);
        }
    }elseif($_GET['api'] == "search"){
        $judul = $_GET['judul'];
        $query = mysqli_query($mysqli,"SELECT * FROM sholawat WHERE judul='$judul'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            while ($result = mysqli_fetch_array($query)) {
                $arr[] = array(
                    "judul" => $result['judul'],
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
        "Info" => "API | by Ilman Huda",
    );
    echo json_encode([$arr]);
} 

?>
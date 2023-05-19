<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Headers: Content-Type, Authorisation, X-Requested-with' );

$mysqli = mysqli_connect('localhost', 'root', '', 'sholawat');

        $judul = $_POST['judul'];
        $lirik = $_POST['lirik'];
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['files']['name'];
        $ukuran = $_FILES['files']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if($ukuran < 1024*200){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['files']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
            $query = mysqli_query($mysqli,"INSERT INTO sholawat(judul,lirik,files) VALUES('$judul','$lirik','$xx')");
            $data = array(
                "status" => 1,
                "keterangan" => "berhasil di tambahkan",
            );
            echo json_encode($data);
        }else{
            $data = array(
                "status" => 0,
                "keterangan" => "Gagal di tambahkan"
            );
            echo json_encode($data);
        }
        

        // if ($query) {
        //     # code...
        //     $data = array(
        //         "status" => 1,
        //         "keterangan" => "berhasil di tambahkan"
        //     );
        //     echo json_encode($data);
        // } else {
        //     # code...
        //     $data = array(
        //         "status" => 0,
        //         "keterangan" => "Gagal di tambahkan"
        //     );
        //     echo json_encode($data);
        // }
?>
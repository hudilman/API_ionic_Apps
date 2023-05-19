<?php


	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }


   $postdata = file_get_contents("php://input");


  if (isset($postdata)) {
		$request = json_decode($postdata);
		
		$nama		        =$request->nama;  
		$no_telp			=$request->no_telp; 				
		$email			=$request->email; 	
		$alamat				=$request->alamat; 
		$pesan				=$request->pesan;

		$conn = new mysqli("localhost", "root","","ionic4login");		
		
		// To protect MySQL injection for Security purpose
		$nama			= stripslashes($nama);
		$no_telp 		= stripslashes($no_telp);
		$email 		= stripslashes($email);
		$alamat			= stripslashes($alamat);
		$pesan       = stripslashes($pesan);
		
		
		$nama 				= $conn->real_escape_string($nama);
		$no_telp 			= $conn->real_escape_string($no_telp);
		$email 			= $conn->real_escape_string($email);
		$alamat  	 		= $conn->real_escape_string($alamat);
		$pesan  	 			= $conn->real_escape_string($pesan);
		
		



			$sql = "INSERT INTO ds_chat (nama,no_telp,email,alamat,pesan) VALUES ('$nama','$no_telp','$email','$alamat','$pesan')";	
			if ($conn->query($sql) === TRUE) {
				$outp='{"result":{"created": "1", "exists": "0" } }';
			} 

		$conn->close();	
	
}

?> 
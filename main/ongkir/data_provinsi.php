<?php include '../db/database.php' ?>
<?php 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYHOST => 0, 
  CURLOPT_SSL_VERIFYPEER => 0, 
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: cb57587358c57430cba23d177b40ad85"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	// dibawah ini array dalam bentuk json biasa
  	// echo $response;
  	// konfersi dari json ke array
  	$data = json_decode($response,TRUE);
  	$dataprovinsi = $data["rajaongkir"]["results"];
  	 
  	echo "<option readonly value='' >-Pilih Provinsi Anda-</option>";
  	 foreach ($dataprovinsi as $key => $prov) 
  	 {
  	 	echo "<option value='".$prov["province_id"]."' id_provinsi='".$prov["province_id"]."'>";
  	 	echo $prov['province'];
  	 	echo "</option>";
  	 }
}




 ?>
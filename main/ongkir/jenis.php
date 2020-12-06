<?php 
$jenis = $_POST['ekspedisi'];
$kota = $_POST['kota'];
$berat = $_POST['berat'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYHOST => 0, 
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=501&destination=$kota&weight=$berat&courier=$jenis",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: cb57587358c57430cba23d177b40ad85"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
  $jenis = json_decode($response,TRUE);
  $satu = $jenis["rajaongkir"]["results"]["0"]["costs"];
  // echo "<pre>";
  // print_r($satu);
  // echo "</pre>";
  echo "<option value=''>--Pilih Jenis--</option>";
  foreach ($satu as $key => $value) 
  {
    echo "<option 
    jenis='".$value['service']."' 
    harga='".$value['cost']['0']['value']."' 
    etd='".$value['cost']['0']['etd']."'   
    >";
    echo $value['service']." ";
    echo number_format($value['cost']["0"]["value"],0,',','.')." ";
    echo $value['cost']["0"]["etd"];
    echo "</option >";
  }
}



 ?>
 
<?php
$id_provinsi_pilih = $_POST['id_provinsi'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi_pilih,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_SSL_VERIFYHOST => 0, 
  CURLOPT_SSL_VERIFYPEER => 0,
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
  // echo $response;
  $data_kota = json_decode($response,TRUE);
  $kota = $data_kota["rajaongkir"]["results"];
  // echo "<pre>";
  // print_r($data_kota["rajaongkir"]["results"]);
  // echo "</pre>";

  echo "<option value=''>--Pilih Kota--</option>";


  foreach ($kota as $key => $value) 
  {
    echo "<option value='' 
    id_kota ='".$value['city_id']."' 
    nama_provinsi='".$value['province']."' 
    nama_kota='".$value['city_name']."' 
    type='".$value['type']."' 
    kodepos='".$value['postal_code']."'>";
    echo $value["type"]." ";
    echo $value["city_name"];
    echo "</option>";
  }
}
?>
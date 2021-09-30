<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Api_City extends CI_Controller {

    function __construct() {
        parent::__construct();
        
         set_time_limit(0);
    }

    function index() {
        echo "API KOTA";
    }

    public function getCity($value=''){
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "key: 90aabb8da122d228d69002b470fb88f2",
            "postman-token: d21cdf77-fd2a-7d2b-d085-034a9ac65ccb"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
      
          $tempListKota = $arrayResponse['rajaongkir']['results'];

          $jmlData =  count($tempListKota);
          $count = 0;
          foreach ($tempListKota as $value) {
              //bikin object baru
              // $kota = new stdClass();
              // $kota->id = $value['city_id']; //id kotanya
              // $kota->nama = $value['city_name']; //nama kotanya

              $data_kota = array(
                'id_kota' => $value['city_id'],
                'id_prov' => $value['province_id'],
                'type' => $value['type'],
                'nama_kota' => $value['city_name']
              );

              $input_kota = $this->db->replace('tbl_kota', $data_kota);

              if ($input_kota) {
                $count++;
              }
          }

          if ($count == $jmlData) {
            echo "Data Kota berhasil ditambahkan";
          }else{
            echo "Data Kota gagal ditambahkan";
          }
        }
    }

    public function getProv($value=''){
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "key: 90aabb8da122d228d69002b470fb88f2",
            "postman-token: d21cdf77-fd2a-7d2b-d085-034a9ac65ccb"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
      
          $tempListProv = $arrayResponse['rajaongkir']['results'];

          $jmlData =  count($tempListProv);
          $count = 0;
          foreach ($tempListProv as $value) {

              $data_prov = array(
                'id_prov' => $value['province_id'],
                'nama_prov' => $value['province']
              );

              $input_prov = $this->db->replace('tbl_provinsi', $data_prov);

              if ($input_prov) {
                $count++;
              }
          }

          if ($count == $jmlData) {
            echo "Data Provinsi berhasil ditambahkan";
          }else{
            echo "Data Provinsi gagal ditambahkan";
          }
        }
    }

}

?>

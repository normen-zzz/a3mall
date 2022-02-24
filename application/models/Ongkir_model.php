<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkir_model extends CI_Model
{
    public function getProvinceOngkir()
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.rajaongkir.com/starter/province?key=d67fd4789383e29084ae6215e86d3df9&id=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'key: d67fd4789383e29084ae6215e86d3df9',
                'id: '
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function getCityOngkir($provinsi_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pro.rajaongkir.com/api/city?key=a6967bdb01140e883df5366f088abdbf&id&province=' . $provinsi_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
    public function getSubDistrictOngkir($kabupaten_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pro.rajaongkir.com/api/subdistrict?key=a6967bdb01140e883df5366f088abdbf&id&city=' . $kabupaten_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function getAlamatOngkir($kabupaten_id, $kecamatan_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?key=a6967bdb01140e883df5366f088abdbf&city=$kabupaten_id&id=$kecamatan_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function getCity($provinsi_id)
    {
        $getCity = $this->getCityOngkir($provinsi_id);
        $city = $getCity->rajaongkir->results;
        $output = '<option selected disabled value="">Choose...</option>';
        foreach ($city as $city) {
            $output .= '<option value="' . $city->city_id . '">' . $city->city_name . '</option>';
        }

        return $output;
    }

    public function getSubdistrict($kabupaten_id)
    {
        $getSubdistrict = $this->getSubDistrictOngkir($kabupaten_id);
        $subdistrict = $getSubdistrict->rajaongkir->results;
        $output = '<option selected disabled value="">Choose...</option>';
        foreach ($subdistrict as $subdistrict) {
            $output .= '<option value="' . $subdistrict->subdistrict_id . '">' . $subdistrict->subdistrict_name . '</option>';
        }

        return $output;
    }

    public function getHargaOngkir($tujuan, $berat, $panjang, $lebar)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pro.rajaongkir.com/api/cost',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'key' => 'a6967bdb01140e883df5366f088abdbf',
                'origin' => '6314',
                'originType' => 'subdistrict',
                'destination' => $tujuan,
                'destinationType' => 'subdistrict',
                'weight' => $berat,
                'courier' => 'jne',
                'length' => $panjang,
                'width' => $lebar
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

/* End of file ModelName.php */
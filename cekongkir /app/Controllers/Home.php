<?php

namespace App\Controllers;

class Home extends BaseController
{
    public $api_key = "a63b1a2779117fa51af64d6c7f498719";

    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->api_key
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['city'] = array('error' => true, 'message' => $err);
        } else {
            $data['city'] = json_decode($response, true);
        }

        return view('home', $data);
    }

    public function cekOngkir()
    {
        $origin = $this->request->getPost('origin');
        $destination = $this->request->getPost('destination');
        $weightInKg = $this->request->getPost('weight');
        $courier = $this->request->getPost('courier');

        // Convert weight from kg to grams
        $weightInGrams = $weightInKg * 1000;

        $params = [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weightInGrams, // Use weight in grams for API request
            'courier' => $courier
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->api_key
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['result'] = array('error' => true, 'message' => $err);
        } else {
            $data['result'] = json_decode($response, true);
            if ($data['result']['rajaongkir']['status']['code'] != 200) {
                $data['result'] = array('error' => true, 'message' => $data['result']['rajaongkir']['status']['description']);
            }
        }
        return view('result', $data);
    }
}

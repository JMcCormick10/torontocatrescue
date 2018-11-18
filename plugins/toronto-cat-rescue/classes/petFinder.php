<?php 
class petFinder{

    public static function getAllPets(){
        $curl = curl_init();
//
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.petfinder.com/shelter.getPets?key=8b940518a403583219425b9bb8b63bed&id=ON29&count=1000&format=json",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache"
          ),
        ));
        $response = curl_exec($curl);
        $json_encoded_response = json_decode($response);
        $response_object = (json_encode(array('item' => $response), JSON_FORCE_OBJECT));
        $err = curl_error($curl);
        
        curl_close($curl);
        
        $response_array = array();

        if ($err) {
            $response_array['success'] = false;
            $response_array['error'] = $err;
        } 
        else {
            $response_array['success'] = true;
            $response_array['data'] = $response;
        }
        
        return $json_encoded_response;
    }

    public static function getAllCatBreeds(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.petfinder.com/breed.list?key=8b940518a403583219425b9bb8b63bed&animal=cat&format=json",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache"
          ),
        ));
        $response = curl_exec($curl);
        $json_encoded_response = json_decode($response);
        $response_object = (json_encode(array('item' => $response), JSON_FORCE_OBJECT));
        $err = curl_error($curl);
        
        curl_close($curl);
        
        $response_array = array();

        if ($err) {
            $response_array['success'] = false;
            $response_array['error'] = $err;
        } 
        else {
            $response_array['success'] = true;
            $response_array['data'] = $response;
        }
        return $json_encoded_response;
    }

}
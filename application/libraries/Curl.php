<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curl {

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function simple_post($url, $data, $options = array()) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        foreach ($options as $key => $value) {
            curl_setopt($ch, $key, $value);
        }

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}

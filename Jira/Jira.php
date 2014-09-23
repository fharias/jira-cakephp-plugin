<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Jira {

    public $user = null;
    public $password = null;
    public $url = null;

    public function __construct($user, $password, $url) {
        $this->user = $user;
        $this->password = $password;
        $this->url = $url;
    }

    public function ___put($resource, $data) {
        $jdata = json_encode($data);
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_URL => $this->url . '/rest/api/2/' . $resource,
            CURLOPT_USERPWD => $this->user . ':' . $this->password,
            CURLOPT_POSTFIELDS => $jdata,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
            ),
            CURLOPT_RETURNTRANSFER => true
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    public function ___post($resource, $data) {
        $jdata = json_encode($data);
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_POST => 1,
            CURLOPT_URL => $this->url . '/rest/api/2/' . $resource,
            CURLOPT_USERPWD => $this->user . ':' . $this->password,
            CURLOPT_POSTFIELDS => $jdata,
            CURLOPT_HTTPHEADER => array('Content-type: application/json'),
            CURLOPT_RETURNTRANSFER => true
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    public function ___get($resource, $data) {
        $jdata = json_encode($data);
        $ch = curl_init();
        //configure CURL
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->url . '/rest/api/2/' . $resource,
            CURLOPT_USERPWD => $this->user . ':' . $this->password,
            CURLOPT_POSTFIELDS => $jdata,
            CURLOPT_HTTPHEADER => array('Content-type: application/json'),
            CURLOPT_RETURNTRANSFER => true
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        //convert JSON data back to PHP array
        return json_decode($result);
    }

}

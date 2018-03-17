<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/16/016
 * Time: 17:31
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('curl_get')) {
    function curl_get($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // 默认30秒超时
        curl_setopt($ch, CURLOPT_TIMEOUT,30);
        $data = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        if($info["http_code"] != 200){
            return false;
        }
        return $data;
    }
}
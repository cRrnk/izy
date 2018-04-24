<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/24
 * Time: 13:31
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('isWeChat')) {
    function isWeChat(string $ua=''){
        $ua = $ua ? $ua : $_SERVER['HTTP_USER_AGENT'];
        return preg_match('/MicroMessenger/i', $ua);
    }
}

if ( ! function_exists('clean_adult')) {
    function clean_adult($string) {
        //请自行增减此数组内容，以达到最好过滤效果
        $keywords= array(
            '成人' => '好孩子',
            '福利' => '有惊喜',
            '种子' => '果实',
            '磁力搜索' => '吸引力搜索',
            '人体艺术' => '**艺术',
            '一本道' => '一**',
        );
        return strtr($string, $keywords);
    }
}
<?php
namespace common\utils;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dump
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Dump {
    //put your code here
    public static function errors($errors)
    {
        ob_start();
        var_dump($errors);
        die('<pre>' . ob_get_clean() . '</pre>');
    }
}

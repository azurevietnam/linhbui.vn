<?php
namespace common\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductFile
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class ProductFile extends MyActiveRecord {
    //put your code here
    const OS_ANDROID = 1;
    const OS_IOS = 2;
    const OS_WINDOWSPHONE = 3;
    public static $oses = [
        ProductFile::OS_ANDROID => 'Android',
        ProductFile::OS_IOS => 'iOS',
        ProductFile::OS_WINDOWSPHONE => 'Windowsphone',
    ];
}

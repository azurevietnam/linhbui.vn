<?php

namespace common\utils;

use common\utils\phpthumb\PhpThumbFactory;
use Yii;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FileUtils {

    const SUFFIX_TEMPLATE = '--{x}x{y}';
    const SEQUENCE_TEMPLATE = '--{sequence}';

    const ALLOW_REMOVE_FOLDER_CONTAINS_LESS = 100;
    
    public static $tiny_keys = [
        '9Ahno1_2RsMdPeokXMDsXRwiQsoJz2RP', // quyettvq@gmail.com
        'xeIvN0N63V1ItVFyqkJAgBDzGFpmkgcZ', // quyettv93@gmail.com
    ];

    public static $file_name_replace = [
        '#' => '-', 
        '?' => '-', 
        '/' => '-',
        '&ndash;' => '-',
        ' - ' => '-',
        ' ' => '-'
    ];
    public static $allow_extensions = [
        'jpg',
        'jpeg',
        'png',
        'gif',
        'pdf',
        'doc',
        'docx',
        'xsl',
        'apk',
        'ipa',
        'xap',
        'rar',
        'zip'
    ];
    
    public static function getTinyKey()
    {
        $keys = array_values(self::$tiny_keys);
        return $keys[rand(0, count($keys) - 1)];
    }


    // Hàm kiểm tra file có tồn tại trên url không
    public static function checkRemoteFile($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (curl_exec($ch) !== FALSE) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function getImage($params = [
        'imageName' => '',
        'suffix' => '',
        'imagePath' => '',
        'imagesFolder' => '',
        'imagesUrl' => '',
        'defaultImage' => ''
    ])
    {
        isset($params['defaultImage']) or $params['defaultImage'] = '';
        if(isset($params['suffix'])) {
//            if (is_array($params['suffix'])) {
//                $suffix = self::getResizeSuffix($params['suffix']);
//            } else {
//                $suffix = $params['suffix'];
//            }
            $suffix = self::getResizeSuffix(self::parseArray($params['suffix']));
        } else {
            $suffix = null;
        }
        
        $_image = '';
        if ($suffix === null) {
            if (@is_array(getimagesize($params['imagesFolder'] . $params['imagePath'] . $params['imageName']))) {
                $_image = $params['imagesUrl'] . $params['imagePath'] . $params['imageName'];
            }
        } else {
            $name_map = explode('.', $params['imageName']);
            if (count($name_map) >= 2) {
                $extension = $name_map[count($name_map) - 1];
                $basename = substr($params['imageName'], 0, -(1 + strlen($extension)));
                if (@is_array(getimagesize($params['imagesFolder'] . $params['imagePath'] . $basename . $suffix . '.' . $extension))) {
                    $_image = $params['imagesUrl'] . $params['imagePath'] . $basename . $suffix . '.' . $extension;
                } else {
                    if (@is_array(getimagesize($params['imagesFolder'] . $params['imagePath'] . $params['imageName']))) {
                        $_image = $params['imagesUrl'] . $params['imagePath'] . $params['imageName'];
                    }
                }
            }
        }

        if ($_image != '') {
            return str_replace('%3A//', '://', str_replace('%2F', '/', rawurlencode($_image)));
        } else {
            return $params['defaultImage'];
        }        
    }

    // Hàm copy ảnh và resize theo các kích thước cho trước
    // Sử dụng thư viện PhpThumbFactory:
    /**
     * PhpThumb Library Definition File
     * 
     * This file contains the definitions for the PhpThumbFactory class.
     * It also includes the other required base class files.
     * 
     * If you've got some auto-loading magic going on elsewhere in your code, feel free to
     * remove the include_once statements at the beginning of this file... just make sure that
     * these files get included one way or another in your code.
     * 
     * PHP Version 5 with GD 2.0+
     * PhpThumb : PHP Thumb Library <http://phpthumb.gxdlabs.com>
     * Copyright (c) 2009, Ian Selby/Gen X Design
     * 
     * Author(s): Ian Selby <ian@gen-x-design.com>
     * 
     * Licensed under the MIT License
     * Redistributions of files must retain the above copyright notice.
     * 
     * @author Ian Selby <ian@gen-x-design.com>
     * @copyright Copyright (c) 2009 Gen X Design
     * @link http://phpthumb.gxdlabs.com
     * @license http://www.opensource.org/licenses/mit-license.php The MIT License
     * @version 3.0
     * @package PhpThumb
     * @filesource
     */
    public static function copyImage(
        $params = [
            'imageName' => '',
            'fromFolder' => '',
            'toFolder' => '',
//            'removeInputImage' => false,
//            'resize' => [],
//            'resizeType' => 1,
//            'resizeQuality' => 100,
//            'resizeSuffixTemplate' => '_{x}x{y}',
//            'sequenceSuffixTemplate' => '_{sequence}',
//            'sequenceStart' => 2,
//            'imageNameReplace' => self::$file_name_replace,
        ]
    )
    {
        $params['fromFolder'] = rtrim(trim($params['fromFolder']), '/') . '/';
        $params['toFolder'] = rtrim(trim($params['toFolder']), '/') . '/';
        isset($params['removeInputImage']) or $params['removeInputImage'] = false;
        isset($params['resize']) or $params['resize'] = [];
        isset($params['resizeType']) or $params['resizeType'] = 1;
        isset($params['resizeQuality']) or $params['resizeQuality'] = 100;
        isset($params['resizeSuffixTemplate']) or $params['resizeSuffixTemplate'] = self::SUFFIX_TEMPLATE;
        isset($params['sequenceSuffixTemplate']) or $params['sequenceSuffixTemplate'] = self::SEQUENCE_TEMPLATE;
        isset($params['sequenceStart']) or $params['sequenceStart'] = 2;
        isset($params['imageNameReplace']) or $params['imageNameReplace'] = self::$file_name_replace;
        isset($params['createWatermark']) or $params['createWatermark'] = false;
        
        $resize_suffixes = [];
        foreach ($params['resize'] as $dim) {
            $resize_suffixes[] = self::getResizeSuffix($dim, $params['resizeSuffixTemplate']);
        }
        $img_name = trim($params['imageName']);
        while (strpos($img_name, '  ') !== false) {
            $img_name = str_replace('  ', ' ', $img_name);
        }
        $img_extension = trim(strrev(explode('.', strrev($img_name))[0]));
        $img_basename = trim(substr($img_name, 0, -1 - strlen($img_extension)));
        if (self::fileWithSuffixesExists($params['toFolder'], $img_name, $resize_suffixes)) {
            $suffix_rev_map = self::getSequenceSuffixRevMap($params['sequenceSuffixTemplate']);
            $img_basename = trim(strrev(preg_replace('/' . $suffix_rev_map[1] . '(|\s)[0-9](|\s)' . $suffix_rev_map[0] . '/', '', strrev($img_basename), 1)));
        }
        foreach ($params['imageNameReplace'] as $search => $replace) {
            $img_basename = str_replace(html_entity_decode($search), $replace, $img_basename);
        }
        if (trim($img_basename) == ''){
            $img_basename = 'Untitle';
        }
        $img_name = $img_basename . '.' . $img_extension;
        while (self::fileWithSuffixesExists($params['toFolder'], $img_name, $resize_suffixes)) {
            $img_name = $img_basename . self::getSequenceSuffix($params['sequenceStart'] ++, $params['sequenceSuffixTemplate']) . '.' . $img_extension;
        }
        $result = [
            'imageName' => $img_name,
            'success' => false,
            'removeInputImage' => false,
            'resize' => [],
        ];
        if (!file_exists($params['toFolder'])) {
            mkdir($params['toFolder'], 0777, true);
        }
        if (is_file($params['fromFolder'] . $params['imageName']) 
        || self::checkRemoteFile($params['fromFolder'] . $params['imageName'])
        ) {
            $name_map = explode('.', $img_name);
            if (count($name_map) > 1) {
                $extension = $name_map[count($name_map) - 1];
                $basename = substr($img_name, 0, -1 - strlen($extension));
//                try {
//                    \Tinify\setKey('9Ahno1_2RsMdPeokXMDsXRwiQsoJz2RP');
//                    $source = \Tinify\fromFile($params['fromFolder'] . $params['imageName']);
//                    $source->toFile($params['toFolder'] . $img_name);
//                } catch (\Tinify\Exception $e) {
                    try {
                        copy($params['fromFolder'] . $params['imageName'], $params['toFolder'] . $img_name);
                    } catch (Exception $e) {
                        var_dump($e);
                        die;
                    }
//                }
//                if (copy($params['fromFolder'] . $params['imageName'], $params['toFolder'] . $img_name)) {
                    $result['success'] = true;
                    if ($params['removeInputImage']) {
                        if (is_file($params['fromFolder'] . $params['imageName'])) {
                            if (@unlink($params['fromFolder'] . $params['imageName'])) {
                                $result['removeInputImage'] = true;
                            }
                        }
                    }
                    if (filesize($params['toFolder'] . $img_name) > 0) {
                        $formatInfo = getimagesize($params['toFolder'] . $img_name);
                        if ($formatInfo !== false && (isset($formatInfo['mime']) ? in_array($formatInfo['mime'], ['image/jpeg', 'image/png', 'image/gif']) : false)) {
                            // create watermark
//                            if ($params['createWatermark']) {
//                                $thumb = PhpThumbFactory::create($params['toFolder'] . $img_name);
//                                if ($formatInfo[0] > 800 && $formatInfo[1] > 800) {
//                                    $watermark_img = 'watermark_lg.png';
//                                } else if ($formatInfo[0] > 300 && $formatInfo[1] > 300) {
//                                    $watermark_img = 'watermark_md.png';
//                                } else {
//                                    $watermark_img = 'watermark_sm.png';
//                                }
//                                if (is_file(\Yii::$app->params['images_folder'] . '/' . $watermark_img)) {
//                                    $thumb->createWatermark(\Yii::$app->params['images_folder'] . '/' . $watermark_img, 'lt', '5');
//                                    $thumb->save($params['toFolder'] . $img_name);
//                                }
//                            }
                            if (count($params['resize']) > 0) {
                                foreach ($params['resize'] as $dim) {
                                    $dim = self::parseArray($dim);
                                    $thumb = PhpThumbFactory::create($params['toFolder'] . $img_name);
                                    $thumb->setOptions(['jpegQuality' => $params['resizeQuality']]);
                                    switch ($params['resizeType']) {
                                        case 1:
                                            if ($thumb->resize($dim[0], $dim[1])) {
                                                if ($thumb->save($params['toFolder'] . $basename . self::getResizeSuffix($dim, $params['resizeSuffixTemplate']) . '.' . $extension)) {
                                                    $result['resize'][] = $basename . self::getResizeSuffix($dim, $params['resizeSuffixTemplate']) . '.' . $extension;
                                                }
                                            }
                                            break;
                                        case 2:
                                            if ($thumb->adaptiveResize($dim[0], $dim[1])) {
                                                if ($thumb->save($params['toFolder'] . $basename . self::getResizeSuffix($dim, $params['resizeSuffixTemplate']) . '.' . $extension)) {
                                                    $result['resize'][] = $basename . self::getResizeSuffix($dim, $params['resizeSuffixTemplate']) . '.' . $extension;
                                                }
                                            }
                                    }
                                }
                            }
                        }
                    }
//                }
            }
        }

//        if ($result['success']) {
//            // Move forder contains image and all resize images to other server by ftp
//            $ftpPath = str_replace(Yii::$app->params['images_folder'], 'images', $params['toFolder']);
//            Yii::$app->ftpFs->createDir($ftpPath);
//            Yii::$app->ftpFs->write($ftpPath . $result['imageName'], Yii::$app->fs->read($ftpPath . $result['imageName']));
//            foreach ($result['resize'] as $item) {
//                Yii::$app->ftpFs->write($ftpPath . $item, Yii::$app->fs->read($ftpPath . $item));
//            }
//            // End move folder by ftp
//        }
        return $result;
    }

    // Hàm copy ảnh trong nội dung text và trả về nội dung chứa đường dẫn ảnh mới
    public static function copyContentImages($params = [
        'content' => '',
//        'defaultFromFolder' => '',
        'toFolder' => '',
        'toUrl' => '',
//        'regex' => '',
//        'removeInputImage' => false,
    ])
    {
        if (empty($params['regex'])) {
            $regex = '/(http|https):\/\/+[^\"]+.(';
            foreach (self::$allow_extensions as $i => $ext) {
                $regex .= ($i > 0 ? '|' : '') . $ext . '|' . strtoupper($ext);
            }
            $regex .= ')/';
        }
        isset($params['removeInputImage']) or $params['removeInputImage'] = false;
        isset($params['createWatermark']) or $params['createWatermark'] = false;
        if (isset($params['defaultFromFolder'])) {
            $params['defaultFromFolder'] = rtrim($params['defaultFromFolder'], '/') . '/';
        }
        $params['toFolder'] = rtrim($params['toFolder'], '/') . '/';
        $toUrl = rtrim($params['toUrl'], '/') . '/';
        $content = $params['content'];
        $matches = array();
        preg_match_all($regex, $content, $matches);
        if (!empty($matches[0])) {
            foreach ($matches[0] as $img_url) {
                if (strpos($img_url, $toUrl) === false) {
                    $img_name = strrev(explode('/', strrev($img_url))[0]);
                    if (empty($params['defaultFromFolder']) || !is_file($params['defaultFromFolder'] . $img_name)) {
                        $fromFolder = substr($img_url, 0, strlen($img_url) - strlen($img_name));
                    } else {
                        $fromFolder = $params['defaultFromFolder'];
                    }
                    $copyResult = self::copyImage([
                                'imageName' => $img_name,
                                'fromFolder' => $fromFolder,
                                'toFolder' => $params['toFolder'],
                                'removeInputImage' => $params['removeInputImage'],
                                'createWatermark' => $params['createWatermark'],
                    ]);
                    if ($copyResult['success']) {
                        $content = str_replace($img_url, $toUrl . $copyResult['imageName'], $content);
                    }
                }
            }
        }
        return $content;
    }
    
    public static function removeImageWithSuffixes($params = [])
    {
        isset($params['resizeSuffixTemplate']) or $params['resizeSuffixTemplate'] = self::SUFFIX_TEMPLATE;
        $params['folder'] = rtrim(trim($params['folder']), '/') . '/';
        isset($params['resize']) or $params['resize'] = [];
        
        $name_map = explode('.', $params['imageName']);
        if (count($name_map) >= 2) {
            $extension = $name_map[count($name_map) - 1];
            $basename = substr($params['imageName'], 0, -(1 + strlen($extension)));
            foreach ($params['resize'] as $dim) {
                $dim = self::parseArray($dim);
                $suffix = self::getResizeSuffix($dim, $params['resizeSuffixTemplate']);
                if (is_file($params['folder'] . $basename . $suffix . '.' . $extension)) {
                    unlink($params['folder'] . $basename . $suffix . '.' . $extension);
                }
            }
            if (is_file($params['folder'] . $basename . '.' . $extension)) {
                unlink($params['folder'] . $basename . '.' . $extension);
            }
            
            return true;
        }
        
        return false;
    }


    public static function updateImage($params = [])
    {
        self::removeImageWithSuffixes([
            'imageName' => $params['oldImageName'],
            'folder' => $params['toFolder'],
            'resize' => isset($params['resize']) ? $params['resize'] : [],
            'resizeSuffixTemplate' => isset($params['resizeSuffixTemplate']) ? $params['resizeSuffixTemplate'] : self::SUFFIX_TEMPLATE,
        ]);
        if (isset($params['imageName']) && $params['imageName'] != '') {
            return self::copyImage($params);
        }
        return;
    }
    
    public static function updateContentImages($params = [])
    {
        if (empty($params['regex'])) {
            $regex = '/(http|https):\/\/+[^\"]+.(';
            foreach (self::$allow_extensions as $i => $ext) {
                $regex .= ($i > 0 ? '|' : '') . $ext . '|' . strtoupper($ext);
            }
            $regex .= ')/';
        }
        isset($params['removeInputImage']) or $params['removeInputImage'] = false;
        isset($params['createWatermark']) or $params['createWatermark'] = false;
        if (isset($params['defaultFromFolder'])) {
            $params['defaultFromFolder'] = rtrim($params['defaultFromFolder'], '/') . '/';
        }
        $toFolder = rtrim($params['toFolder'], '/') . '/';
        $toUrl = rtrim($params['toUrl'], '/') . '/';
        $content = $params['content'];
        $oldContent = $params['oldContent'];
        
        $matches = [];
        $oldMatches = [];
        preg_match_all($regex, $content, $matches);
        preg_match_all($regex, $oldContent, $oldMatches);
        
        foreach ($oldMatches[0] as $img_url) {
            if (!in_array($img_url, $matches[0])) {
                $img_name = strrev(explode('/', strrev($img_url))[0]);
                if (is_file($toFolder . $img_name)) {
                    @unlink($toFolder . $img_name);
                }
            }
        }
        
        foreach ($matches[0] as $img_url) {
            if (!in_array($img_url, $oldMatches[0]) && strpos($img_url, $toUrl) === false) {
                $img_name = strrev(explode('/', strrev($img_url))[0]);
                if (!isset($params['defaultFromFolder']) || !is_file($params['defaultFromFolder'] . $img_name)) {
                    $fromFolder = substr($img_url, 0, strlen($img_url) - strlen($img_name));
                } else {
                    $fromFolder = $params['defaultFromFolder'];
                }
                $copyResult = self::copyImage([
                    'imageName' => $img_name,
                    'fromFolder' => $fromFolder,
                    'toFolder' => $params['toFolder'],
                    'removeInputImage' => $params['removeInputImage'],
                    'createWatermark' => $params['createWatermark'],
                ]);
                if ($copyResult['success']) {
                    $content = str_replace($img_url, $toUrl . $copyResult['imageName'], $content);
                }
            }
        }
        
        return $content;
    }

    public static function removeFolder($dir)
    {
        if (is_dir($dir)) {
            $files = glob(rtrim($dir, '/') . '/*');
            if (count($files) < self::ALLOW_REMOVE_FOLDER_CONTAINS_LESS) {
                foreach ($files as $item) {
                    if (is_file($item)) {
                        @unlink($item);
                    }
                }
                @rmdir($dir);
            }
            // remove corresponding folder on server2 by ftp
//            $ftpPath = str_replace(Yii::$app->params['images_folder'], 'images', $dir);
//            $contents = Yii::$app->ftpFs->listContents($ftpPath);
//            if (count($contents) < self::ALLOW_REMOVE_FOLDER_CONTAINS_LESS) {
//                foreach ($contents as $item) {
//                    if ($item['type'] === 'file') {
//                        if (Yii::$app->ftpFs->has($item['path'])) {
//                            Yii::$app->ftpFs->delete($item['path']);
//                        }
//                    }
//                }
//                $contents = Yii::$app->ftpFs->listContents($ftpPath);
//                if (count($contents) == 0) {
//                    Yii::$app->ftpFs->deleteDir($ftpPath);
//                }
//            }
            // end ftp
        }
    }

    // Nếu đường dẫn thư mục ảnh không tồn tại trên local nhưng tồn tại trên ftp 
    // khi xảy ra trường hợp thư mục mới (sẽ không trùng với thư mục nào trên local cho đến giới hạn xác suất nhưng)
    // bị trùng với thư mục trên ftp thì thư mục trên ftp cũng sẽ được đồng nhất với thư mục trên local
    public static function generatePath($time, $base_path)
    {
        return date('/Y/m/', $time);
    }

    // private function
    private static function generateRandomString($length, $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz')
    {
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count - 1)];
        }
        return $str;
    }

    private static function getSequenceSuffixRevMap($template)
    {
        $suffix_map = explode('{sequence}', $template);
        return [
            isset($suffix_map[0]) ? preg_quote(strrev($suffix_map[0])) : '',
            isset($suffix_map[1]) ? preg_quote(strrev($suffix_map[1])) : '',
        ];
    }

    public static function getSequenceSuffix($sequence, $template = '')
    {
        $template != '' or $template = self::SEQUENCE_TEMPLATE;
        if ($result = str_replace('{sequence}', $sequence, $template)) {
            return $result;
        }
        return '';
    }

    public static function getResizeSuffix($dim, $template = '')
    {
        $template != '' or $template = self::SUFFIX_TEMPLATE;
        if ($result = str_replace('{y}', $dim[1], str_replace('{x}', $dim[0], $template))) {
            return $result;
        }
        return '';
    }

    public static function fileWithSuffixesExists($container, $filename, $suffixes = [])
    {
        if (is_file($container . $filename)) {
            return true;
        }
        $name_map = explode('.', $filename);
        if (count($name_map) >= 2) {
            $extension = $name_map[count($name_map) - 1];
            $basename = substr($filename, 0, -1 - strlen($extension));
            foreach ($suffixes as $suffix) {
                if (is_file($container . $basename . $suffix . '.' . $extension)) {
                    return true;
                }
            }
        }
        return false;
    }
    
    private static function parseArray($dim)
    {
        if (!is_array($dim)) {
            $dim = explode('x', $dim);
        }
        foreach ($dim as &$item) {
            $item = (int) $item;
        }
        return $dim;
    }

}

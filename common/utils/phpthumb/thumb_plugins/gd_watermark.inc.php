<?php

use common\utils\phpthumb\PhpThumb;
class GdWatermarkLib
{
 /**
 * Instance of GdThumb passed to this class
 *
 * @var GdThumb
 */
 protected $parentInstance;
 protected $currentDimensions;
 protected $workingImage;
 protected $newImage;
 protected $options;

 public function createWatermark ($watermark, $mask_position, $mask_padding, $that)
 {
 // bring stuff from the parent class into this class...
 $this->parentInstance = $that;
 $this->currentDimensions = $this->parentInstance->getCurrentDimensions();
 $this->mask_position = $mask_position;

 $width = $this->currentDimensions['width'];
 $height = $this->currentDimensions['height'];

 $watermarksize = getimagesize($watermark);
 $dest_x = $width - $watermarksize[0] - 55;
 $dest_y = $height - $watermarksize[1] - 55;
 //$watermark = imagecreatefrompng($watermark);

 $pathinfo = pathinfo($watermark);
 $var1 = $pathinfo['extension'];
 $var2 = "png";
 $var3 = "jpeg";
 $var4 = "jpg";
 $var5 = "gif";
 if(strcasecmp($var1, $var2) == 0){
 $watermark = @imagecreatefrompng($watermark);
 }elseif((strcasecmp($var1, $var3) == 0) || (strcasecmp($var1, $var4) == 0)){
 $watermark = @imagecreatefromjpeg($watermark);
 }elseif(strcasecmp($var1, $var5) == 0){
 $watermark = @imagecreatefromgif($watermark);
 }

 switch($mask_position) {
  case 'cc':
  // Center
  $dest_x = round(($width - $watermarksize[0]) / 2);
  $dest_y = round(($height - $watermarksize[1]) / 2);
  break;
  case 'lt':
  // Left Top
  $dest_x = $mask_padding;
  $dest_y = $mask_padding;
  break;
  case 'rt':
  // Right Top
  $dest_x = $width - $mask_padding - $watermarksize[0];
  $dest_y = $mask_padding;
  break;
  case 'lb':
  // Left Bottom
  $dest_x = $mask_padding;
  $dest_y = $height - $mask_padding - $watermarksize[1];
  break;
  case 'rb':
  // Right Bottom
  $dest_x = $width - $mask_padding - $watermarksize[0];
  $dest_y = $height - $mask_padding - $watermarksize[1];
  break;
  case 'cb':
  // Center Bottom
  $dest_x = round(($width - $watermarksize[0]) / 2);
  $dest_y = $height - $mask_padding - $watermarksize[1];
  break;
  }

 imagecopy($this->parentInstance->getOldImage(), $watermark, $dest_x, $dest_y, 0, 0, $watermarksize[0], $watermarksize[1]);

 return $that;
 }
}

$pt = PhpThumb::getInstance();
$pt->registerPlugin('GdWatermarkLib','gd');

?>
<?php
/* @var $this View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" itemscope itemtype="http://schema.org/WebPage">
<head>
<?php require_once 'meta.php'; ?>
<?php require_once 'css.min.php'; ?>
<?php require_once 'js.min.php'; ?>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--HEADER-->
<?php require_once 'header.php'; ?>
<!--MAIN CONTENT-->
<?php
if (!in_array(Yii::$app->requestedRoute, ['site/index'])) {
?>
<?= $this->render('//modules/breadcrumbs') ?>
<?php
}    
?>
<div class="main-content container">
<?= $content ?>
<div class="clearfix"></div>
</div>
<!--FOOTER-->
<?php require_once 'footer.php'; ?>
<?php require_once 'plugins.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

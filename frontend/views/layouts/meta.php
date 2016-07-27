<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<title itemprop="name"><?= $this->context->page_title ?></title>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="description" content="<?= $this->context->meta_description ?>" itemprop="description">
<meta name="keywords" content="<?= $this->context->meta_keywords ?>" itemprop="keywords">
<meta name="robots" content="<?= $this->context->meta_index ?>, <?= $this->context->meta_follow ?>">
<meta name="robots" content="NOODP, NOYDIR">
<meta name="p:domain_verify" content="f499ac4524c7ccfc7064d9c38774e229">
<meta name="geo.region" content="VN-HN">
<meta name="geo.placename" content="Hà Nội">
<meta name="geo.position" content="21.033953;105.785002">
<meta name="ICBM" content="21.033953, 105.785002">
<meta name="DC.title" content="<?= $this->context->meta_title ?>" />
<meta name="DC.Creator" content="Admin">
<meta name="DC.Subject" content="<?= $this->context->meta_title ?>" xml:lang="Vi">
<meta name="DC.Description" content="<?= $this->context->meta_description ?>" xml:lang="Vi">
<meta name="DC.Publisher" content="Admin">
<meta name="DC.Contributor" content="Admin">
<meta name="DC.Date" scheme="W3CDTF" content="<?= date('Y-m-d') ?>">
<meta name="DC.Type" scheme="DCMIType" content="Text">
<meta name="DC.Format" content="text/html" schema="DCterms:IMT">
<meta name="DC.Identifier" content="<?= Url::home(true) ?>" schema="DCterms:URI">
<meta name="DC.Source" content="<?= Url::home(true) ?>">
<meta name="DC.Language" content="Vi" scheme="dcterms:RFC1766">
<meta name="DC.Relation" content="<?= Url::home(true) ?>" scheme="IsPartOf">
<meta name="DC.Coverage" content="Vietnam"> 
<meta name="RATING" content="GENERAL">
<meta name="COPYRIGHT" content="<?= Yii::$app->name ?>">
<meta property="fb:app_id" content="<?= Yii::$app->params['fb_app_id'] ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $this->context->meta_title ?>">
<meta property="og:description" content="<?= $this->context->meta_description ?>">
<meta property="og:url" content="<?= $this->context->link_canonical ?>">
<meta property="og:image" content="<?= $this->context->meta_image ?>">
<meta property="og:site_name" content="<?= Yii::$app->name ?>">
<link rel="canonical" href="<?= $this->context->link_canonical ?>" itemprop="url">
<link rel="image_src" type="image/jpeg" href="<?= $this->context->meta_image ?>" itemprop="image">
<link rel="alternate" media="handheld" href="<?= $this->context->link_canonical ?>">
<link rel="icon" type="image/x-icon" href="<?= Url::home(true) ?>favicon.ico" />
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="#303F9F">
<meta name="REVISIT-AFTER" content="1 DAYS">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<?= Html::csrfMetaTags() ?>
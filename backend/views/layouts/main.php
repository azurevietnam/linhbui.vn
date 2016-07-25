<?php

//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;


use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
//use yii\helpers\Url;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
<?php require_once('css.php') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini /* <?= !in_array(Yii::$app->controller->id, ['site']) ? 'sidebar-collapse' : '' ?>*/">
<?php $this->beginBody() ?>
<div class="wrapper">
<?php require_once 'top.php'; ?>
<?php require_once 'left.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php if($content){  ?>
    <!-- Main content -->
    <section class="content" id="mainContent">
        <!-- Main row -->
        <div class="box box-solid" style="opacity:0.95">
            <?php 
            if (!empty($this->context->product_id)) {
                $product_id = $this->context->product_id;
                $menuItems = [
                    ['label' => 'Sản phẩm', 'url' => ['product/update', 'id' => $product_id]],
//                    ['label' => 'QL file', 'url' => ['product-file/index', 'product_id' => $product_id]],
                    ['label' => 'QL ảnh', 'url' => ['product-image/index', 'product_id' => $product_id]],
//                    ['label' => 'Thêm file', 'url' => ['product-file/create', 'product_id' => $product_id]],
                    ['label' => 'Thêm ảnh', 'url' => ['product-image/create', 'product_id' => $product_id]],
                ];
            }
            
            if (!empty($this->context->gallery_id)) {
                $gallery_id = $this->context->gallery_id;
                $menuItems = [
                    ['label' => 'Album ảnh', 'url' => ['gallery/update', 'id' => $gallery_id]],
                    ['label' => 'Thêm ảnh', 'url' => ['gallery-image/create', 'gallery_id' => $gallery_id]],
                    ['label' => 'QL ảnh', 'url' => ['gallery-image/index', 'gallery_id' => $gallery_id]],
                ];
            }            
            
            if (Yii::$app->controller->id == 'user-log') {
                $menuItems = [
//                    ['label' => 'Danh sách', 'url' => ['user-log/index']],
                ];
            }
            
            if (Yii::$app->controller->id == 'contact') {
                $menuItems = [
//                    ['label' => 'Danh sách', 'url' => ['user-log/index']],
                ];
            }
            
            if (Yii::$app->controller->id == 'site') {
                $menuItems = [
                ];
            }
            
            if (Yii::$app->controller->module->id == 'admin') {
                $menuItems = [
//                    ['label' => 'Phân quyền', 'url' => ['./assignment']],
//                    ['label' => 'DS quyền', 'url' => ['./permission']],
//                    ['label' => 'Vai trò', 'url' => ['./role']],
//                    ['label' => 'Đường dẫn', 'url' => ['./route']],
//                    ['label' => 'Quy tắc', 'url' => ['./rule']],
                ];
            }
            
            isset($menuItems) or $menuItems = [
                ['label' => 'Danh sách', 'url' => [Yii::$app->controller->id . '/index']],
                ['label' => 'Thêm mới', 'url' => [Yii::$app->controller->id . '/create']],
            ];
            
            if (!empty($menuItems)) {
                NavBar::begin([
                    'options' => [
                        'class' => 'nav',
                        'role' => 'presentation'
                    ],
                    'innerContainerOptions' => [
                        'class' => 'box-header',
                    ],
                ]);
                echo Nav::widget([
                    'options' => ['class' => 'nav nav-tabs'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
            }
            
            ?>            
            <div class="box-body">
                <?= $content ?>
            </div>
        </div><!-- /.row (main row) -->
    </section><!-- /.content -->
    <?php } ?>
</div><!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
</div>
<?php require_once 'js.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

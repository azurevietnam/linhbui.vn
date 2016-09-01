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
<style>
.close-icon {
    width: 22px;
    height: 19px;
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAATBAMAAABmV+C7AAAAIVBMVEUzMzMAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzO81Yz2AAAAC3RSTlNAAB83EAkvBBUrJomTk18AAAB6SURBVAjXRc+7DcJQEETRq4f4hSMZJDLTAUSkUAIl0AJuwO7EpXpnHDhZ3eBIo2WAJl2AOx3w1Q0OQj389IZ9daGTHkWqC+3+JtVGcxG3EUXcRiZuI5Otn+ls0ta+uvm4Q7wtQsYgTFoXhMnR5yVMJuULipylIPpsBi1wyw4IXemU3QAAAABJRU5ErkJggg==');
}
.remove-icon {
    width: 21px;
    height: 21px;
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAMAAACeyVWkAAAAS1BMVEUAAADX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19fX19f////7+/vb29v39/fq6urj4+Py8vLu7u7o6Ojf39+eP0PAAAAADnRSTlMAy40k7/n0T7euMzDlSPgWteAAAACaSURBVBjTdZELDoQgDEQLgn+nqKh7/5OuW36u0ZeQQJk205YCg1ajHZUeqFB1SHQVRSaDgplIaCyu2EbSa/xT/4q0uNMS9XKZFzcDOx/y6klD8LzJETQpBFZe3akXFI2ILMw+uSOLLHZIUOpgdo7XrFW5gN/4E+smDwfvp3xJHsSvBOQr+H3s7XkOLzOTcH1VNq+7KHszMHlvXxYZEuHjfASkAAAAAElFTkSuQmCC');
}
</style>
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
<?php require_once 'js.php'; ?>
<?php require_once 'plugins.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

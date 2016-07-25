<?php
$class = isset($options['class']) ? $options['class'] : '';
$link = isset($link) ? $link : $this->context->link_canonical;
?>
<div class="like-share <?= $class ?>">
    <div class="btn">
        <div class="fb-like" size="small" data-share="true" data-layout="button_count" data-count="true" data-href="<?= $link ?>"></div>
    </div> 
    <div class="clearfix"></div>
</div>
<?php
$this->registerCss('
.like-share>.btn{float:left}
');
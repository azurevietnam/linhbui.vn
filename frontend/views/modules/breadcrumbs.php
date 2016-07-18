<div class="breadcrumbs container magb10">
<div class="wrap">
<?php
if (count($this->context->breadcrumbs) <=  1) {
    echo '&nbsp;';
} else {
    echo '<ul>';
    foreach ($this->context->breadcrumbs as $item) {
        echo "<li><a href=\"{$item['url']}\" title=\"{$item['label']}\">{$item['label']}</a></li>";
    }
    echo '</ul>';
}
?>
<div class="clearfix"></div>
</div>
</div>
<aside class="col-r">
<?php
use frontend\models\Widget;
$widgets = Widget::find()->where(['place' => Widget::PLACE_RIGHT])->allActive();
foreach ($widgets as $widget) {
    $class = "frontend\\models\\$widget->object_class";
    $query = $class::find();
    if ($widget->sql_where != '') {
        $query->where($widget->sql_where);
    }
    if ($widget->sql_offset != '') {
        $query->offset($widget->sql_offset);
    }
    if ($widget->sql_limit != '') {
        $query->limit($widget->sql_limit);
    }
    if ($widget->sql_order_by != '') {
        $query->orderBy($widget->sql_order_by);
    }
    $items = $query->allActive();
    $content = '';
    foreach ($items as $item) {
        $item_html = str_replace(Widget::V_NAME, $item->name, $widget->item_template);
        $item_html = str_replace(Widget::V_IMAGE, $item->img(), $item_html);
        $item_html = str_replace(Widget::V_A_NAME, $item->a(), $item_html);
        $item_html = str_replace(Widget::V_A_IMAGE, $item->a([], $item->img()), $item_html);
        $item_html = str_replace(Widget::V_DESCRIPTION, $item->desc(), $item_html);
        $content .= $item_html;
    }
    $html = str_replace(Widget::V_NAME, $widget->name, $widget->template);
    $html = str_replace(Widget::V_ALL_ITEMS, $content, $html);
    $html = str_replace(Widget::V_ADSENSE, $this->render('//modules/adsense'), $html);
    if ($widget->style != '') {
        $this->registerCss($widget->style);
    }
    echo $html;
}
?>
</aside>

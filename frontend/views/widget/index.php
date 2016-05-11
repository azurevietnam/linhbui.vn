<?php

use frontend\models\PageGroup;
use frontend\models\Widget;
$widgets = PageGroup::widgets();
//var_dump($widgets);die;
foreach ($widgets as $widget) {
        try {
            $content = '';
            $class = "frontend\\models\\$widget->object_class";
            if (class_exists($class)) {
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
                $image_size = isset(Widget::$image_resizes[$widget->item_image_size]) ? Widget::$image_resizes[$widget->item_image_size] : Widget::IMAGE_MEDIUM;
                foreach ($items as $item) {
                    $item_html = str_replace(Widget::V_NAME, $item->name, $widget->item_template);
                    $item_html = str_replace(Widget::V_IMAGE, $item->img([], $image_size), $item_html);
                    $item_html = str_replace(Widget::V_NAME_URL, $item->a(), $item_html);
                    $item_html = str_replace(Widget::V_IMAGE_URL, $item->a([], $item->img([], $image_size)), $item_html);
                    $item_html = str_replace(Widget::V_DESCRIPTION, $item->desc(), $item_html);
                    $content .= $item_html;
                }
            }
            $html = str_replace(Widget::V_NAME, $widget->name, $widget->template);
            $html = str_replace(Widget::V_ITEMS, $content, $html);
            $html = str_replace(Widget::V_ADSENSE, $this->render('//modules/adsense'), $html);
            if ($widget->style != '') {
                $this->registerCss($widget->style);
            }
            echo $html;
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
}
?>
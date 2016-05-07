
<?php
use frontend\models\Widget;
$this->context->layout = false;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=2">
<link href="<?= Yii::$app->params['frontend_url'] ?>/css/css/style.css" rel="stylesheet">
</head>
<body>
<section class="topseo">
    <div class="main">
        <h1 style="float:left"><strong>Xem trước Widget</strong></h1>
        <?= yii\helpers\Html::a(
                '&lt;&lt; Trở về',
                Yii::$app->request->get('back_url', \yii\helpers\Url::previous()),
                [
                    'style' => 'float:right;border:1px solid #999;padding:2px 6px;font-weight:bold',
                    'type' => 'button'
                ]
            ) ?>
        <div class="clearfix"></div>
    </div>
</section>
<header>
	<div class="main clearfix">
  <h1 class="txt-logo fl"><a href="#" title=""><img src="<?= Yii::$app->params['images_url'] ?>/logo.png" title="" alt=""></a></h1>
  </div>
</header>
<nav>
  <div class="main clearfix">
    <button class="navbar-toggle collapsed" type="button" onClick="showmenu('list-cate')"> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </button>
    <span class="sr-only">Menu danh mục</span>
    <ul class="list-unstyle clearfix" id="list-cate">
      <li class="fl active"><a href="#" title=""><strong>Trang chủ</strong></a><span class="line">|</span></li>
      <li class="fl">
      	<a href="#" title="" onclick="showmenu('list-cate-hide')"><strong>Tử vi hàng ngày</strong></a><span class="line">|</span>
        <ul id="list-cate-hide" class="list-unstyle clearfix">
          <li class="fl"><a title="" href="#"><strong>Tử vi 2016</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Tý</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Sửu</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Dần</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Mão</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Thìn</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Tị</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Ngọ</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Mùi</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Thân</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Dậu</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Tuất</strong></a></li>
          <li class="fl"><a title="" href="#"><strong>Tử vi tuổi Hợi</strong></a></li>
        </ul>
      </li>
      <li class="fl"> <a href="#" title=""><strong>Tử vi  theo tuần</strong></a><span class="line">|</span></li>
      <li class="fl"> <a href="#" title=""><strong>Tử vi theo tháng</strong></a><span class="line">|</span></li>
      <li class="fl"><a href="#" title=""><strong>Tử vi theo năm</strong></a><span class="line">|</span></li>
    </ul>
    <div class="search"><em class="ic-search" onClick="showmenu('form-search')"></em> </div>
    <div class="form-search" id="form-search">
      <input type="text" placeholder="Nhập từ khóa cần tìm">
    </div>
  </div>
</nav>
<section class="content">
  <div class="main">
    <div class="col2 clearfix">
              <div class="col-l">
      	<div class="slider clearfix">
                            <div class="slide_left">
                                <div class="flex_viewport">
                                     <div class="cover"><a href="#"><img src="<?= Yii::$app->params['images_url'] ?>/demo.jpg" title="" alt=""></a></div>
                                            <span class="desc">
                    <h2 class="title-news"> <a href="#" title="#"><strong>Top 4 con giáp sẽ viên mãn đường tình duyên cả đời</strong></a> </h2>
                    <p class="desc">Sang năm 2016, người tuổi Tý bước vào cục diện Tam hợp Thái Tuế, lợi cho cung Hôn nhân, hóa giải tình trạng mâu thuẫn, tranh cãi bất lợi giữa các cặp vợ chồng. Ngoài ra, người độc thân có thể đón nhận nhiều tin vui </p>
                  </span>
                                            
                                </div>
                            </div>
                            <div class="slide_right list-news-other">
                                <ul class="list list-unstyle">
                                    <li class="clearfix"><img src="<?= Yii::$app->params['images_url'] ?>/hot-icon.gif"><a href="#"><strong>Tử vi tuần mới 15/06 – 21/06/2015 của 12 cung hoàng...</strong></a></li>
                                    <li class="clearfix"><a href="#"><strong>Tử vi tuần mới 08/06 – 14/06/2015 của 12 cung hoàng...</strong></a></li>
                                    <li class="clearfix"><a href="#"><strong>Tử vi tuần mới 04/05 – 10/05/2015 của 12 cung hoàng...</strong></a></li>
                                    <li class="clearfix"><a href="#"><strong>Sinh con năm Bính Thân 2016 tháng nào tốt?</strong></a></li>
                                    <li class="clearfix"><a href="#"><strong>Sự nghiệp và tình duyên trong tháng 3 của 12 con giáp</strong></a></li>
                                    <li class="clearfix"><a href="#"><strong>Top con giáp chọn cách im lặng khi bị phản bội</strong></a></li>
                                    <li class="clearfix"><a href="#"><strong>Tướng người dễ bị ‘tai bay vạ gió’ vì lời nói</strong></a></li>
                                    <li class="clearfix"><a href="#"><strong>Top 3 con giáp nam chung tình nhất</strong></a></li>
                                    <li class="clearfix"><a href="#"><strong>Yêu Bọ Cạp, hãy học cách chấp nhận một cuộc tình</strong></a></li>
                                    
                                </ul>
                            </div>
                      
                    </div>
              </div>
        <aside class="col-r">
<?php
        try {
            $class = "frontend\\models\\$model->object_class";
            $query = $class::find();
            if ($model->sql_where != '') {
                $query->where($model->sql_where);
            }
            if ($model->sql_offset != '') {
                $query->offset($model->sql_offset);
            }
            if ($model->sql_limit != '') {
                $query->limit($model->sql_limit);
            }
            if ($model->sql_order_by != '') {
                $query->orderBy($model->sql_order_by);
            }
            $items = $query->allActive();
            $content = '';
            foreach ($items as $item) {
                $item_html = str_replace(Widget::V_NAME, $item->name, $model->item_template);
                $item_html = str_replace(Widget::V_IMAGE, $item->img(), $item_html);
                $item_html = str_replace(Widget::V_NAME_URL, $item->a(), $item_html);
                $item_html = str_replace(Widget::V_IMAGE_URL, $item->a([], $item->img()), $item_html);
                $item_html = str_replace(Widget::V_DESCRIPTION, $item->desc(), $item_html);
                $content .= $item_html;
            }
            $html = str_replace(Widget::V_NAME, $model->name, $model->template);
            $html = str_replace(Widget::V_ITEMS, $content, $html);
            $html = str_replace(Widget::V_ADSENSE, '<b><i>[Vị trí đặt quảng cáo]</i></b>', $html);
            if ($model->style != '') {
                ?>
            <style>
                <?= $model->style ?>
                </style>
                <?php
            }
            echo $html;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

?>
        </aside>
    </div>
  </div>
</section>
</body>
</html>
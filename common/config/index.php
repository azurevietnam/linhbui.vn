<?php

use frontend\models\Article;
use frontend\models\SlideshowItem;
use yii\helpers\Url;

if ($model->status == Article::STATUS_MENU) {
    $slideshow = [];
    foreach (SlideshowItem::find()->allActive() as $item) {
        $slideshow[] = [
            'caption' => $item->caption,
            'link' => $item->link,
            'img_src' => $item->getImage(),
            'img_alt' => $item->caption,
        ];
    }
    echo '<div class="wrap">';
    echo $this->render('//modules/slideshow', [
        'data' => $slideshow,
        'options' => [
            'time_slide' => 800,
            'time_out' => 4000,
            'img_max_width' => '990px'
        ]
    ]);
    echo '</div>';
}
?>
<div class="wrap">
    <div class="col-8">
        <div class="dsk-padr10">
            <?= $this->render('//modules/breadcrumbs') ?>
            <section class="magt10" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
                <article class="paragraph" itemscope itemtype="http://schema.org/Article">
                    <h2 class="title" itemprop="name"><?= $model->name ?></h2>
                    <div class="desc" itemprop="description"><?= $model->description ?></div>
                    <div class="content" itemprop="articleBody"><?= $model->content ?></div>
                </article>
            </section>
            <section class="magt10">
                <?= $this->render('//modules/comment', [
                    'id' => $model->id,
                    'counter_url' => Url::to(['article/counter'], true)
                ]) ?>
            </section>
        </div>
    </div>
    <div class="col-4">
        <?= $this->render('//layouts/right') ?>
    </div>
</div>
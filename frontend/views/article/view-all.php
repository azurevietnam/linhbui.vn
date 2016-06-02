<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
        <?php
        switch ($type) {
            case frontend\models\Article::TYPE_NEWS:
                echo $this->render('news-list-view', [
                    'title' => 'Tin tức',
                    'items' => $items,
                ]);
                break;
            case frontend\models\Article::TYPE_MAGAZINE:
                echo $this->render('magazine-list-view', [
                    'title' => 'Góc báo chí',
                    'items' => $items,
                ]);
                break;
            case frontend\models\Article::TYPE_CUSTOMER_REVIEW:
                echo $this->render('customer-review-list-view', [
                    'title' => 'Ý kiến khách hàng',
                    'items' => $items,
                ]);
                break;
        }
        ?>
        </div>
    </div>
</div>
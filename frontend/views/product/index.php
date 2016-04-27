<?php
//$download = $default_file->product_ref_url;
$download = $model->getDownloadLink($this->context->os_id);
?>
<div class="ads txt-center magT10">
    <div class="magb5">
        <?= $this->render('//modules/adsense') ?>
    </div>
    <?= $this->render('//modules/breadcrumbs') ?>
</div>
<div class="application clearfix">
    <div class="app_details bottom25">
        <div class="details_info bottom20 clearfix">
            <div class="cover_contain">
                <div class="details_action clearfix">
                    <?= $model->img('img100', frontend\models\Product::$image_resizes['tiny']) ?>
                    <div class="reviewed-by clearfix">
                        <div class="review_l clearfix">
                            <div class="clearfix">
                                <a type="button" href="javascript:void(0)" <?= $download !== null ? "onclick=\"updateProductDownloadCount({$model->id}, 1 + {$model->download_count}, '$download')\"" : '' ?> class="btn_blues magT5"><span>Download</span></a>
                                <br><br>
                                <span class="free"><?= $model->price() ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="rating magT10 clearfix"><span class="stars fl"><span style="width: 72px;">(<?= $model->review_score ?>)</span></span> (<?= $model->review_score ?>)</p>
            </div>
            <div class="info_contain fl">
                <div class="title_red"><?= $model->name ?></div>
                <div class="info_game fl">
                    <p class="magb10"><a href="javascript:void(0)" class="cl666 under"><em><?= $model->manufacturer ?></em></a></p>
                    <ul class="form">
                        <li class="clearfix"><label class="cl666">Lượt xem:</label>
                            <div class="filltext">
                                <span class="cl1a"><?= $model->view_count ?></span>
                            </div>
                        </li>
                        <li class="clearfix"><label class="cl666">Cập nhật:</label>
                            <div class="filltext">
                                <span class="cl1a"><?= $model->date('updated_at') ?></span>
                            </div>
                        </li>
                        <li class="clearfix"><label class="cl666">Version:</label>
                            <div class="filltext">
                                <span class="cl1a"><?= $default_file->product_version ?></span>
                            </div>
                        </li>

                        <li class="clearfix"><label class="cl666">Yêu cầu:</label>
                            <div class="filltext">
                                <?php
                                $num = count($files);
                                foreach ($files as $item) {
                                    $num--;
                                ?>
                                <span class="cl1a"><?= isset(\frontend\models\ProductFile::$oses[$item->os_id]) ? \frontend\models\ProductFile::$oses[$item->os_id] : '' ?> <?= $item->os_version ?><?= $num !== 0 ? ', ' : '' ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="pr_code fr">
                    <a href="javascript:void(0)"><img src="http://chart.apis.google.com/chart?cht=qr&chs=82x82&chld=Q|0&chl=<?= $download ?>" /></a>
                </div>
            </div>
        </div>
        <div class="description">
            <div class="Tabs">
                <ul class="clearfix">
                    <li class="clearfix active"><a href="#details">Chi tiết</a></li>
                    <li class="clearfix"><a href="#comment">Bình luận (<?= $model->comment_count ?>)</a></li>
                </ul>
            </div>
            <div class="box_detail" id="details">
                <div class="box">
                    <?= $this->render('//modules/slideshow', [
                        'data' => $slideshow,
                        'options' => [
                            'box_width_preview' => $this->context->is_mobile ? '75%' : '100%',
                            'img_max_height_preview' => '150px',
                            'img_wph_ratio_preview' => 1,
                            'img_margin_preview' => '2%',
                            'img_number_preview' => $this->context->is_mobile ? 1 : 3,
                            
                            'box_width' => $this->context->is_mobile ? '100%' : '60%',
                            'img_max_width' => '',
                            'img_max_height' => '100vh',
                            'img_wph_ratio' => 2,
                            
                            'time_slide' => 300,
                            'time_out' => 3000,
                            'auto_run' => true,
                            'pause_on_hover' => true
                        ]
                    ]);
                    ?>
                </div>
                <div class="box bottom20 clearfix">
                    <div class="advertise adv-content">
                        <?= $this->render('//modules/adsense', ['type' => 'square']) ?>
                    </div>
                    <div class="control paragraph-2016-04">
                        <?= $model->details ?>
                    </div>
                </div>

                <div class="box bottom20">
                    <div class="top-bar mag0"><h2 class="s14">Tải <?= $model->name ?> miễn phí</h2></div>
                    <div class="list-link-download">
                        <?php
                        if ($android_file !== null) {
                        ?>
                        <p><span class="ic_android"></span> <a href="<?= $android_file->product_ref_url ?>" title="Tải <?= $model->name ?> về máy Android">Tải <?= $model->name ?> về máy Android</a></p>
                        <?php
                        }
                        if ($ios_file !== null) {
                        ?>
                        <p><span class="ic_ios"></span> <a href="<?= $ios_file->product_ref_url ?>" title="Tải <?= $model->name ?> về máy iOS (iPhone, iPad)">Tải <?= $model->name ?> về máy iOS (iPhone, iPad)</a></p>
                        <?php
                        }
                        if ($windowsphone_file !== null) {
                        ?>
                        <p><span class="ic_window"></span> <a href="<?= $windowsphone_file->product_ref_url ?>" title="Tải <?= $model->name ?> về máy Windowsphone">Tải <?= $model->name ?> về máy Windowsphone</a></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?= $this->render('//modules/comment', [
                    'id' => $model->id,
                    'counter_url' => yii\helpers\Url::to(['product/counter'], true),
                    'options' => ['class' => 'box box-comment-face']
                ]) ?>
            </div>
        </div>
    </div>
    <?= $this->render('//product/right-box', ['products' => $related_items]) ?>
</div>

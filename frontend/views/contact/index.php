<?php

/* @var $this View */
/* @var $form ActiveForm */
/* @var $model ContactForm */

use frontend\models\Article;
use frontend\models\ContactForm;
use frontend\models\SiteParam;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\web\View;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js');
?>
<div class="wrap">
<div class="col-12">
    <div class="map-container">
        <iframe frameborder="0" src="<?= SiteParam::findOneByName(SiteParam::PARAM_GOOGLE_MAP)->value ?>">
        </iframe>
    </div>
</div>
<div class="col-6">
    <article class="paragraph magt10">
        <h2 class="title">Thông tin liên hệ</h2>
        <div class="magt10 magb10">
            <?= Article::findOneByType(Article::TYPE_CONTACT_US)->content ?>
        </div>
    </article>
</div>
<div class="col-6">
    <article class="paragraph magt10">
        <h2 class="title">Thông tin phản hồi</h2>
<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Họ tên'])->label(false) ?>
        
    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>
        
    <?= $form->field($model, 'phone_number')->textInput(['placeholder' => 'Số điện thoại'])->label(false) ?>

    <?= $form->field($model, 'message')->textArea(['rows' => 6, 'placeholder' => 'Nội dung phản hồi'])->label(false) ?>

    <?php /* echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-12"><div class="fluid">{image}</div></div><div class="col-6"><div class="fluid">{input}</div></div></div>',
        'options' => [
            'placeholder' => 'Mã xác minh',
        ]
    ])->label(false) */ ?>

    <?php
    if (Yii::$app->session->hasFlash('success')) {
        echo '<div class="alert success">' . Yii::$app->session->getFlash('success') . '</div>';
    } else if (Yii::$app->session->hasFlash('error')) {
        echo '<div class="alert error">' . Yii::$app->session->getFlash('error') . '</div>';
    }
    ?>
        
    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>

<?php ActiveForm::end(); ?>
    </article>
</div>
</div>
<style>
.map-container {
	position: relative;
	padding-bottom: 36%;
	height: 0;
	overflow: hidden;
}
.map-container iframe,
.map-container object,
.map-container embed {
	position: absolute;
	top:0;
	left: 0;
	width: 100%;
	height: 100%;
}
#contact-form {
    
}
#contact-form input[type="text"],
#contact-form textarea {
    width: 100%;
    padding: 0.5em;
    border-radius: 3px;
    border: solid #aaa 1px;
    resize: vertical;
}
#contact-form [type="submit"] {
    background: #d9ae5e;
    padding: 0.6em 1.2em;
    text-transform: uppercase;
    border: none;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
    transition: all 0.1s;
}
#contact-form [type="submit"]:hover {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}
#contact-form .form-group {
    margin-bottom: 1em;
}
#contact-form .help-block {
    font-size: 0.9em;
    font-style: italic;
}
.alert {
    float: right;
}
</style>
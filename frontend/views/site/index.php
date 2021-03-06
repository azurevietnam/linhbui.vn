<?php

use frontend\models\Article;
use yii\helpers\Url;

?>
<?= $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 800,
        'time_out' => 4000,
        'img_max_width' => '1010px'
    ]
]);
?>
<div class="wrap">
    <br class="clearfix">
    
    <section class="row list-view">
        <h2 class="title">
            <hr>
            <strong>
                <i></i>
                <span>Chúng tôi là ai ?</span>
                <i></i>
            </strong>
        </h2>
        <div class="introtext paragraph col-12 magt5">
            <?= $about->description ?>
        </div>
    </section>
    
    <br class="clearfix">
    
    <?= $this->render('//product-category/list-view', [
        'title' => 'Bộ sưu tập mới',
        'items' => $product_categories
    ]) ?>
    
</div>

    <br class="clearfix">
    
    <section class="row list-view" id="review-box">
        <strong class="title">Khách hàng nói về chúng tôi</strong>
        <div class="line"></div>
        <div class="introtext paragraph">
            &ldquo;&nbsp;<?= $review->description ?>&nbsp;&rdquo;
        </div>
        <div class="img"></div>
        <p class="customer-name"><?= $review->customer_name ?></p>
        <p class="customer-job"><?= $review->customer_job ?></p>
    </section>
    
    <br class="clearfix">
    
<div class="wrap">    
    
    <?= $this->render('//product/list-view', [
        'title' => 'Sản phẩm nổi bật',
        'items' => $products
    ]) ?>
</div>

<br class="clearfix">

<section class="row">
    <div id="send-email" class="col-12">
        <strong class="title">Đăng ký nhận thông tin từ chúng tôi!</strong>
        <p class="desc">Đăng ký email để nhận tin tức các sự kiện và chương trình giảm giá sớm nhất</p>
        <form class="row" method="POST" action="<?= Url::to(['contact/create-with-email'], true) ?>">
            <input type="text" name="email" placeholder="Nhập email của bạn">
            <button type="submit" name="submit">Đăng ký</button>
        </form>
        <div class="message"></div>
    </div>
</section>

<br class="clearfix">

<style>
#review-box {
    background-image: url("<?= Yii::$app->params['images_url'] ?>/bg_review.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    
    padding: 30px 0;
    text-align: center;
}
#review-box .title {
    font-weight: bold;
    font-size: 1.8em;
    line-height: 1.4em;
    color: #4d4d4d;
    margin-top: 0;
}
#review-box .introtext {
    max-width: 600px;
    margin: 1em auto;
    text-align: center;
}
#review-box .img {
    width: 70px;
    height: 70px;
    border-radius: 5px;
    margin: 0.5em auto;
    background-image: url('<?= $review->getImage(Article::IMAGE_TINY) ?>');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
#review-box .line {
    width: 200px;
    height: 1px;
    background: #333;
    margin: 20px auto;
}
#review-box .customer-name {
    font-weight: bold;
    text-transform: uppercase;
}
#review-box .customer-job {
    font-weight: bold;
    font-size: 0.85em;
    opacity: 0.9;
}

#send-email {
    background: #eee;
    padding-top: 70px;
    padding-bottom: 100px;
    
    margin-bottom: 1em;
    background-image: url("<?= Yii::$app->params['images_url'] ?>/bg_email.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
#send-email > * {
    margin: 0 auto;
    width: 100%;
    max-width: 640px;
}
#send-email .title {
    display: block;
    width: 100%;
    text-align: center;
    
    text-transform: uppercase;
    font-size: 1.8em;
    line-height: 1.4em;
    color: #4d4d4d;
    margin-bottom: 0.3em;
}
#send-email .desc {
    color: #aaa;
    text-align: center;
    margin-bottom: 1.8em;
}
#send-email input {
    width: calc(100% - 7em);
    float: left;
    
    height: 3em;
    padding: 0 1em;
    border: none;
    border-radius: 4px 0 0 4px;
    color: #cea00e;
}
#send-email input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #ddd;
}
#send-email input::-moz-placeholder { /* Firefox 19+ */
  color: #ddd;
}
#send-email input:-ms-input-placeholder { /* IE 10+ */
  color: #ddd;
}
#send-email input:-moz-placeholder { /* Firefox 18- */
  color: #ddd;
}
#send-email button {
    width: 7em;
    float: right;
    
    height: 3em;
    border: none;
    border-radius: 0 4px 4px 0;
    background: #d9ae5e;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}
#send-email input:focus,
#send-email button:hover {
    border-color: #cea00e;
}
#send-email .message {
    font-style: italic;
    font-size: 0.9em;
    margin-top: 0.2em;
}
#send-email .success {
    color: #2a0;
}
#send-email .fail {
    color: #e0221a;
}
</style>

<script>
var form = document.querySelector("#send-email form");
var message = document.querySelector("#send-email .message");
form.onsubmit = function(event) {
    event.preventDefault();
    var email_input = form.querySelector("input[name=email]");
    var email = email_input.value;
    if (email === "") {
        return;
    }
    email_input.value = "";
    var url = form.action;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            console.log(xhttp.responseText);
            if (xhttp.responseText === "1") {
                message.classList.remove("fail");
                message.classList.add("success");
                message.innerHTML = "Email đã được gửi, cảm ơn bạn!";
            } else {
                message.classList.remove("success");
                message.classList.add("fail");
                message.innerHTML = "Không gửi được. Có thể email này đã tồn tại hoặc không đúng định dạng.";
            }
        }
    };
    xhttp.open("POST", url);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email + "&<?= Yii::$app->request->csrfParam; ?>=<?= Yii::$app->request->csrfToken; ?>");
    return;
};
</script>
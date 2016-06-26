<?php

use frontend\models\Article;
use yii\helpers\Url;

?>
<?= $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 600,
        'time_out' => 3000,
        'img_max_width' => '1010px'
    ]
]);
?>
<div class="wrap">
    <section class="row list-view">
        <h2 class="title">
            <i></i>
            <span>Chúng tôi là ai?</span>
            <i></i>
        </h2>
        <div class="introtext paragraph col-12">
            <?= Article::findOneByType(Article::TYPE_ABOUT_US)->description ?>
        </div>
    </section>
    
    <?= $this->render('//product-category/list-view', [
        'title' => 'Bộ sưu tập mới',
        'items' => $product_categories
    ]) ?>
    
    <?= $this->render('//product/list-view', [
        'title' => 'Sản phẩm nổi bật',
        'items' => $products
    ]) ?>
    
    <section class="row list-view">
        <div id="send-email" class="col-12">
            <form class="row" method="POST" action="<?= Url::to(['contact/create-with-email'], true) ?>">
                <label>Gửi email theo dõi</label>
                <input type="input" name="email">
                <button type="submit" name="submit">Gửi</button>
            </form>
            <div class="message"></div>
        </div>
    </section>
    
</div>

<style>
#send-email {
    background: #eee;
    padding: 125px 0;
    
    margin-bottom: 1em;
}
#send-email > * {
    margin: 0 auto;
    width: 50%;
    min-width: 300px;
}
#send-email label {
    display: block;
    width: 100%;
    text-align: center;
    
    text-transform: uppercase;
    margin-bottom: 1em;
    font-size: 1.2em;
    font-weight: bold;
    color: #cea00e;
}
#send-email input {
    width: calc(99% - 5em);
    float: left;
    
    height: 2em;
    padding: 0 5px;
    border: 1px solid #ccc;
    color: #cea00e;
}
#send-email button {
    width: 5em;
    float: right;
    
    height: 2em;
    border: 1px solid #ccc;
    background: #eee;
    text-transform: uppercase;
    color: #cea00e;
    cursor: pointer;
}
#send-email input:focus,
#send-email button:hover {
    border-color: #cea00e;
}
#send-email .message {
}
#send-email .success {
    color: #2a0;
}
#send-email .fail {
    color: #e00;
}
</style>

<script>
var form = document.querySelector("#send-email form");
var message = document.querySelector("#send-email .message");
form.onsubmit = function(event) {
    event.preventDefault();
    var email_input = form.querySelector("input[name=email]");
    var email = email_input.value;
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
                message.innerHTML = "Không gửi được. Hoặc email này đã tồn tại, hoặc không đúng định dạng.";
            }
        }
    };
    xhttp.open("POST", url);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email + "&<?= Yii::$app->request->csrfParam; ?>=<?= Yii::$app->request->csrfToken; ?>");
    return;
};
</script>
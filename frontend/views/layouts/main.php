<?php
/* @var $this View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use frontend\models\ArticleCategory;
use frontend\models\Menu;
use frontend\models\ProductCategory;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<?php require_once 'meta.php'; ?>
<?= Html::csrfMetaTags() ?> 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
function shownav(){if(document.getElementById('categories-list').style.display=="block"){document.getElementById('categories-list').style.display='none';}
    else{document.getElementById('categories').style.display='none';document.getElementById('categories-list').style.display='block';}}
function d_shownav(){document.getElementById('categories').style.display='none';document.getElementById('categories-list').style.display='block';}
function d_hidenav(){document.getElementById('categories').style.display='none';document.getElementById('categories-list').style.display='none';}
function d_shownav1(){document.getElementById('categories-list').style.display='none';document.getElementById('categories').style.display='block';}
function d_hidenav1(){document.getElementById('categories-list').style.display='none';document.getElementById('categories').style.display='none';}
function shownav1(){if (document.getElementById('categories').style.display=='block'){document.getElementById('categories').style.display='none';}
    else{document.getElementById('categories-list').style.display = 'none';document.getElementById('categories').style.display='block';}}
function showmenuc2(div_id){if (document.getElementById(div_id).style.display=='block'){document.getElementById(div_id).style.display='none';}
    else{document.getElementById(div_id).style.display='block';}}
</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '935301939844245');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=935301939844245&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
<?php require_once 'header.php'; ?>
<div class="containers">
<div class="main">
<?= $content ?>
</div>
</div>
<script>
<?php $this->beginBlock('JS_END') ?>
/////////////
function updateProductDownloadCount(id, download_count, next_url){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            window.location = next_url;
        }
    };
    xhttp.open("POST", "<?= Url::to(['product/counter'], true) ?>", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + id + "&download_count=" + download_count + "&<?= Yii::$app->request->csrfParam; ?>=<?= Yii::$app->request->csrfToken; ?>");
}
//////////////
paragraphStyle();
window.addEventListener("resize", function(){
    paragraphStyle();
});
function paragraphStyle() {
    var g;
    var gs = document.getElementsByClassName("paragraph-2016-04");
    for (var k = 0; k < gs.length; k++) {
        g = gs[k];
        if (typeof(g) !== "undefined" && g !== null) {
            var g_w = parseInt(window.getComputedStyle(g, null).getPropertyValue("width"));
            var els = g.querySelectorAll("table, img, iframe");
            for (var i = 0; i < els.length; i++) {
                setStyle(els[i]);
            }
            function setStyle(el) {
                el.style.maxWidth = "initial";
                el.style.maxHeight = "initial";
                el.style.minWidth = "initial";
                el.style.minHeight = "initial";
                el_w = parseInt(window.getComputedStyle(el, null).getPropertyValue("width"));
                if (el_w > g_w) {
                    el.style.paddingRight = "0px";
                    el.style.paddingLeft = "0px";
                    el.style.boxSizing = "border-box";
                    el.style.height = "auto";
                    el.style.width = g_w + "px";
                }
            }
        }
    }
}
<?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['JS_END'], $this::POS_END, 'JS_END'); ?>
<?php require_once 'footer.php'; ?>
<?php require_once 'plugins.php'; ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

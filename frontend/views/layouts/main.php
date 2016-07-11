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
<?php require_once 'meta.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<?= Html::csrfMetaTags() ?> 
<script type="text/javascript" language="javascript">
//Top menu slide down and up
var menu = {
    showNext : function(e) {
        var duration = 300;
        var timeout = 20;
        var u = e.nextElementSibling; // and overflow hidden
        u.style.transition = "all " + 0.001 * duration + "s";
        if (u.classList.contains("open")) {
            u.style.height = u.scrollHeight + "px";
        }
        setTimeout(function() {
            if (u.classList.contains("open")) {
                u.classList.remove("open");
                u.style.height = "0px";
            } else {
                u.classList.add("open");
                u.style.height = u.scrollHeight + "px";
            }
            if (e.innerHTML === "+") {
                e.innerHTML = "-";
            } else if (e.innerHTML === "-") {
                e.innerHTML = "+";
            }
        }, timeout);
        setTimeout(function() {
            if (u.classList.contains("open")) {
                u.style.transition = "all 0s";
                u.style.height = "auto";
            }
        }, duration + timeout);
    }
};
window.addEventListener("load", function() {
    if (window.innerHeight < 741) { // value from CSS
        mbts = document.querySelectorAll(".menu button");
        for (var i = 0; i < mbts.length; i++) {
            mbts[i].addEventListener("click", function() {
                menu.showNext(this);
            });
        }
    }
});

//Paragraph html
paragraphStyle();
thumnailStyle();
window.addEventListener("load", function(){
    paragraphStyle();
    thumnailStyle();
});
window.addEventListener("resize", function(){
    paragraphStyle();
    thumnailStyle();
});
function paragraphStyle() {
    var g;
    var gs = document.getElementsByClassName("paragraph");
    for (var k = 0; k < gs.length; k++) {
        g = gs[k];
        if (typeof(g) !== "undefined" && g !== null) {
            var g_w = parseInt(window.getComputedStyle(g, null).getPropertyValue("width"));
            var els = g.querySelectorAll("*");
            for (var i = 0; i < els.length; i++) {
                setStyle(els[i]);
            }
            function setStyle(el) {
                el_w = parseInt(window.getComputedStyle(el, null).getPropertyValue("width"));
                if (el_w > g_w) {
                    el.style.maxWidth = "initial";
                    el.style.maxHeight = "initial";
                    el.style.minWidth = "initial";
                    el.style.minHeight = "initial";
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

function thumnailStyle() {
    var ths = document.querySelectorAll(".list-view .thumb");
    var d;
    for (var i = 0; i < ths.length; i++) {
        (function(index) {
            ths[index].onmouseover = function() {
                d = ths[index].querySelector(".desc");
                d.style.marginTop = 0.5 * (ths[index].clientHeight - d.offsetHeight) + "px";
            };
        })(i);
    }
}
</script>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--HEADER-->
<?php require_once 'header.php'; ?>
<!--MAIN CONTENT-->
<?php
if (!in_array(Yii::$app->controller->id, ['site'])) {
?>
<?= $this->render('//modules/breadcrumbs') ?>
<?php
}    
?>
<div class="main-content container">
<?= $content ?>
<div class="clearfix"></div>
</div>
<!--FOOTER-->
<?php require_once 'footer.php'; ?>
<?php require_once 'plugins.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

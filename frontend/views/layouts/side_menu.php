<?php

use frontend\models\Menu;
use frontend\models\ProductCategory;
use yii\helpers\Url;

$data1 = [
    [
        'label' => 'Trang chủ',
        'url' => Url::home(true),
        'parent_key' => null
    ]
];
$data2 = array();
$productCategories = ProductCategory::getProductCategories(['orderBy' => 'position asc, is_hot desc']);
foreach ($productCategories as $item) {
    $data2[$item->id] = [
        'label' => $item->name,
        'url' => $item->getLink(),
        'parent_key' => $item->parent_id
    ];
}
Menu::init([
//    'HomePage' => $data1,
    'ProductCategory' => $data2
]);

$menu = Menu::getTopParents();

?>
<nav class="side-menu" id="side-menu">
    <ul>
        <?php
        foreach ($menu as $key => $item) {
        ?>
        <li <?= $item->isCurrent() ? 'class="active"' : '' ?>>
            <?= $item->a() ?>
            <?php
            if (!empty($item->getChildren())) {
            ?>
            <button class="sub-bt <?= $item->isCurrent() ? 'open' : '' ?>"></button>
            <ul>
                <?php
                foreach ($item->getChildren() as $c_key => $c_item) {
                ?>
                <li <?= $c_item->isCurrent() ? 'class="active"' : '' ?>>
                    <?= $c_item->a() ?>
                    <?php
                    if (!empty($c_item->getChildren())) {
                    ?>
                    <button class="sub-bt <?= $c_item->isCurrent() ? 'open' : '' ?>"></button>
                    <ul>
                        <?php
                        foreach ($c_item->getChildren() as $c2_key => $c2_item) {
                        ?>
                        <li <?= $c2_item->isCurrent() ? 'class="active"' : '' ?>>
                            <?= $c2_item->a() ?>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <?php
                    }
                    ?>
                </li>
                <?php
                }
                ?>
            </ul>
            <?php
            }
            ?>
        </li>
        <?php
        }
        ?>
    </ul>
</nav>

<script>
// toggle side menu
var bt = document.getElementById("toggle-bt");
var body = document.getElementsByTagName("body")[0];
bt.addEventListener("click", function() {
//    if (window.getComputedStyle(nav, null).getPropertyValue("position") === "fixed") {
//    }
    if (!body.classList.contains("toggle")) {
        body.classList.add("toggle");
    } else {
        body.classList.remove("toggle");
    }
});


var bts = document.getElementsByClassName("sub-bt");
for (var i = 0; i < bts.length; i++) {
    if (bts[i].classList.contains("open")) {
        bts[i].innerHTML = "&#215;";
    } else {
        bts[i].innerHTML = "&#43;";
    }
    bts[i].addEventListener("click", function(){
        if (this.classList.contains("open")) {
            this.classList.remove("open");
            this.innerHTML = "&#43;";
        } else {
            this.classList.add("open");
            this.innerHTML = "&#215;";
        }
    });
}
</script>

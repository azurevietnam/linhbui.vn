<?php

use frontend\models\Menu;

$menu = Menu::getData2(null);
$current_id = Menu::getCurrentId($menu);

?>
<ul class="nav nav-pills nav-stacked">
    <?php
    foreach ($menu as $id => $item) {
        ?>
        <li <?= $id === $current_id ? 'class=active' : '' ?>><a href="<?= $item['url'] ?>"><?= $item['label'] ?></a></li>
        <?php
    }
    ?>
</ul>
<?php
$this->registerCss('
.nav-pills {
    padding: 0 3% 0 0;
}
.nav-pills > li > a {
    padding: 3%;
}
');

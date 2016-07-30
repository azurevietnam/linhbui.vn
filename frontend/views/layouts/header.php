<?php

use frontend\models\Menu;
use yii\helpers\Url;

$this->registerCss('.triangle-arrow{'
        . 'transform:scale(1,1.3);'
        . '-webkit-transform:scale(1,1.3);'
        . 'display:inline-block;'
        . '}'
        . '@media screen and (max-width: 741px) {'
        . '.triangle-arrow{display:none}'
        . '}');
?>
<div class="header container magb10">
    <div class="wrap">
        <a class="logo" href="<?= Url::home(true) ?>" title="Linh Bùi"></a>
        <div class="menu top-menu">
            <button type="button" title="Danh mục" class="main-button">
                <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
            </button>
            <ul>
            <?php
            foreach (Menu::getTopParents() as $item) {
            ?><li class="<?= $item->isCurrent() ? 'active' : '' ?>">
                    <?= $item->a() ?>
                    <?php
                    if (($children = $item->getChildren()) !== []) {
                    ?>
                    <i class="down-arrow"></i>
                    <button type="button"><i class="right-orange-arrow"></i></button>
                    <ul>
                        <?php
                        foreach ($children as $c_item) {
                        ?><li>
                            <?= $c_item->a() ?>
                            <?php
                            if (($children2 = $c_item->getChildren()) !== []) {
                            ?>
                            <button type="button"><i class="right-orange-arrow"></i></button>
                            <ul>
                                <?php
                                foreach ($children2 as $c2_item) {
                                ?><li>
                                    <?= $c2_item->a([], "<span class=\"triangle-arrow\">&#9656;</span> $c2_item->label") ?>
                                </li><?php
                                }
                                ?>
                            </ul>
                            <?php
                            }
                            ?>
                        </li><?php
                        }
                        ?>
                    </ul>
                    <?php
                    }
                    ?>
                </li><?php
            }
            ?>
            </ul>
        </div>
    </div>
</div>
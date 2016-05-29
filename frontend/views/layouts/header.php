<?php

use frontend\models\Menu;
use yii\helpers\Url;

?>
<div class="header">
    <div>
        <a class="logo" href="<?= Url::home(true) ?>" title="Linh Bùi"></a>
        <div class="top-menu">
            <button type="button">Danh mục</button>
            <ul>
            <?php
            foreach (Menu::getTopParents() as $item) {
            ?><li>
                    <?= $item->a() ?>
                    <?php
                    if (($children = $item->getChildren()) !== []) {
                    ?>
                    <button type="button">+</button>
                    <ul>
                        <?php
                        foreach ($children as $c_item) {
                        ?><li>
                            <?= $c_item->a() ?>
                            <?php
                            if (($children2 = $c_item->getChildren()) !== []) {
                            ?>
                            <button type="button">+</button>
                            <ul>
                                <?php
                                foreach ($children2 as $c2_item) {
                                ?><li>
                                    <?= $c2_item->a() ?>
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

<?php

use frontend\models\Menu;

?>
<div class="side-menu">
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
<?php

use frontend\models\Menu;

?>
<?php
if (!$this->context->is_mobile) {
?>
<div class="menu side-menu fluid">
    <ul>
        <li class="title">
            <a href="javascript:;" title="Menu">
                <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <!--<path d="M0 0h24v24H0z" fill="none"/>-->
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
                <span>Menu</span>
            </a>
        </li>
    <?php
    foreach (Menu::getTopParents() as $item) {
    ?><li class="<?= $item->isCurrent() ? 'active' : '' ?>">
            <?= $item->a() ?>
            <?php
            if (($children = $item->getChildren()) !== []) {
            ?>
            <button type="button"><?= $item->isCurrent() ? '-' : '+' ?></button>
            <ul class="<?= $item->isCurrent() ? 'open' : '' ?>">
                <?php
                foreach ($children as $c) {
                    ?><li class="<?= $c->isCurrent() ? 'active' : '' ?>">
                    <?= $c->a() ?>
                    <?php
                    if (($children2 = $c->getChildren()) !== []) {
                    ?>
                    <button type="button"><?= $c->isCurrent() ? '-' : '+' ?></button>
                    <ul class="<?= $c->isCurrent() ? 'open' : '' ?>">
                        <?php
                        foreach ($children2 as $c2) {
                        ?><li class="<?= $c2->isCurrent() ? 'active' : '' ?>">
                            <?= $c2->a() ?>
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
<style>
.side-menu {
    margin-top: 0;
}
.side-menu li > button {
    text-align: center;
    color: #cea00e;
    background: none;
    position: absolute;
    border: none;
    width: 2.5em;
    line-height: calc(2.5em - 2px);
    height: 2.5em;
    top: 0.5em;
    right: 0;
}
.side-menu li.active > a {
    font-weight: bold;
}
.side-menu li > ul {
    overflow: hidden;
    height: 0;
}
.side-menu li.active > ul {
    height: auto;
}
.side-menu > ul > li > ul > li > ul {
    text-transform: none;
    color: #939393;
}
.side-menu > ul > li ul > li {
    padding-left: 0.5em;
}
.side-menu .title {
    color: #fff;
    font-weight: bold;
    border-top-width: 1px;
    background: #d9ae5e;
    border-color: #d9ae5e;
}
.side-menu .title svg {
    width: 2em;
    height: 2em;
    display: inline-block;
    vertical-align: middle;
    margin-right: 0.5em;
    margin-top: -0.3em
}
.side-menu li a {
    width: 100%;
    padding: 0.8em;
    display: inline-block;
}
.side-menu li a:hover {
    text-decoration: underline;
}
.side-menu li.title a:hover {
    text-decoration: none;
    cursor: default;
}
.side-menu > ul > li {
    border: 1px solid #fdebc4;
    border-top-width: 0;
    color: #cea00e;
    text-transform: uppercase;
}
@media screen and (max-width: 740px) {
    .side-menu {
        display: none;
    }
}
</style>
<?php
}

<?php

use common\utils\Pagination;

$pageOpt = Pagination::getResult(
    ['current' => $pagination['current'], 'total' => $pagination['total']],
    ['left' => 1, 'right' => 2]
);
?>
<div class="wp_pagenavi">
    <ul>
        <?php
        if (count($pageOpt['arr']) > 1) {
            if ($pageOpt['btn']['first']) {
                ?>
                <a title="Trở về trang đầu" href="<?= $this->context->link_canonical ?>">«</a>
                <?php
            }
            foreach ($pageOpt['arr'] as $p) {
                ?>
                <a <?= $p == $pagination['current'] ? 'class=active' : '' ?> title="Trang <?= $p ?>" href="<?= $this->context->link_canonical ?><?= $p > 1 ? '?page=' . $p : '' ?>"><?= $p ?></a>
                <?php
            }
            if ($pageOpt['btn']['last']) {
                ?>
                <a title="Đi đến trang cuối" href="<?= $this->context->link_canonical . '?page=' . $pagination['total'] ?>">»</a>
                <?php
            }
        }
        ?>
    </ul>
    <div class="counter">
        Hiển thị <?= $pagination['firstItemOnPage'] < $pagination['lastItemOnPage'] ? $pagination['firstItemOnPage'] . '&ndash;' . $pagination['lastItemOnPage'] : ( $pagination['firstItemOnPage'] == $pagination['lastItemOnPage'] ? $pagination['firstItemOnPage'] : 0 ) ?> / <?= $pagination['totalItems'] ?> kết quả
    </div>
</div>
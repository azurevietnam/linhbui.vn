<?php

use common\utils\Pagination;

$pageOpt = Pagination::getResult(
    ['current' => $pagination['current'], 'total' => $pagination['total']],
    ['left' => 1, 'right' => 2]
);
?>
<?php
if (count($pageOpt['arr']) > 1) {
?>
<div class="pagination">
    <ul>
        <?php
            if ($pageOpt['btn']['first']) {
                ?>
                <li><a title="Trở về trang đầu" href="<?= $this->context->link_canonical ?>">&Lt; First</a></li>
                <?php
            }
            foreach ($pageOpt['arr'] as $p) {
                ?>
                <li class="<?= $p == $pagination['current'] ? 'active' : '' ?>"><a title="Trang <?= $p ?>" href="<?= $this->context->link_canonical ?><?= $p > 1 ? '?page=' . $p : '' ?>"><?= $p ?></a></li>
                <?php
            }
            if ($pageOpt['btn']['last']) {
                ?>
                <li><a title="Đi đến trang cuối" href="<?= $this->context->link_canonical . '?page=' . $pagination['total'] ?>">Last &Gt;</a></li>
                <?php
            }
        ?>
    </ul>
</div>
<?php
}
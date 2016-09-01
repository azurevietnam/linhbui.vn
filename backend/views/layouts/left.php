<?php

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->user->identity ? Yii::$app->user->identity->getImage() : Yii::$app->params['images_url'] . '/avatar.jpg' ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity ? Yii::$app->user->identity->firstname : 'Khách' ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php if(!Yii::$app->user->isGuest){ ?>
        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NOW <?= date('d/m/Y H:i') ?></li>
             <!--Sản phẩm--> 
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['product', 'product-image', 'product-file', 'product-category-to-product']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-diamond"></i> <span>Sản phẩm</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'product' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('product/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'product' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('product/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
             <!--Danh mục sản phẩm--> 
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['product-category']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-th-large"></i> <span>Danh mục sản phẩm</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'product-category' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('product-category/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'product-category' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('product-category/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <!-- Bài viết -->
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['article']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Bài viết</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'article' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('article/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'article' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('article/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <!-- Danh mục tin tức -->
<!--            <li class="treeview <?= in_array(Yii::$app->controller->id, ['article-category']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-folder-open"></i> <span>Danh mục tin tức</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'article-category' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('article-category/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'article-category' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('article-category/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>-->
            <!-- Video -->
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['video']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-youtube-play"></i> <span>Video</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'video' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('video/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'video' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('video/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
             <!--Album ảnh--> 
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['gallery', 'gallery-image']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-picture-o"></i> <span>Album ảnh</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'gallery' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('gallery/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'gallery' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('gallery/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
             <!-- Adsense --> 
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['adsense']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-television"></i> <span>Adsense</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'adsense' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('adsense/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'adsense' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('adsense/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
             <!--Slideshow--> 
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['slideshow-item']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-television"></i> <span>Slideshow</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'slideshow-item' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('slideshow-item/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'slideshow-item' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('slideshow-item/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <!-- Tags -->
<!--            <li class="treeview <?= in_array(Yii::$app->controller->id, ['tag']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Tags</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'tag' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('tag/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'tag' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('tag/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>-->
            <!-- Liên kết hay -->
<!--            <li class="treeview <?= in_array(Yii::$app->controller->id, ['cta-item']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-external-link-square"></i> <span>Liên kết hay</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'cta-item' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('cta-item/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'cta-item' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('cta-item/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>-->
            <!-- Widget -->
<!--            <li class="treeview <?= in_array(Yii::$app->controller->id, ['widget', 'page-group', 'html-box', 'seo-info']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-puzzle-piece"></i> <span>Trang, widget, seo, ...</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'page-group' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('page-group/index') ?>"><i class="fa fa-circle-o"></i> Trang</a></li>
                    <li class="<?= Yii::$app->controller->id == 'widget' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('widget/index') ?>"><i class="fa fa-circle-o"></i> Widget</a></li>
                    <li class="<?= Yii::$app->controller->id == 'html-box' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('html-box/index') ?>"><i class="fa fa-circle-o"></i> Box HTML </a></li>
                    <li class="<?= Yii::$app->controller->id == 'seo-info' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('seo-info/index') ?>"><i class="fa fa-circle-o"></i> Thông tin SEO</a></li>
                </ul>
            </li>-->
            <!-- Thông tin -->
<!--            <li class="treeview <?= in_array(Yii::$app->controller->id, ['info']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-file-text"></i> <span>Thông tin</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'info' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('info/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'info' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('info/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>-->
            <!-- Thông tin SEO -->
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['seo-info']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-leaf"></i> <span>Thông tin SEO</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'seo-info' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('seo-info/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'seo-info' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('seo-info/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <!-- Thông số -->
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['site-param']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Thông số</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'site-param' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('site-param/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'site-param' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('site-param/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <!-- Chuyển hướng liên kết -->
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['redirect-url']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-map-signs"></i> <span>Chuyển hướng liên kết</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'redirect-url' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('redirect-url/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'redirect-url' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('redirect-url/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>            
            <!-- Liên hệ -->
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['contact']) ? 'active' : '' ?>">
                <a href="<?= Yii::$app->urlManager->createUrl('contact/index') ?>">
                    <i class="fa fa-envelope"></i> <span>Liên hệ</span></i>
                </a>
            </li>
            <!-- Người dùng -->
            <li class="treeview <?= in_array(Yii::$app->controller->id, ['user', 'user-log']) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-user-secret"></i> <span>Người dùng</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'user' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('user/index') ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="<?= Yii::$app->controller->id == 'user' && Yii::$app->controller->action->id == 'create' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('user/create') ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                    <li class="<?= Yii::$app->controller->id == 'user-log' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('user-log/index') ?>"><i class="fa fa-circle-o"></i> Nhật ký</a></li>
                </ul>
            </li>
            <!-- Phân quyền -->
            <li class="treeview <?= Yii::$app->controller->module->id == 'admin' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Phân quyền</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->module->id == 'admin' && Yii::$app->controller->id == 'assignment' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('admin/assignment') ?>"><i class="fa fa-circle-o"></i> Assignment</a></li>
                    <li class="<?= Yii::$app->controller->module->id == 'admin' && Yii::$app->controller->id == 'permission' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('admin/permission') ?>"><i class="fa fa-circle-o"></i> Permission</a></li>
                    <li class="<?= Yii::$app->controller->module->id == 'admin' && Yii::$app->controller->id == 'role' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('admin/role') ?>"><i class="fa fa-circle-o"></i> Role</a></li>
                    <li class="<?= Yii::$app->controller->module->id == 'admin' && Yii::$app->controller->id == 'route' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('admin/route') ?>"><i class="fa fa-circle-o"></i> Route</a></li>
                    <li class="<?= Yii::$app->controller->module->id == 'admin' && Yii::$app->controller->id == 'rule' ? 'active' : '' ?>"><a href="<?= Yii::$app->urlManager->createUrl('admin/rule') ?>"><i class="fa fa-circle-o"></i> Rule</a></li>
                </ul>
            </li>
        </ul>
        <?php } ?>
    </section>
    <!-- /.sidebar -->
</aside>
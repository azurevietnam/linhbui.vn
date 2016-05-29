<header class="main-header">
    <!-- Logo -->
    <a href="<?= Yii::$app->params['backend_url'] ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?= Yii::$app->params['logo_sm'] ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?= Yii::$app->params['logo_lg'] ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <?php // if(!Yii::$app->user->isGuest){ ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::$app->user->identity ? Yii::$app->user->identity->getImage() : Yii::$app->params['images_url'] . '/avatar.jpg' ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= Yii::$app->user->identity ? Yii::$app->user->identity->firstname : 'Khách' ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= Yii::$app->user->identity ? Yii::$app->user->identity->getImage() : Yii::$app->params['images_url'] . '/avatar.jpg' ?>" class="img-circle" alt="User Image">
                            <p>
                                <?= Yii::$app->user->identity ? Yii::$app->user->identity->lastname . ' ' . Yii::$app->user->identity->firstname : 'Khách' ?>
                                <!--<small>Kích hoạt ngày <?= Yii::$app->user->identity ? date('d/m/Y', Yii::$app->user->identity->created_at) : '' ?></small>-->
                            </p>
                        </li>
                        <!-- Menu Body -->
<!--                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                        <?php if(!Yii::$app->user->isGuest){ ?>
                            <div class="pull-left">
                                <a href="<?= yii\helpers\Url::to(['user/update', 'id' => Yii::$app->user->identity->id]) ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= Yii::$app->urlManager->createUrl('site/logout') ?>" class="btn btn-default btn-flat">Đăng xuất</a>
                            </div>
                        <?php }else{ ?>
                            <div class="text-center">
                                <a href="<?= Yii::$app->urlManager->createUrl('site/login') ?>" class="btn btn-default btn-flat">Đăng nhập</a>
                            </div>
                        <?php } ?>
                        </li>
                    </ul>
                </li>
                <?php // } ?>
                <!-- Control Sidebar Toggle Button -->
<!--                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>
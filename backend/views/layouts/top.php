<header class="main-header">
    <!-- Logo -->
    <a href="<?= Yii::$app->params['backend_url'] ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?= Yii::$app->params['logo_mini'] ?></span>
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
                <!-- Messages: style can be found in dropdown.less-->
<!--                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                             inner menu: contains the actual data 
                            <ul class="menu">
                                <li> start message 
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/img/beautiful-girl-ava.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li> end message 
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Sales Department
                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= Yii::$app->params['backend_url'] ?>/admin-lte/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>-->
                <!-- Notifications: style can be found in dropdown.less -->
<!--                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                             inner menu: contains the actual data 
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>-->
                <!-- Tasks: style can be found in dropdown.less -->
<!--                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                             inner menu: contains the actual data 
                            <ul class="menu">
                                <li> Task item 
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li> end task item 
                                <li> Task item 
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li> end task item 
                                <li> Task item 
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li> end task item 
                                <li> Task item 
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li> end task item 
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>-->
                <!-- User Account: style can be found in dropdown.less -->
                <?php // if(!Yii::$app->user->isGuest){ ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::$app->user->identity ? Yii::$app->user->identity->getImage('--120x120') : Yii::$app->params['backend_url'] . '/admin-lte/dist/img/beautiful-girl-ava.jpg' ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= Yii::$app->user->identity ? Yii::$app->user->identity->firstname : 'Khách' ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= Yii::$app->user->identity ? Yii::$app->user->identity->getImage('--120x120') : Yii::$app->params['backend_url'] . '/admin-lte/dist/img/beautiful-girl-ava.jpg' ?>" class="img-circle" alt="User Image">
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
<?php
/* @var $this View */
/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'class="navbar navbar-default navbar-inverse yamm navbar-static-top"',
                ],
            ]);
            $menuItems = [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <header class="main-header">
                <div class="container">
                    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="sidebar-nav animated fadeIn">
                            <li>
                                <a data-toggle="collapse" href="#coll-css" class="collapsed"><i class="fa fa-user"></i> User</a>
                                <ul id="coll-css" class="menu-submenu list-unstyled collapse">
                                    <?php if (Yii::$app->user->isGuest) { ?>
                                        <li><a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-arrow-circle-right"></i> Login</a></li>
                                        <?php } else { ?>
                                        <li><a href="<?= Url::to(['site/logout']) ?>"><i class="fa fa-arrow-circle-right"></i> Logout</a></li>
                                    <?php }
                                    ?>
                                    <li><a href="<?= Url::to(['/site/signup']) ?>"><i class="fa fa-arrow-circle-right"></i> Register</a></li>
                                </ul>
                            </li>



                            <li>
                                <a data-toggle="collapse" href="#coll-btn" class="collapsed"><i class="fa fa-hand-o-up"></i> Buttons</a>
                                <ul id="coll-btn" class="menu-submenu list-unstyled collapse">
                                    <li><a href="btn_basic_buttons.html"><i class="fa fa-arrow-circle-right"></i> Basic Buttons</a></li>
                                    <li><a href="btn_library_buttons.html"><i class="fa fa-arrow-circle-right"></i> Buttons Library</a></li>
                                    <li><a href="btn_social_buttons.html"><i class="fa fa-arrow-circle-right"></i> Social Buttons</a></li>
                                </ul>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#coll-icons" class="collapsed"><i class="fa fa-briefcase"></i> Icons</a>
                                <ul id="coll-icons" class="menu-submenu list-unstyled collapse">
                                    <li><a href="icons_artificial_reason.html"><i class="fa fa-font"></i> Artificial Reason Icons</a></li>
                                    <li><a href="icons_glyph.html"><i class="fa fa-arrow-circle-right"></i> Glyphicons Icons</a></li>
                                    <li><a href="icons_awesome.html"><i class="fa fa-flag"></i> Font Awesome</a></li>
                                    <li><a href="icons_social.html"><i class="fa fa-twitter"></i> Social Icons</a></li>
                                </ul>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#coll-comp" class="collapsed"><i class="fa fa-list-alt"></i> Components</a>
                                <ul id="coll-comp" class="menu-submenu list-unstyled collapse">
                                    <li><a href="components_dropdowns.html"><i class="fa fa-arrow-circle-right"></i> Components Dropdowns</a></li>
                                    <li><a href="components_panels.html"><i class="fa fa-arrow-circle-right"></i> Panels</a></li>
                                    <li><a href="components_lists.html"><i class="fa fa-arrow-circle-right"></i> Lists</a></li>
                                    <li><a href="components_paginations.html"><i class="fa fa-arrow-circle-right"></i> Paginations</a></li>
                                    <li><a href="components_labels_badges.html"><i class="fa fa-arrow-circle-right"></i> Labels and Badges</a></li>
                                    <li><a href="components_alerts_wells.html"><i class="fa fa-arrow-circle-right"></i> Alerts and Wells</a></li>
                                    <li><a href="components_thumbnails.html"><i class="fa fa-arrow-circle-right"></i> Thumbnails</a></li>
                                    <li><a href="components_modals.html"><i class="fa fa-arrow-circle-right"></i> Modals</a></li>
                                    <li><a href="components_progress_bars.html"><i class="fa fa-arrow-circle-right"></i> Progress Bars</a></li>
                                    <li><a href="components_tooltip_popover.html"><i class="fa fa-arrow-circle-right"></i> Tooltip &amp; Popover</a></li>
                                </ul>
                            </li>
                            <li><a href="collapses_tabs.html"  class="collapsed"><i class="fa fa-tasks"></i> Collapses &amp; Tabs</a></li>
                            <li><a href="components_vertical_tabs.html"  class="collapsed"><i class="fa fa-tasks"></i> Vertical Tabs</a></li>
                            <li><a href="components_switch.html"  class="collapsed"><i class="fa fa-toggle-on"></i> Switchs Controls</a></li>
                            <li><a href="content_box.html"  class="collapsed"><i class="fa fa-list-alt"></i> Contents Box</a></li>
                            <li><a href="carousels.html"  class="collapsed"><i class="fa fa-play-circle"></i> Carousels</a></li>
                            <li><a href="charts.html"  class="collapsed"><i class="fa fa-tachometer"></i> Charts &amp; CountDowns</a></li>
                            <li class="active"><a href="components_cards.html"  class="collapsed"><i class="fa fa-user"></i> Profile Cards</a></li>
                            <li><a href="components_counters.html"  class="collapsed"><i class="fa fa-sort-numeric-asc"></i> Counters</a></li>
                            <li><a href="components_navtabs.html"  class="collapsed"><i class="fa fa-columns"></i> Navbar Tabs</a></li>
                            <li><a href="components_masonry.html"  class="collapsed"><i class="fa fa-th"></i> Masonry Layer</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <section class="css-section">
                            <div class="row">
                                <?= $content ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>


            <?= $this->render('footer') ?>

        </div> <!-- boxed -->
    </div> <!-- sb-site -->


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

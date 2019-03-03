<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<style type="text/css">
    .modalB{
        background: #111;
        border-top: none;
        border-bottom: solid 1px #2f2f2f;
        border-left: solid 1px #2f2f2f;
        text-decoration: none;
        padding: 12px 20px;          
        text-align: left;
        width: 300px;
        color: #ddd;
    }
    .modalB:hover{
        background-color: #000000;
    }
</style>
<div id="mySidenav" class="sidenav sb-style-overlay">
    <div class="input-group">
          <a href="javascript:void(0)" class="sb-icon-navbar sb-toggle-right" onclick="closeNav()">&times;</a>
    </div><!-- /input-group -->

    <h2 class="slidebar-header no-margin-bottom">Navigation</h2>
    <ul class="slidebar-menu">
        <li><a href="<?= Url::home() ?>">Home</a></li>
        <li><?php
            if (Yii::$app->user->isGuest) {
                echo Html::button('Login', ['value' => Url::to(['site/login']), 'class' => 'modalB', 'id' => 'modalButton']);
                echo Html::button('Register', ['value' => Url::to(['site/signup']), 'class' => 'modalB', 'id' => 'modalButtonRegister']);
            } else {
                echo '<a data-method="post" href="index.php/site/logout">Logout</a>';
            }
            ?>
        </li>
        <li><a href="page_contact.html">Contact</a></li>
    </ul>

     <h2 class="slidebar-header no-margin-bottom">Social Media</h2>
     <ul class="slidebar-menu">
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Youtube</a></li>
        <li><a href="#">Twitter</a></li>
    </ul>
</div> <!-- sb-slidebar sb-right -->
<div id="back-top">
    <a href="#header"><i class="fa fa-chevron-up"></i></a>
</div>
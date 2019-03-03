<?php

use yii\bootstrap\Modal;

/* @var $this yii\web\View */

$this->title = 'Modals';
?>
<?= $this->render('header') ?>
<?= $this->render('carousel') ?>
<?php
        Modal::begin([
            'header' => '<h4 class="modal-title" id="myModalLabel">Login</h4>',
            'id' => 'modalx',
            'size' => 'modal-md',
        ]);
        ?>
        <div class="center-block logig-form">
            <div class="panel panel-primary">
                <div class="panel-heading">Masukan Username(NIM) dan Password</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div id='modalContent'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    Modal::end();
    ?>

    <?php
    Modal::begin([
        'header' => '<h4 class="modal-title" id="myModalLabel">Register</h4>',
        'id' => 'modalRegister',
        'size' => 'modal-lg',
    ]);
    ?>
    <div id='modalContentRegister'></div>
    <?php
    Modal::end();
    ?>
<div class="container">
    <?= $content ?>
</div>
<?= $this->render('footer') ?>
<?= $this->render('slider') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

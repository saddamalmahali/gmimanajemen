<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg"><b>GMP</b> Manajemen</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                
                <!-- User Account: style can be found in dropdown.less -->

                    
                        
                        <!-- Menu Footer-->
                        
                            <div class="pull-right">
                                <?= Html::a(
                                    '<span class="fa fa-sign-out"></span>',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'title'=>'Keluar','class' => 'btn btn-warning', 'style'=>'margin-top:6px; margin-right:8px;']
                                ) ?>
                            </div>
                    

                
            </ul>
        </div>
    </nav>
</header>

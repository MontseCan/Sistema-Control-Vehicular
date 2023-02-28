<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\bootstrap4\Nav;
use app\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Alert;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <!-- Inicio head -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php $this->registerCsrfMetaTags() ?>
    <title>Sistema de Control Vehicular</title>
    <link rel="icon" href="/images/gd.ico">
    <?php $this->head() ?>
</head>
<!-- Fin head -->



<body>
    <?php $this->beginBody() ?>

    <aside>
        <?= $this->render('sidebar'); ?>
    </aside>

    <div class="page-container">
        <header>
            <?= $this->render('header'); ?>
        </header>


        <main role="main">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
                    <?= $content ?>
                </div>
            </div>
        </main>
    </div>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
        </div>
    </footer>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
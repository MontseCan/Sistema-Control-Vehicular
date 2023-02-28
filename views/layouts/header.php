<?php

/* use Yii; */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

?>

<head>
    <!-- Title Page-->
    <title>Sistema de Control Vehicular</title>
</head>

<!-- HEADER DESKTOP-->
<header class="header-desktop">

    <div class="section__content section__content--p30">
        <div class="container">
            <div class="header-wrap bg-danger">
                <h1 style="color:#fff"> Sistema de Control Vehicular </h1>
                <?php
                NavBar::begin([]);
                echo Nav::widget([
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top',
                    ],
                    'items' => [
                        [
                            'label' => Yii::$app->user->identity->username,
                            'items' => [
                                //['label' => 'Cuenta', 'url' => ['/encargado/info_usuario']],
                                ['label' => 'Cambiar contraseña', 'url' => ['/user-management/auth/change-own-password']],
                                ['label' => 'Manual de Usuario', 'url' => ['/documentos/manual.pdf']],
                                ['label' => 'Cerrar Sesión', 'url' => ['/user-management/auth/logout']],
                            ],
                        ],
                    ],
                ]);
                NavBar::end();
                ?>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->

</html>
<!-- end document-->
<?php

use app\models\Encargado;
use yii\bootstrap4\Html;
use yii\widgets\Breadcrumbs;
use webvimark\modules\UserManagement\models\User;

$this->title = 'Encargado';
$this->params['breadcrumbs'][] = $this->title . '   /  ' .  'Información del usuario';
?>

<?php
$encargado = Encargado::find()->where(['enc_fkuser' => Yii::$app->user->identity->id])->one();

?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="es">

<head>
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="profile-card">
    <div class="image">
      <img alt="" class="profile-img" />
      <?= Html::img(Encargado::getFoto()) ?>

    </div>

    <div class="text-data">
      <span class="name">Inicio de Sesión</span>
      <span class="name"><?= Yii::$app->user->identity->username ?></span>
      <span class="job"> Nombre: <?= Encargado::getNombre() ?></span>

      <span class="job"> Empresa: <?php //$encargado->encFkempresa->emp_nombre 
                                  ?> </span>

      <span class="job"> Telefono: <?= Encargado::getTelefono() ?></span>

      <span class="job"> Correo: <?= Yii::$app->user->identity->email ?></span>
    </div>

    <div class="buttons">
      <button class="button">
        <?php if (User::hasRole(['encargados'])) { ?>
          <?= Html::a('Editar', ['/encargado/update', 'id' =>  Encargado::getId()]) ?>
        <?php } ?>
      </button>
    </div>

  </div>
</body>

</html>
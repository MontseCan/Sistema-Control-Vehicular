<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\Empresa;
use yii\web\Controller;
use app\models\Encargado;
use yii\filters\VerbFilter;
use app\models\EncargadoSearch;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;

/**
 * EncargadoController implements the CRUD actions for Encargado model.
 */
class EncargadoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Encargado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EncargadoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Encargado model.
     * @param int $enc_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Encargado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    /* public function actionCreate()
    {
        $model = new Encargado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'enc_id' => $model->enc_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Encargado();
        $modeluser = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $modeluser->load($this->request->post())) {
                if ($modeluser->save()) {
                    $model->enc_fkuser = $modeluser->id;
                    $modeluser::assignRole($modeluser->id, 'encargados');
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->enc_id]);
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modeluser' => $modeluser,
        ]);
    }*/

    public function actionCreate()
    {
        $model = new Encargado();
        $modeluser = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $modeluser->load($this->request->post())) {


                $enc_foto = \yii\web\UploadedFile::getInstance($model, 'imagen');
                if (!is_null($enc_foto)) {
                    $name = explode('.', $enc_foto->name);
                    $ext = end($name);
                    $model->enc_foto = Yii::$app->security->generateRandomString() . ".{$ext}";
                    $resource = Yii::$app->basePath . '/web/uploads/perfil/';    //<--Recuerda que "avatar/" es el nombre de la carpeta donde se guardan las imagenes
                    $path = $resource . $model->enc_foto;
                    if ($enc_foto->saveAs($path)) {
                        if ($modeluser->save()) {
                            $model->enc_fkuser = $modeluser->id;
                            $modeluser::assignRole($modeluser->id, 'encargados');
                            if ($model->save()) {
                                return $this->redirect(['view', 'id' => $model->enc_id]);
                            }
                        }
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modeluser' => $modeluser,
        ]);
    }

    /**
     * Updates an existing Encargado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $enc_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionUpdate($enc_id)
    {
        $model = $this->findModel($enc_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enc_id' => $model->enc_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modeluser = User::findOne(['id' => $model->enc_fkuser]);

        if ($model->load($this->request->post()) && $modeluser->load($this->request->post())) {
            if ($modeluser->save()) {
                $model->enc_fkuser = $modeluser->id;
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->enc_id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modeluser' => $modeluser,
        ]);
    }*/

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modeluser = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $modeluser->load($this->request->post())) {


                $enc_foto = \yii\web\UploadedFile::getInstance($model, 'imagen');
                if (!is_null($enc_foto)) {
                    $name = explode('.', $enc_foto->name);
                    $ext = end($name);
                    $model->enc_foto = Yii::$app->security->generateRandomString() . ".{$ext}";
                    $resource = Yii::$app->basePath . '/web/uploads/perfil/';
                    $path = $resource . $model->enc_foto;
                    if ($enc_foto->saveAs($path)) {
                        if ($modeluser->save()) {
                            $model->enc_fkuser = $modeluser->id;
                            $modeluser::assignRole($modeluser->id, 'encargados');
                            if ($model->save()) {
                                return $this->redirect(['view', 'id' => $model->enc_foto]);
                            }
                        }
                    }
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modeluser' => $modeluser,
        ]);
    }

    /**
     * Deletes an existing Encargado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $enc_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Encargado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $enc_id Id
     * @return Encargado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Encargado::findOne([$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionInfo_usuario()
    {
        return $this->render('info_usuario');
    }
}

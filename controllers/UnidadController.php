<?php

namespace app\controllers;

use FFI;
use Yii;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\web\Response;
use app\models\Unidad;
use yii\web\Controller;
use yii\bootstrap4\Html;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\UnidadSearch;
use yii\base\InvalidCallException;
use yii\web\NotFoundHttpException;

/**
 * UnidadController implements the CRUD actions for Unidad model.
 */
class UnidadController extends Controller
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
     * Lists all Unidad models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UnidadSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unidad model.
     * @param int $uni_id Id
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
     * Creates a new Unidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionCreate()
    {
        $model = new Unidad();

        $this->subirImagen($model) && $this->subirArchivo($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Unidad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $uni_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->subirImagen($model) && $this->subirArchivo($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Unidad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $uni_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (file_exists($model->imagen)) {
            unlink($model->imagen);
            if (file_exists($model->archivo)) {
                unlink($model->archivo);
            }
        }
        $model->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * Finds the Unidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $uni_id Id
     * @return Unidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Unidad::findOne([$id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function subirImagen(Unidad $model)
    {
        if ($model->load($this->request->post())) {

            $model->imagen = UploadedFile::getInstance($model, 'imagen');

            if ($model->validate()) {

                if ($model->imagen) {

                    if (file_exists($model->imagen)) {
                        unlink($model->imagen);
                    }

                    $rutaImagen = 'uploads/unidad/foto/' . time() . "_" . $model->imagen->baseName . "." . $model->imagen->extension;

                    if ($model->imagen->saveAs($rutaImagen)) {
                        $model->uni_foto = $rutaImagen;
                    }
                }
            }
            if ($model->save(false)) {

                return $this->redirect(['view', 'id' => $model->uni_id]);
            }
        }
    }

    protected function subirArchivo(Unidad $model)
    {
        if ($model->load($this->request->post())) {

            $model->archivo = UploadedFile::getInstance($model, 'archivo');

            if ($model->validate()) {

                if ($model->archivo) {

                    if (file_exists($model->archivo)) {
                        unlink($model->archivo);
                    }

                    $rutaArchivo = 'uploads/unidad/tarjeta/' . time() . "_" . $model->archivo->baseName . "." . $model->archivo->extension;

                    if ($model->archivo->saveAs($rutaArchivo)) {
                        $model->uni_tarjeta = $rutaArchivo;
                    }
                }
            }
            if ($model->save(false)) {

                return $this->redirect(['view', 'id' => $model->uni_id]);
            }
        }
    }


}

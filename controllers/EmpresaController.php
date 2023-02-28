<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\Empresa;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\EmpresaSearch;
use yii\web\NotFoundHttpException;

/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
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
     * Lists all Empresa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresa model.
     * @param int $emp_id Id
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
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */


    public function actionCreate()
    {
        $model = new Empresa();

        $this->subirImagen($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $emp_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->subirImagen($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Empresa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $emp_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (file_exists($model->imagen)) {
            unlink($model->imagen);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $emp_id Id
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresa::findOne([$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function subirImagen(Empresa $model)
    {
        if ($model->load($this->request->post())) {


            $model->imagen = UploadedFile::getInstance($model, 'imagen');

            if ($model->validate()) {

                if ($model->imagen) {

                    if (file_exists($model->imagen)) {
                        unlink($model->imagen);
                    }

                    $rutaImagen = 'uploads/empresa/' . time() . "_" . $model->imagen->baseName . "." . $model->imagen->extension;

                    if ($model->imagen->saveAs($rutaImagen)) {
                        $model->emp_logo = $rutaImagen;
                    }
                }
            }

            if ($model->save(false)) {

                return $this->redirect(['view', 'id' => $model->emp_id]);
            }
        }
    }

    
}

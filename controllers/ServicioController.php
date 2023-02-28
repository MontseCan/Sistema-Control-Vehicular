<?php

namespace app\controllers;

use Yii;
use kartik\mpdf\Pdf;
use yii\web\Response;
use yii\web\Controller;
use app\models\Servicio;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\ServicioSearch;
use yii\web\NotFoundHttpException;

/**
 * ServicioController implements the CRUD actions for Servicio model.
 */
class ServicioController extends Controller
{
    /**
     * @inheritDoc
     */
    /* public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }*/

    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Servicio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ServicioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicio model.
     * @param int $ser_id Id
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
     * Creates a new Servicio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionCreate()
    {
        $model = new Servicio();

        $this->subirFactura($model) && $this->subirCotizacion($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Servicio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ser_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ser_id' => $model->ser_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->subirFactura($model) && $this->subirCotizacion($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Servicio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ser_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Servicio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ser_id Id
     * @return Servicio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servicio::findOne([$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirCotizacion(Servicio $model)
    {
        if ($model->load($this->request->post())) {


            $model->cotizacion = UploadedFile::getInstance($model, 'cotizacion');

            if ($model->validate()) {

                if ($model->cotizacion) {

                    if (file_exists($model->cotizacion)) {
                        unlink($model->cotizacion);
                    }

                    $rutaCotizacion = 'uploads/servicio/cotizacion/' . time() . "_" . $model->cotizacion->baseName . "." . $model->cotizacion->extension;

                    if ($model->cotizacion->saveAs($rutaCotizacion)) {
                        $model->ser_cotizacion = $rutaCotizacion;
                    }
                }
            }

            if ($model->save(false)) {

                return $this->redirect(['view', 'id' => $model->ser_id]);
            }
        }
    }

    protected function subirFactura(Servicio $model)
    {
        if ($model->load($this->request->post())) {
            
            $model->factura = UploadedFile::getInstance($model, 'factura');

            if ($model->validate()) {

                if ($model->factura) {

                    if (file_exists($model->factura)) {
                        unlink($model->factura);
                    }

                    $rutaFactura = 'uploads/servicio/factura/' . time() . "_" . $model->factura->baseName . "." . $model->factura->extension;

                    if ($model->factura->saveAs($rutaFactura)) {
                        $model->ser_factura = $rutaFactura;
                    }
                }
            }

            if ($model->save(false)) {

                return $this->redirect(['view', 'id' => $model->ser_id]);
            }
        }
    }
}

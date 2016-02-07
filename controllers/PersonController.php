<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Person::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param string $firstname
     * @param string $lastname
     * @param string $dob
     * @return mixed
     */
    public function actionView($firstname, $lastname, $dob)
    {
        return $this->render('view', [
            'model' => $this->findModel($firstname, $lastname, $dob),
        ]);
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Person();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'firstname' => $model->firstname, 'lastname' => $model->lastname, 'dob' => $model->dob]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $firstname
     * @param string $lastname
     * @param string $dob
     * @return mixed
     */
    public function actionUpdate($firstname, $lastname, $dob)
    {
        $model = $this->findModel($firstname, $lastname, $dob);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'firstname' => $model->firstname, 'lastname' => $model->lastname, 'dob' => $model->dob]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $firstname
     * @param string $lastname
     * @param string $dob
     * @return mixed
     */
    public function actionDelete($firstname, $lastname, $dob)
    {
        $this->findModel($firstname, $lastname, $dob)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $firstname
     * @param string $lastname
     * @param string $dob
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($firstname, $lastname, $dob)
    {
        if (($model = Person::findOne(['firstname' => $firstname, 'lastname' => $lastname, 'dob' => $dob])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

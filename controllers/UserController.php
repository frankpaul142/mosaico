<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('guardado');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            echo "error";
            print_r($model->getErrors());
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangePassword()
    {
        if(isset($_POST['uid']) && isset($_POST['passwordAnterior']) && isset($_POST['passwordNueva']) && isset($_POST['passwordNueva2'])){
            $user=User::findOne($_POST['uid']);
            if($user){
            	$pa=$user->hashPassword(utf8_decode($_POST['passwordAnterior']));
            	$p1=utf8_decode($_POST['passwordNueva']);
            	$p2=utf8_decode($_POST['passwordNueva2']);
            	if($user->password===$pa){
            		if($p1==$p2){
            			$user->password=$user->hashPassword($p1);
            			if($user->save()){
            				Yii::$app->session->setFlash('passwordChanged');
            			}
            			else{
            				Yii::$app->session->setFlash('errorPassword','Error al guardar la contraseña');
            			}
            		}
            		else{
            			Yii::$app->session->setFlash('errorPassword','No coinciden las nuevas contraseñas');
            		}
            	}
            	else{
            		Yii::$app->session->setFlash('errorPassword','No coincide la contraseña anterior');
            	}
            	return $this->redirect(['view', 'id' => $user->id]);
            }
            else{
            	Yii::$app->session->setFlash('errorPassword','Error al cambiar la contraseña');
            }
        }
        else{
        	Yii::$app->session->setFlash('errorPassword','Todos los campos son obligatorios');
        }
        return $this->goBack();
    }
}

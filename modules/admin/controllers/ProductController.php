<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\Auction;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index','create','update','delete','view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                    return Yii::$app->user->identity->isAdmin;
                }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],

        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $model->scenario  ='create';
        if ($model->load(Yii::$app->request->post())) {
        	$image1=UploadedFile::getInstance($model,'image1');
        	if($image1!=NULL){
            	$name1=date('Y_m_d_H_i_s_'). $image1->baseName .'.' . $image1->extension;
            	$model->image1=$name1;
        	}
        	$image2=UploadedFile::getInstance($model,'image2');
        	if($image2!=NULL){
            	$name2=date('Y_m_d_H_i_s_'). $image2->baseName .'.' . $image2->extension;
            	$model->image2=$name2;
        	}
        	$image3=UploadedFile::getInstance($model,'image3');
        	if($image3!=NULL){
            	$name3=date('Y_m_d_H_i_s_'). $image3->baseName .'.' . $image3->extension;
            	$model->image3=$name3;
        	}
            if($model->save()){
                if($model->auction=="YES"){
                    $auction = new Auction();
                    $auction->product_id=$model->id;
                    $auction->value=$model->price;
                    $auction->save();
                }
                if($image1!=NULL){
	                $image1->saveAs('img/products/'.$name1);
	            }
                if($image2!=NULL){
	                $image2->saveAs('img/products/'.$name2);
	            }
                if($image3!=NULL){
	                $image3->saveAs('img/products/'.$name3);
	            }
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                'model' => $model,
            ]);

            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldimg1=$model->image1;    
        $oldimg2=$model->image2;    
        $oldimg3=$model->image3;    
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post()); 
            $image1=UploadedFile::getInstance($model,'image1');
        	if($image1!=NULL){
              	$name1=date('Y_m_d_H_i_s_'). $image1->baseName .'.' . $image1->extension;
            	$model->image1=$name1;
            }
            else{
            	$model->image1=$oldimg1;
            }
            $image2=UploadedFile::getInstance($model,'image2');
        	if($image2!=NULL){
              	$name2=date('Y_m_d_H_i_s_'). $image2->baseName .'.' . $image2->extension;
            	$model->image2=$name2;
            }
            else{
            	$model->image2=$oldimg2;
            }
            $image3=UploadedFile::getInstance($model,'image3');
        	if($image3!=NULL){
              	$name3=date('Y_m_d_H_i_s_'). $image3->baseName .'.' . $image3->extension;
            	$model->image3=$name3;
            }
            else{
            	$model->image3=$oldimg3;
            }
            if($model->save()){
            	if($image1!=NULL){
	                $image1->saveAs('img/products/'.$name1);
	            }
                if($image2!=NULL){
	                $image2->saveAs('img/products/'.$name2);
	            }
                if($image3!=NULL){
	                $image3->saveAs('img/products/'.$name3);
	            }
            	return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

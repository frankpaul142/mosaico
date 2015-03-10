<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Product;
use app\models\Category;
use app\models\Subcategory;
use app\models\User;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        /*if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }*/
        // echo "actionLogin1";
        $model = new LoginForm();
        // print_r($_POST);
        if ($model->load(Yii::$app->request->post())){
            if($model->login()) {
                echo "1";
            }
            else{
                'no login';
            }
        } else {
            echo "no post";
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSubastas()
    {
        return $this->render('auction');
    }

    public function actionRegistro()
    {
        $model=new User();
        if ($model->load(Yii::$app->request->post())){
        	$model->password=$model->hashPassword($model->password);
        	$model->confirmPassword=$model->hashPassword($model->confirmPassword);
        	$model->creation_date=date('Y-m-d H:i:s');
        	$model->status='ACTIVE';
        	if ($model->save()) {
        		return $this->goHome();
        	}
        	else{
    			Yii::$app->session->setFlash('errorRegistro',array_values($model->getFirstErrors())[0]);
        		return $this->refresh();
        	}
        }
        else{
            return $this->render('register',['model'=>$model]);
        }
    }

    public function actionAddToCart($productId,$quantity)
    {
        echo "1";
    }

    public function actionLoadProducts()
    {
        $categories=Category::findAll(['status'=>'ACTIVE']);
        $return=[];
        foreach ($categories as $i => $category) {
            $cat=[];
            $cat['name']=$category->name;
            foreach ($category->subcategories as $j => $subcategory) {
                $subcat=[];
                $subcat['name']=$subcategory->name;
                foreach ($subcategory->products as $k => $product) {
                	$prod=[];
                	$prod['name']=$product->name;
                	$prod['description']=$product->description;
                	$prod['stock']=$product->stock;
                	$prod['image']=$product->image;
                	$prod['price']=$product->price;
                	$subcat[$product->id]=$prod;
                }
                $cat[$subcategory->id]=$subcat;
            }
            $return[$category->id]=$cat;
        }
        return json_encode($return);
    }
}

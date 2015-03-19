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
use app\models\Params;
use app\models\Auction;
use app\models\Cart;
use app\models\ProductsCart;

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
    	$this->layout='layoutIndex';
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionEntrar()
    {
    	$model = new LoginForm();
        if ($model->load(Yii::$app->request->post())){
            if($model->login()) {
            	$cart=Cart::findOne(['user_id'=>Yii::$app->user->id,'status'=>'CREATED']);
	            $sessionCart=Yii::$app->session['cart'];
	            if($sessionCart){
            		if($cart){
			    		foreach ($sessionCart as $k => $ca) {
			    			$productCart=ProductsCart::findOne(['cart_id'=>$cart->id,'product_id'=>$k]);
			    			if ($productCart) {
			    				$productCart->quantity+=$ca;
			    				$productCart->save();
			    			}
			    			else{
					            $productCart=new ProductsCart;
					            $productCart->cart_id=$cart->id;
					            $productCart->product_id=$k;
					            $productCart->quantity=$ca;
					            $productCart->save();
					        }
				        }
				        echo "1";
				    }
				    else{
				    	$cart=new Cart;
				    	$cart->user_id=Yii::$app->user->id;
				    	$cart->status='CREATED';
				    	$cart->creation_date=date('Y-m-d H:i:s');
				    	if($cart->save()){
				    		foreach ($sessionCart as $k => $ca) {
					            $productCart=new ProductsCart;
					            $productCart->cart_id=$cart->id;
					            $productCart->product_id=$k;
					            $productCart->quantity=$ca;
					            $productCart->save();
					        }
					        echo "1";
				    	}
				    	else{
				    		echo "no save new cart";
				    	}
				    }
	            }
	            else{
	            	echo "1";
	            }
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
    	$products=Product::findAll(['status'=>'ACTIVE','auction'=>'YES']);
    	$auctions=Auction::findAll(['status'=>'ACTIVE']);
    	$time=Params::findOne(['name'=>'auction_time'])->value;
        return $this->render('auction',['auctions'=>$auctions,'time'=>$time]);
    }

    public function actionRegistro()
    {
        $model=new User(['scenario'=>'register']);
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

    public function actionCarrito()
    {
        $return=[];
        $total=0;
    	if(isset(Yii::$app->user->id)){
    		$cart=Cart::findOne(['user_id'=>Yii::$app->user->id,'status'=>'CREATED']);
	        if($cart){
		        foreach ($cart->productscarts as $k => $productCart) {
		            $aux=[];
		            $aux['name']=$productCart->product->name;
		            $aux['quantity']=$productCart->quantity;
		            $aux['stock']=$productCart->product->stock;
	                $aux['price']=$productCart->product->price;
		            $aux['image']=$productCart->product->image;
		            $aux['total']=$productCart->product->price*$productCart->quantity;
		            $return[$productCart->product->id]=$aux;
		            $total+=$productCart->product->price*$productCart->quantity;
		        }
		    }
    	}
    	else{
	        $cart=Yii::$app->session['cart'];
	        if($cart){
		        foreach ($cart as $k => $ca) {
		            $aux=[];
		            $product=Product::findOne($k);
		            $aux['name']=$product->name;
		            $aux['quantity']=$ca;
		            $aux['stock']=$product->stock;
	                $aux['price']=$product->price;
		            $aux['image']=$product->image;
		            $aux['total']=$product->price*$ca;
		            $return[$product->id]=$aux;
		            $total+=$product->price*$ca;
		        }
		    }
		}
        return $this->render('cart',['total'=>$total,'cart'=>$return]);
    }

    public function actionAddToCart($productId,$quantity)
    {
    	if(isset(Yii::$app->user->id)){
    		$cart=Cart::findOne(['user_id'=>Yii::$app->user->id,'status'=>'CREATED']);
	        if($cart){
		        $productCart=ProductsCart::findOne(['cart_id'=>$cart->id,'product_id'=>$productId]);
		        if ($productCart) {
		        	$productCart->quantity+=$quantity;
		        }
		        else{
		        	$productCart=new ProductsCart;
		        	$productCart->cart_id=$cart->id;
		        	$productCart->product_id=$productId;
		        	$productCart->quantity=$quantity;
		        }
		        $productCart->save();
		    }
		    else{
		    	$cart=new Cart;
		    	$cart->user_id=Yii::$app->user->id;
		    	$cart->status='CREATED';
		    	$cart->creation_date=date('Y-m-d H:i:s');
		    	if($cart->save()){
		            $productCart=new ProductsCart;
		            $productCart->cart_id=$cart->id;
		            $productCart->product_id=$productId;
		            $productCart->quantity=$quantity;
		            $productCart->save();
		    	}
		    }
    	}
    	else{
	        $cart=Yii::$app->session['cart'];
	        if(isset($cart[$productId])){
		        $cart[$productId]+=intval($quantity);
		    }
		    else{
		    	$cart[$productId]=intval($quantity);
		    }
	        Yii::$app->session['cart']=$cart;
	    }
        $this->actionLoadCart();
    }

    public function actionRemoveFromCart($productId, $redirect=null)
    {
    	if(isset(Yii::$app->user->id)){
    		$cart=Cart::findOne(['user_id'=>Yii::$app->user->id,'status'=>'CREATED']);
	        if($cart){
		        $productCart=ProductsCart::findOne(['cart_id'=>$cart->id,'product_id'=>$productId]);
		        if ($productCart) {
		        	$productCart->delete();
		        }
		    }
    	}
    	else{
	        $cart=Yii::$app->session['cart'];
	        unset($cart[$productId]);
	        Yii::$app->session['cart']=$cart;
	    }
        if(isset($redirect)){
            $this->redirect(['carrito']);
        }
        else{
            $this->actionLoadCart();
        }
    }

    public function actionChangeQuantity($id, $q)
    {
    	if(isset(Yii::$app->user->id)){
    		$cart=Cart::findOne(['user_id'=>Yii::$app->user->id,'status'=>'CREATED']);
	        if($cart){
		        $productCart=ProductsCart::findOne(['cart_id'=>$cart->id,'product_id'=>$id]);
		        if ($productCart) {
		        	$productCart->quantity=intval($q);
		        	$productCart->save();
		        }
		    }
    	}
    	else{
	        $cart=Yii::$app->session['cart'];
	        if(isset($cart[$id])){
		        $cart[$id]=intval($q);
		    }
	        Yii::$app->session['cart']=$cart;
	    }
        $this->redirect(['carrito']);
    }

    public function actionBid()
    {
    	if(isset($_POST['productId']) && isset($_POST['bid']) && $_POST['bid']!=''){
    		$auction=Auction::findOne($_POST['productId']);
    		if($auction){
    			if($auction->status=='ACTIVE'){
	    			$bid=$_POST['bid'];
	    			if(floatval($bid)>$auction->value){
		    			$auction->user_id=Yii::$app->user->id;
		    			$auction->value=$bid;
		    			$auction->date=date('Y-m-d H:i:s');
		    			if($auction->save()){
		    				echo $auction->value;
		    			}
		    			else{
		    				echo "no save";
		    			}
		    		}
		    		else{
		    			echo "no mayor";
		    		}
		    	}
		    	else{
		    		echo "no active";
		    	}
    		}
    		else{
    			echo "no auction";
    		}
    	}
    	else{
    		echo "no post";
    	}
    }

    public function actionAuctionValue($id)
    {
    	$auction=Auction::findOne($id);
    	if($auction){
    		echo $auction->value.'-'.$id;
    	}
    	else{
    		echo "no auction ".$id;
    	}
    }

    public function actionWinner($id)
    {
        $auction=Auction::findOne($id);
        if($auction){
            $auction->status='INACTIVE';
            if($auction->save()){
            	$return=$id.'-';
            	if(!$auction->user_id){
            		$return.='/';
            	}
            	elseif($auction->user_id==Yii::$app->user->id){
            		$return.='+';
            	}
            	else{
            		$return.=$auction->user_id;
            	}
	            echo $return;
	        }
	        else{
	        	echo "no save ".$id;
	        }
        }
        else{
            echo "no auction ".$id;
        }
    }

    public function actionLoadCart()
    {
	    $return=[];
	    $total=0;
    	if(isset(Yii::$app->user->id)){
    		$cart=Cart::findOne(['user_id'=>Yii::$app->user->id,'status'=>'CREATED']);
	        if($cart){
		        foreach ($cart->productscarts as $k => $productCart) {
		            $aux=[];
		            $aux['name']=$productCart->product->name;
		            $aux['value']=$productCart->quantity;
		            $return[$productCart->product->id]=$aux;
		            $total+=$productCart->product->price*$productCart->quantity;
		        }
		        $return['total']=$total;
		    }
    	}
    	else{
	        $cart=Yii::$app->session['cart'];
	        if($cart){
		        foreach ($cart as $k => $ca) {
		            $aux=[];
		            $product=Product::findOne($k);
		            $aux['name']=$product->name;
		            $aux['value']=$ca;
		            $return[$product->id]=$aux;
		            $total+=$product->price*$ca;
		        }
		        $return['total']=$total;
		    }
		}
    	echo json_encode($return);
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

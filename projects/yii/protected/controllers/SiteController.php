<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        /*Select one user with condition*/
        public function actionUserSelect()
        {
            $s=0;
            $m=0;
            $l=0;
            $t=10;
            $userId = 5000;
            
            $criteria = new CDbCriteria();
            $criteria->select = "*";
            
            $small = microtime(true)+$t;
            while ($small >= microtime(true)) {
                $criteria->addCondition(array("id"=>$userId));
                SPost::model()->find($criteria);
                $userId++;
                $s++;
            }
            
            $medium = microtime(true)+$t;
            while ($medium >= microtime(true)) {
                $criteria->addCondition(array("id"=>$userId));
                MPost::model()->find($criteria);
                $userId++;
                $m++;
            }
            
            $large = microtime(true)+$t;
            while ($large >= microtime(true)) {
                $criteria->addCondition(array("id"=>$userId));
                LPost::model()->find($criteria);
                $userId++;
                $l++;
            }
            
            echo "S: " . $s . "<br />";
            echo "M: " . $m . "<br />";
            echo "L: " . $l . "<br />";
        }
        
        /*Select all users no parameters*/
        public function actionUserSelectAll()
        {
            $criteria = new CDbCriteria();
            $criteria->select = "*";
            
            $s=0;
            $m=0;
            $l=0;     
            $t=10;
            
            $small = microtime(true)+$t;
            while ($small >= microtime(true)) {
                SPost::model()->findAll($criteria);
                $s++;
            }
            
            $medium = microtime(true)+$t;
            while ($medium >= microtime(true)) {
                MPost::model()->findAll($criteria);
                $m++;
            }
            
            $large = microtime(true)+$t;
            while ($large >= microtime(true)) {
                LPost::model()->findAll($criteria);
                $l++;
            }
            
            echo "S: " . $s . "<br />";
            echo "M: " . $m . "<br />";
            echo "L: " . $l . "<br />";
        }
        
        /*Select all users with parameters*/
        public function actionUserSelectAllParams()
        {
            $criteria = new CDbCriteria();
            $criteria->select = "*";
            
            $s=0;
            $m=0;
            $l=0;
            $t=10;
            $userId = 5000;            
            
            $small = microtime(true)+$t;
            while ($small >= microtime(true)) {
                $criteria->addCondition(array("id"=>$userId));
                SPost::model()->findAll($criteria);
                $userId++;
                $s++;
            }
            
            $medium = microtime(true)+$t;
            while ($medium >= microtime(true)) {
                $criteria->addCondition(array("id"=>$userId));
                MPost::model()->findAll($criteria);
                $userId++;
                $m++;
            }
            
            $large = microtime(true)+$t;
            while ($large >= microtime(true)) {
                $criteria->addCondition(array("id"=>$userId));
                LPost::model()->findAll($criteria);
                $userId++;
                $l++;
            }
            
            echo "S: " . $s . "<br />";
            echo "M: " . $m . "<br />";
            echo "L: " . $l . "<br />";
        }
        
        /*Update user*/
        public function actionUserUpdate()
        {
            $s = 0;
            $m = 0;
            $l = 0;
            $t=5;
            
            $criteria = new CDbCriteria();
            $criteria->select = "*";
            $criteria->limit = 5000;
            $SPosts = SPost::model()->findAll($criteria);
            $MPosts = MPost::model()->findAll($criteria);
            $LPosts = LPost::model()->findAll($criteria);
                        
            $small = microtime(true)+$t;
            while ($small >= microtime(true)) {
                $SPosts[$s]->title = "Updated title";
                $SPosts[$s]->content = "Updated content";
                $SPosts[$s]->update();
                $s++;
            }
            
            $medium = microtime(true)+$t;
            while ($medium >= microtime(true)) {
                $MPosts[$m]->title = "Updated title";
                $MPosts[$m]->content = "Updated content";
                $MPosts[$m]->update();
                $m++;
            }
            
            $large = microtime(true)+$t;
            while ($large >= microtime(true)) {
                $LPosts[$l]->title = "Updated title";
                $LPosts[$l]->content = "Updated content";
                $LPosts[$l]->update();
                $l++;
            }
            
            echo "Small: " . $s . "<br />";
            echo "Medium: " . $m . "<br />";
            echo "Large: " . $l . "<br />";
        }
        
        /*Delete user*/
        public function actionUserDelete()
        {
            
        }
}
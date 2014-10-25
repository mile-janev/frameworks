<?php

class SiteController extends Controller
{
    private $criteria;
    private $s;
    private $m;
    private $l;
    private $t;
    private $userId;

    public function init()
    {
        $this->criteria = new CDbCriteria();
        $this->criteria->select = "*";
        
        $this->s = 0;
        $this->m = 0;
        $this->l = 0;
        $this->t = 10;
        $this->userId = 10000;
    }
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
        
        public function actionStatistic()
        {
            $this->render('statistic',array(
//                'model'=>$model
            ));
        }
        
        /*Select one posts with condition*/
        public function actionSelect()
        {
            $small = microtime(true)+$this->t;
            while ($small >= microtime(true)) {
                $this->criteria->addCondition(array("id"=>$this->userId));
                SPost::model()->find($this->criteria);
                $this->userId++;
                $this->s++;
            }
            
            $medium = microtime(true)+$this->t;
            while ($medium >= microtime(true)) {
                $this->criteria->addCondition(array("id"=>$this->userId));
                MPost::model()->find($this->criteria);
                $this->userId++;
                $this->m++;
            }
            
            $large = microtime(true)+$this->t;
            while ($large >= microtime(true)) {
                $this->criteria->addCondition(array("id"=>$this->userId));
                LPost::model()->find($this->criteria);
                $this->userId++;
                $this->l++;
            }
            
            $this->render('result',array(
                'act' => 'Select',
                'small' => $this->s,
                'medium' => $this->m,
                'large' => $this->l
            ));
        }
        
        /*Select all posts no parameters*/
        public function actionSelectAll()
        {
            $small = microtime(true)+$this->t;
            while ($small >= microtime(true)) {
                SPost::model()->findAll($this->criteria);
                $this->s++;
            }
            
            $medium = microtime(true)+$this->t;
            while ($medium >= microtime(true)) {
                MPost::model()->findAll($this->criteria);
                $this->m++;
            }
            
            $large = microtime(true)+$this->t;
            while ($large >= microtime(true)) {
                LPost::model()->findAll($this->criteria);
                $this->l++;
            }
            
            $this->render('result',array(
                'act' => 'Select All',
                'small' => $this->s,
                'medium' => $this->m,
                'large' => $this->l
            ));
        }
        
        /*Select all posts with parameters*/
        public function actionSelectAllParams()
        {
            $small = microtime(true)+$this->t;
            while ($small >= microtime(true)) {
                $this->criteria->addCondition(array("id"=>$this->userId));
                SPost::model()->findAll($this->criteria);
                $this->userId++;
                $this->s++;
            }
            
            $medium = microtime(true)+$this->t;
            while ($medium >= microtime(true)) {
                $this->criteria->addCondition(array("id"=>$this->userId));
                MPost::model()->findAll($this->criteria);
                $this->userId++;
                $this->m++;
            }
            
            $large = microtime(true)+$this->t;
            while ($large >= microtime(true)) {
                $this->criteria->addCondition(array("id"=>$this->userId));
                LPost::model()->findAll($this->criteria);
                $this->userId++;
                $this->l++;
            }
            
            $this->render('result',array(
                'act' => 'Select All Params',
                'small' => $this->s,
                'medium' => $this->m,
                'large' => $this->l
            ));
        }
        
        /*Update post*/
        public function actionUpdate()
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
        
        /*Delete post*/
        public function actionDelete()
        {
            
        }
}
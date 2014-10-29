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
    
    /*Saving test info into database*/
    public function saveTest($function="")
    {
        if ($function != "") {
            $statistic = new Statistic();
            $statistic->framework = 'yii';
            $statistic->function = $function;
            $statistic->created = date("Y-m-d H:i:s", time());
            $statistic->execution_time = $this->t;
            $statistic->small = $this->s;
            $statistic->medium = $this->m;
            $statistic->large = $this->l;

            $statistic->save();

            $this->s = 0;
            $this->m = 0;
            $this->l = 0;

            return true;
        } else {
            return false;
        }
    }

    public function actionIndex()
    {
        $this->render('index',array(
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

        $this->saveTest("select");

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

        $this->saveTest("selectall");

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

        $this->saveTest("selectallparams");

        $this->render('result',array(
            'act' => 'Select All Params',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method find()*/
    public function actionFind()
    {
//        var_dump("tuka");
//        exit();
    }
    
    /*Test method findByPk()*/
    public function actionFindbypk()
    {
        
    }
    
    /*Test method findByAttributes()*/
    public function actionFindbyattributes()
    {
        
    }
    
    /*Test method findBySql()*/
    public function actionFindbysql()
    {
        
    }

}
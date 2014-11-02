<?php

class SiteController extends Controller
{
    private $criteria;
    private $s;//Small (10 000)
    private $m;//Medium (100 000)
    private $l;//Large (500 000)
    private $t;//Time
    private $i;//Counter

    public function init()
    {
        $this->criteria = new CDbCriteria();
        $this->criteria->select = "*";
        
        $this->reset();
    }
    
    public function reset()
    {
        $this->s = 0;
        $this->m = 0;
        $this->l = 0;
        $this->t = 10;
        $this->i = 1;
    }
    
    public function actionCron()
    {
        for ($i=0; $i<8; $i++)
        {
            $this->actionFind();                $this->reset();
            $this->actionFindbypk();            $this->reset();
            $this->actionFindbyattributes();    $this->reset();
            $this->actionFindbysql();           $this->reset();
            $this->actionFindall();             $this->reset();
            $this->actionFindallbypk();         $this->reset();
            $this->actionFindallbyattributes(); $this->reset();
            $this->actionFindallbysql();        $this->reset();
        }
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

            return true;
        } else {
            return false;
        }
    }
    
    /*Test method find()*/
    public function actionFind()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->criteria->addCondition(array("id"=>$this->i));
            SPost::model()->find($this->criteria);
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->criteria->addCondition(array("id"=>$this->i));
            MPost::model()->find($this->criteria);
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->criteria->addCondition(array("id"=>$this->i));
            LPost::model()->find($this->criteria);
            $this->i++;
            $this->l++;
        }
        $this->i = 1;

        $this->saveTest("find()");

        $this->render('result',array(
            'act' => 'find()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method findByPk()*/
    public function actionFindbypk()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            SPost::model()->findByPk($this->i);
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            MPost::model()->findByPk($this->i);
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            LPost::model()->findByPk($this->i);
            $this->i++;
            $this->l++;
        }
        $this->i = 1;

        $this->saveTest("findByPk()");

        $this->render('result',array(
            'act' => 'findByPk()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method findByAttributes()*/
    public function actionFindbyattributes()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            SPost::model()->findByAttributes(array("id" => $this->i));
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            MPost::model()->findByAttributes(array("id" => $this->i));
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            LPost::model()->findByAttributes(array("id" => $this->i));
            $this->i++;
            $this->l++;
        }
        $this->i = 1;

        $this->saveTest("findByAttributes()");

        $this->render('result',array(
            'act' => 'findByAttributes()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method findBySql()*/
    public function actionFindbysql()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            SPost::model()->findBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>$this->i));
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            MPost::model()->findBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>$this->i));
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            LPost::model()->findBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>$this->i));
            $this->i++;
            $this->l++;
        }
        $this->i = 1;

        $this->saveTest("findBySql()");

        $this->render('result',array(
            'act' => 'findBySql()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method findAll()*/
    public function actionFindall()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->criteria->addCondition(array("id"=>$this->i));
            SPost::model()->findAll($this->criteria);
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->criteria->addCondition(array("id"=>$this->i));
            MPost::model()->findAll($this->criteria);
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->criteria->addCondition(array("id"=>$this->i));
            LPost::model()->findAll($this->criteria);
            $this->i++;
            $this->l++;
        }
        $this->i = 1;

        $this->saveTest("findAll()");

        $this->render('result',array(
            'act' => 'findAll()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method findAllByPk()*/
    public function actionFindallbypk()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            SPost::model()->findAllByPk(array($this->i));
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            MPost::model()->findAllByPk(array($this->i));
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            LPost::model()->findAllByPk(array($this->i));
            $this->i++;
            $this->l++;
        }
        $this->i = 1;

        $this->saveTest("findAllByPk()");

        $this->render('result',array(
            'act' => 'findAllByPk()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method findAllByAttributes()*/
    public function actionFindallbyattributes()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            SPost::model()->findAllByAttributes(array("id" => $this->i));
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            MPost::model()->findAllByAttributes(array("id" => $this->i));
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            LPost::model()->findAllByAttributes(array("id" => $this->i));
            $this->i++;
            $this->l++;
        }
        $this->i = 1;

        $this->saveTest("findAllByAttributes()");

        $this->render('result',array(
            'act' => 'findAllByAttributes()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method findAllBySql()*/
    public function actionFindallbysql()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            SPost::model()->findAllBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>$this->i));
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            MPost::model()->findAllBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>$this->i));
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            LPost::model()->findAllBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>$this->i));
            $this->i++;
            $this->l++;
        }
        $this->i = 1;

        $this->saveTest("findAllBySql()");

        $this->render('result',array(
            'act' => 'findAllBySql()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }

    /*Select all posts no parameters*/
    public function actionSelectall()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            SPost::model()->findAll();
            $this->s++;
        }

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            MPost::model()->findAll();
            $this->m++;
        }

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            LPost::model()->findAll();
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
    
    /*Load data and display*/
    public function actionIndex()
    {
        /*find() start*/
        $criteria1 = new CDbCriteria();
        $criteria1->addCondition("framework = 'yii'");
        $criteria1->addCondition("function = 'find()'");
        $findResults = Statistic::model()->findAll($criteria1);
        $findData = $this->formatArray($findResults);
        /*find() end*/
        
        /*fetchRow() start*/
        $criteria1 = new CDbCriteria();
        $criteria1->addCondition("framework = 'yii'");
        $criteria1->addCondition("function = 'findByPk()'");
        $pkResults = Statistic::model()->findAll($criteria1);
        $pkData = $this->formatArray($pkResults);
        /*findByPk() end*/
        
        $this->render('index',array(
            'findData'=>$findData,
            'pkData'=>$pkData
        ));
    }
    
    /*Prepare results for displaying in chart*/
    public function formatArray($statistic)
    {
        $results = $this->cleanResults($statistic);
        $formatedArray = array();
        $small = 0;
        $medium = 0;
        $large = 0;
        $time = 0;
        
        foreach ($results as $result) {
            $small += $result->small;
            $medium += $result->medium;
            $large += $result->large;
            $time += $result->execution_time;
        }
        
        $interval = 60/$time;//Ova e interval, posle go mnozeme so small/medium/large za 
                            //da dobieme kolku e prosekot na izvrseni upiti vo minuta
        
        $formatedArray['tests'] = count($results);
        $formatedArray['small'] = $small*$interval;
        $formatedArray['medium'] = $medium*$interval;
        $formatedArray['large'] = $large*$interval;
        
        return $formatedArray;
    }
    
    //This function remove 5% of highest and 5% of lowest results for each database type (small/medium/large)
    //Means that 70% of the tests will be accepted.
    //
    //Ova se pravi bidejki tie 30% se ne tolku realni poradi faktot sto procesorot vo
    //toj moment mozel da bide zafaten pa pokazal pomal broj na zapisi ili drug nekoj faktor.
    public function cleanResults($results)
    {
        
        return $results;
    }
    
}
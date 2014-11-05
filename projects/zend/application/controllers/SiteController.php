<?php

class SiteController extends Zend_Controller_Action
{
    private $db;
    private $s;//Small (10 000)
    private $m;//Medium (100 000)
    private $l;//Large (500 000)
    private $t;//Time
    private $i;//Counter

    public function init()
    {
        $this->db = Zend_Db_Table::getDefaultAdapter();
        
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
    
    /*Saving test info into database*/
    public function saveTest($function="")
    {
        if ($function != "") {
            
            $statistic = new Application_Model_DbTable_Statistic();
            
            $data = array(
                "framework" => "zend",
                "function" => $function,
                "created" => date("Y-m-d H:i:s", time()),
                "execution_time" => $this->t,
                "small" => $this->s,
                "medium" => $this->m,
                "large" => $this->l
            );

            $statistic->insert($data);

            return true;
        } else {
            return false;
        }
    }
    
    /*Test method fetchRow()*/
    public function fetchrowAction()
    {
        $sPost = new Application_Model_DbTable_SPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $sPost->fetchRow('id = ' . $this->i);
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $mPost = new Application_Model_DbTable_MPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $mPost->fetchRow('id = ' . $this->i);
            $this->i++;
            $this->m++;
        }
        $this->i = 1;
        
        $lPost = new Application_Model_DbTable_LPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $lPost->fetchRow('id = ' . $this->i);
            $this->i++;
            $this->l++;
        }
        $this->i = 1;
        
        $this->saveTest("fetchRow()");
        
        $this->view->assign('act', 'fetchRow()');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }
    
    /*Test method find(). Accept only primary key*/
    public function findAction()
    {
        $sPost = new Application_Model_DbTable_SPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $sPost->find($this->i);
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $mPost = new Application_Model_DbTable_MPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $mPost->find($this->i);
            $this->i++;
            $this->m++;
        }
        $this->i = 1;
        
        $lPost = new Application_Model_DbTable_LPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $lPost->find($this->i);
            $this->i++;
            $this->l++;
        }
        $this->i = 1;
        
        $this->saveTest("find()");
        
        $this->view->assign('act', 'find()');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }
    
    /*Test method fetchAll()*/
    public function fetchallAction()
    {
        $sPost = new Application_Model_DbTable_SPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $sPost->fetchAll('id = ' . $this->i);
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $mPost = new Application_Model_DbTable_MPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $mPost->fetchAll('id = ' . $this->i);
            $this->i++;
            $this->m++;
        }
        $this->i = 1;
        
        $lPost = new Application_Model_DbTable_LPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $lPost->fetchAll('id = ' . $this->i);
            $this->i++;
            $this->l++;
        }
        $this->i = 1;
        
        $this->saveTest("fetchAll()");
        
        $this->view->assign('act', 'fetchAll()');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
        
    }
    
    /*Select all posts no parameters*/
    public function selectallAction()
    {
        $sPost = new Application_Model_DbTable_SPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $sPost->fetchAll();
            $this->s++;
        }
        
        $mPost = new Application_Model_DbTable_MPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $mPost->fetchAll();
            $this->m++;
        }
        
        $lPost = new Application_Model_DbTable_LPost();
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $lPost->fetchAll();
            $this->l++;
        }
        
        $this->saveTest("selectall");
        
        $this->view->assign('act', 'selectall');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }
    
    /*Test method fetch(). Only on query object (custom query). Same as fetchRow()*/
    public function fetchAction()
    {
        $select1 = new Zend_Db_Select($this->db);
        $select1 = $this->db->select()->from('s_post');
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $select1->where('id = ?', $this->i);
            $select1->query()->fetch();
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $select2 = new Zend_Db_Select($this->db);
        $select2 = $this->db->select()->from('m_post');
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $select2->where('id = ?', $this->i);
            $select2->query()->fetch();
            $this->i++;
            $this->m++;
        }
        $this->i = 1;
        
        $select3 = new Zend_Db_Select($this->db);
        $select3 = $this->db->select()->from('l_post');
        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $select3->where('id = ?', $this->i);
            $select3->query()->fetch();
            $this->i++;
            $this->l++;
        }
        $this->i = 1;
        
        $this->saveTest("fetch()");
        
        $this->view->assign('act', 'fetch()');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }
    
    public function indexAction()
    {        
        /*find() start*/
        $statistic = new Application_Model_DbTable_Statistic();
        $findResults = $statistic->fetchAll("framework = 'zend' AND function = 'find()'")->toArray();
        $findData = $this->formatArray($findResults);
        /*find() end*/
        
        /*fetchRow() start*/
        $statistic = new Application_Model_DbTable_Statistic();
        $fetchRowResults = $statistic->fetchAll("framework = 'zend' AND function = 'fetchRow()'")->toArray();
        $fetchRowData = $this->formatArray($fetchRowResults);
        /*fetchRow() end*/
        
        $this->view->assign('findData', $findData);
        $this->view->assign('fetchRowData', $fetchRowData);        
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
            $small += $result['small'];
            $medium += $result['medium'];
            $large += $result['large'];
            $time += $result['execution_time'];
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


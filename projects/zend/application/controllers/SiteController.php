<?php

class SiteController extends Zend_Controller_Action
{
    private $db;
    private $s;//Small (10 000)
    private $m;//Medium (100 000)
    private $l;//Large (500 000)
    private $t;//Time
    private $i;//Counter
    private $stop;//If TRUE, than stop execution here

    public function init()
    {
        $this->stop = TRUE;
        
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
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
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
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
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
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
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
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
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
    
    /*Using class Zend_Db_Select*/
    public function zenddbselectAction()
    {
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
        $select1 = new Zend_Db_Select($this->db);
        $select1 = $this->db->select()->from('s_post');
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $select1->where('id = ?', $this->i);
            $select1->query();//$results = $select1->query()->fetchAll()
            $this->i++;
            $this->s++;
        }
        $this->i = 1;
        
        $select2 = new Zend_Db_Select($this->db);
        $select2 = $this->db->select()->from('m_post');
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $select2->where('id = ?', $this->i);
            $select2->query();
            $this->i++;
            $this->m++;
        }
        $this->i = 1;
        
        $select3 = new Zend_Db_Select($this->db);
        $select3 = $this->db->select()->from('l_post');
        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $select3->where('id = ?', $this->i);
            $select3->query();
            $this->i++;
            $this->l++;
        }
        $this->i = 1;
        
        $this->saveTest("Zend_Db_Select");
        
        $this->view->assign('act', 'Zend_Db_Select');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }
    
    public function indexAction()
    {        
        include_once $_SERVER['DOCUMENT_ROOT'].'/Library.php';
        $object = new Library();
        
        $find_zend = $object->findStatistic('zend', 'find()');
        $fetchRow_zend = $object->findStatistic('zend', 'fetchRow()');
        $dbselect_zend = $object->findStatistic('zend', 'Zend_Db_Select');
        $fetchAll_zend = $object->findStatistic('zend', 'fetchAll()');
        
        $this->view->assign('find_zend', $find_zend);
        $this->view->assign('fetchRow_zend', $fetchRow_zend);
        $this->view->assign('dbselect_zend', $dbselect_zend);   
        $this->view->assign('fetchAll_zend', $fetchAll_zend);   
    }
}


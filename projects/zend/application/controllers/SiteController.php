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

    public function indexAction()
    {        
        // action body
    }
//find(), fetchAll(), fetchRow(), 
    
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
            $mPost->fetchRow('id = ' . $this->i);
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
    
    /*Select one post with condition*/
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
        
        $select2 = new Zend_Db_Select($this->db);
        $select2 = $this->db->select()->from('m_post');
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $select2->where('id = ?', $this->i);
            $select2->query()->fetch();
            $this->i++;
            $this->m++;
        }
        
        $select3 = new Zend_Db_Select($this->db);
        $select3 = $this->db->select()->from('l_post');
        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $select3->where('id = ?', $this->i);
            $select3->query()->fetch();
            $this->i++;
            $this->l++;
        }
        
        $this->saveTest("fetch()");
        
        $this->view->assign('act', 'fetch()');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }
    
    /*Select one post with condition*/
    public function selectAction()
    {
        $select1 = new Zend_Db_Select($this->db);
        $select1 = $this->db->select()->from('s_post');
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $select1->where('id = ?', $this->userId);
            $select1->query()->fetch();
            $this->userId++;
            $this->s++;
        }
        
        $select2 = new Zend_Db_Select($this->db);
        $select2 = $this->db->select()->from('m_post');
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $select2->where('id = ?', $this->userId);
            $select2->query()->fetch();
            $this->userId++;
            $this->m++;
        }
        
        $select3 = new Zend_Db_Select($this->db);
        $select3 = $this->db->select()->from('l_post');
        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $select3->where('id = ?', $this->userId);
            $select3->query()->fetch();
            $this->userId++;
            $this->l++;
        }
        
        $this->saveTest("select");
        
        $this->view->assign('act', 'Select');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }
    
    /*Select all posts no parameters*/
    public function selectallAction()
    {        
        $select1 = new Zend_Db_Select($this->db);
        $select1 = $this->db->select()->from('s_post');
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $select1->query()->fetchAll();
            $this->s++;
        }
        
        $select2 = new Zend_Db_Select($this->db);
        $select2 = $this->db->select()->from('m_post');
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $select2->query()->fetchAll();
            $this->m++;
        }
        
        $select3 = new Zend_Db_Select($this->db);
        $select3 = $this->db->select()->from('l_post');
        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $select3->query()->fetchAll();
            $this->l++;
        }
        
        $this->saveTest("selectall");
        
        $this->view->assign('act', 'Select All');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }
    
    /*Select all posts no parameters*/
    public function selectallparamsAction()
    {
        $select1 = new Zend_Db_Select($this->db);
        $select1 = $this->db->select()->from('s_post');
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $select1->where('id = ?', $this->userId);
            $select1->query()->fetchAll();
            $this->userId++;
            $this->s++;
        }
        
        $select2 = new Zend_Db_Select($this->db);
        $select2 = $this->db->select()->from('m_post');
        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $select2->where('id = ?', $this->userId);
            $select2->query()->fetchAll();
            $this->userId++;
            $this->m++;
        }
        
        $select3 = new Zend_Db_Select($this->db);
        $select3 = $this->db->select()->from('l_post');
        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $select3->where('id = ?', $this->userId);
            $select3->query()->fetchAll();
            $this->userId++;
            $this->l++;
        }
        
        $this->saveTest("selectallparams");
        
        $this->view->assign('act', 'Select All Params');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }

}


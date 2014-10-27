<?php

class SiteController extends Zend_Controller_Action
{
    private $db;
    private $s;
    private $m;
    private $l;
    private $t;
    private $userId;

    public function init()
    {
        $this->db = Zend_Db_Table::getDefaultAdapter();
        $this->s = 0;
        $this->m = 0;
        $this->l = 0;
        $this->t = 10;
        $this->userId = 10000;
    }

    public function indexAction()
    {        
        // action body
    }
    
    public function statisticAction()
    {        
        // action body
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
            $select2->query()->fetch();
            $this->m++;
        }
        
        $select3 = new Zend_Db_Select($this->db);
        $select3 = $this->db->select()->from('l_post');
        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $select3->query()->fetch();
            $this->l++;
        }
        
        $this->view->assign('act', 'Select');
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
        
        $this->view->assign('act', 'Select');
        $this->view->assign('small', $this->s);
        $this->view->assign('medium', $this->m);
        $this->view->assign('large', $this->l);
        $this->render('result');
    }

}


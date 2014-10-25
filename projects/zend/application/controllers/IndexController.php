<?php

class IndexController extends Zend_Controller_Action
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
        $this->t = 2;
        $this->userId = 10000;
    }

    public function indexAction()
    {        
        // action body
    }

    /*Select one user with condition*/
    public function userselectAction()
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
        
        echo "S: " . $this->s . "<br />";
        echo "M: " . $this->m . "<br />";
        echo "L: " . $this->l . "<br />";
        
        exit();
    }
    
    /*Select all users no parameters*/
    public function userselectallAction()
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
        
        echo "S: " . $this->s . "<br />";
        echo "M: " . $this->m . "<br />";
        echo "L: " . $this->l . "<br />";
        
        exit();
    }
    
    /*Select all users no parameters*/
    public function userselectallparamsAction()
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
        
        echo "S: " . $this->s . "<br />";
        echo "M: " . $this->m . "<br />";
        echo "L: " . $this->l . "<br />";
        
        exit();
    }

}


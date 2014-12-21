<?php

class Site extends CI_Controller
{
    private $s;
    private $m;
    private $l;
    private $t;
    private $i;
    private $stop;//If TRUE, than stop execution here
    
    public function __construct()
    {
        parent::__construct();
        
        $this->stop = TRUE;
        
        $this->load->database();
        
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
            
            $data = array(
                "framework" => "codeigniter",
                "function" => $function,
                "created" => date("Y-m-d H:i:s", time()),
                "execution_time" => $this->t,
                "small" => $this->s,
                "medium" => $this->m,
                "large" => $this->l
            );

            $this->db->insert('statistic', $data);

            return true;
        } else {
            return false;
        }
    }
    
    public function index()
    {
        include_once $_SERVER['DOCUMENT_ROOT'].'/Library.php';
        $object = new Library();
        
        $query_ci = $object->findStatistic('codeigniter', 'query()');
        $get_where_ci = $object->findStatistic('codeigniter', 'get_where()');
        $get_ci = $object->findStatistic('codeigniter', 'get()');
        
        $this->load->view('site/index', array(
            'query_ci' => $query_ci,
            'get_where_ci' => $get_where_ci,
            'get_ci' => $get_ci
        ));
    }
    
    /*Test custom query("custom query"). Select more posts with condition*/
    public function querymethod()
    {
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->query("SELECT * FROM s_post WHERE id = ".$this->i);
            $this->i++;
            $this->s++;
        }
        $this->i = 1;

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->query("SELECT * FROM m_post WHERE id = ".$this->i);
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->query("SELECT * FROM l_post WHERE id = ".$this->i);
            $this->i++;
            $this->l++;
        }
        $this->i = 1;
        
        $this->saveTest("query()");
        
        $this->load->view('site/result', array(
            'act' => 'query()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method get_where(). Select one record with condition.*/
    public function getwhere()
    {
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->get_where('s_post', array('id'=>$this->i));
            $this->i++;
            $this->s++;
        }
        $this->i = 1;

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->get_where('m_post', array('id'=>$this->i));
            $this->i++;
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->get_where('l_post', array('id'=>$this->i));
            $this->i++;
            $this->l++;
        }
        $this->i = 1;
        
        $this->saveTest("get_where()");
        
        $this->load->view('site/result', array(
            'act' => 'get_where()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method get(). Select all results.*/
    public function selectall()
    {
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->get('s_post');
            $this->s++;
        }

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->get('m_post');
            $this->m++;
        }

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->get('l_post');
            $this->l++;
        }
        
        $this->saveTest("selectall");
                
        $this->load->view('site/result', array(
            'act' => 'Select all',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method get(). Select more results.*/
    public function getmethod()
    {
        if ($this->stop) {
            die("Execution is not allowed.");
        }
        
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->select('*');
            $this->db->from('s_post');
            $this->db->where('id',  $this->i);
            $this->db->get();
            $this->s++;
        }
        $this->i = 1;

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->select('*');
            $this->db->from('m_post');
            $this->db->where('id',  $this->i);
            $this->db->get();
            $this->m++;
        }
        $this->i = 1;

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->select('*');
            $this->db->from('l_post');
            $this->db->where('id',  $this->i);
            $this->db->get();
            $this->l++;
        }
        $this->i = 1;
        
        $this->saveTest("get()");//get()
                
        $this->load->view('site/result', array(
            'act' => 'get()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }  
    
}

<?php

class Site extends CI_Controller
{
    private $s;
    private $m;
    private $l;
    private $t;
    private $i;
    
    public function __construct()
    {
        parent::__construct();
        
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
        $this->load->view('site/index');
    }
    
    public function statistic()
    {
        $this->load->view('site/statistic', array(
            
        ));
    }
    
    /*Test custom query() -> row(). Select one post with condition*/
    public function select()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->query("SELECT * FROM s_post WHERE id = ".$this->i)->row();
            $this->i++;
            $this->s++;
        }

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->query("SELECT * FROM m_post WHERE id = ".$this->i)->row();
            $this->i++;
            $this->m++;
        }

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->query("SELECT * FROM l_post WHERE id = ".$this->i)->row();
            $this->i++;
            $this->l++;
        }
        
        $this->saveTest("select");
        
        $this->load->view('site/result', array(
            'act' => 'Select one',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Test method fet_where()*/
    public function getwhere()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->get_where('s_post', array('id'=>$this->i))->result();
            $this->i++;
            $this->s++;
        }

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->get_where('m_post', array('id'=>$this->i))->result();
            $this->i++;
            $this->m++;
        }

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->get_where('l_post', array('id'=>$this->i))->result();
            $this->i++;
            $this->l++;
        }
        
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
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->get('s_post')->result();
            $this->s++;
        }

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->get('m_post')->result();
            $this->m++;
        }

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->get('l_post')->result();
            $this->l++;
        }
        
        $this->saveTest("get()");
                
        $this->load->view('site/result', array(
            'act' => 'get()',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
}

<?php

class Site extends CI_Controller
{
    private $s;
    private $m;
    private $l;
    private $t;
    private $userId;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        
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

            $this->s = 0;
            $this->m = 0;
            $this->l = 0;

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
    
    /*Select one posts with condition*/
    public function select()
    {        
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->query("SELECT * FROM s_post")->row();
            $this->userId++;
            $this->s++;
        }

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->query("SELECT * FROM m_post")->row();
            $this->userId++;
            $this->m++;
        }

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->query("SELECT * FROM l_post")->row();
            $this->userId++;
            $this->l++;
        }
        
        $this->saveTest("select");
        
        $this->load->view('site/result', array(
            'act' => 'Select',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Select all posts no parameters*/
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
        
        $this->saveTest("selectall");
                
        $this->load->view('site/result', array(
            'act' => 'Select All',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    /*Select all posts with parameters*/
    public function selectallparams()
    {
        $small = microtime(true)+$this->t;
        while ($small >= microtime(true)) {
            $this->db->get_where('s_post', array('id'=>$this->userId))->result();
            $this->userId++;
            $this->s++;
        }

        $medium = microtime(true)+$this->t;
        while ($medium >= microtime(true)) {
            $this->db->get_where('m_post', array('id'=>$this->userId))->result();
            $this->userId++;
            $this->m++;
        }

        $large = microtime(true)+$this->t;
        while ($large >= microtime(true)) {
            $this->db->get_where('l_post', array('id'=>$this->userId))->result();
            $this->userId++;
            $this->l++;
        }
        
        $this->saveTest("selectallparams");
        
        $this->load->view('site/result', array(
            'act' => 'Select All Params',
            'small' => $this->s,
            'medium' => $this->m,
            'large' => $this->l
        ));
    }
    
    public function update()
    {
        
        
        $this->load->view('site/index', array(
            
        ));
    }
    
    public function delete()
    {
        
        
        $this->load->view('site/index', array(
            
        ));
    }
    
}

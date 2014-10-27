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
        
        $this->s = 0;
        $this->m = 0;
        $this->l = 0;
        $this->t = 10;
        $this->userId = 10000;
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

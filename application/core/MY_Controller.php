<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data = array();

    public function __construct()
    {
       parent::__construct();
    }

}

class User_Controller extends MY_Controller {

    public function __construct() 
    {
        parent::__construct();
        if(!$this->session->userdata('id'))
        {
            $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER,  "Anda Harus Login"));
            redirect(site_url('/login'));
  	    }
    }

}

class Member_Controller extends User_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role') != 2)
        {
    		$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, "Anda Tidak Berhak Masuk Kehalaman Ini"));
    		redirect(site_url('/login'));
        }
    }

}

class Admin_Controller extends User_Controller {    

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role') != 1)
        {
    		$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, "Anda Tidak Berhak Masuk Kehalaman Ini"));
    		redirect(site_url('/login'));
        }
    }

}

class Public_Controller extends MY_Controller {

    function __construct()
    {
		parent::__construct();
    }

}

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Member_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(
            array(
                'user',
            )
        );
    }

	public function index()	{

		$member['role'] = User::MEMBER_ROLE;
		$data['members'] = count($this->user->getWhere($member));

		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/member/home', $data);
		$this->load->view('includes/footer');
	}
}

?>

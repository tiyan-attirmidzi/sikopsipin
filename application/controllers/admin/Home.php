<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(
            array(
                'user',
                'saving',
                'loan',
            )
        );
    }

	public function index()	{

		$member['role'] = User::MEMBER_ROLE;
		$data['members'] = count($this->user->getWhere($member));
		$data['savings'] = $this->saving->countSavings();
		$data['loans'] = $this->loan->countLoans();
		$data['paid'] = $this->loan->countPaid();

		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/admin/home', $data);
		$this->load->view('includes/footer');
	}
}

?>

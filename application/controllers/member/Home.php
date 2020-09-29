<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Member_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(
            array(
                'user',
				'saving',
				'loan'
            )
        );
    }

	public function index()	{

		$idUser = $this->session->userdata("id");
		$member['role'] = User::MEMBER_ROLE;
		$data['members'] = count($this->user->getWhere($member));
		$data['saving'] = $this->saving->countSavingById($idUser);
		$data['loan'] = $this->loan->countLoanById($idUser);
		$data['paid'] = $this->loan->countPaidById($idUser);

		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/member/home', $data);
		$this->load->view('includes/footer');
	}
}

?>

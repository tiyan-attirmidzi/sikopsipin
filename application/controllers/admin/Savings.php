<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Savings extends Admin_Controller {

	private $pageCurrent = 'admin/savings';
	private $pageContent = 'Simpanan';

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
		$data['pageCurrent'] = $this->pageCurrent;
		$data['pageTitle'] = 'Simpanan Anggota';
		$data['pageTitleSub'] = 'Cari Data Simpanan Anggota';
		$data['pageContent'] = $this->pageContent;
		// $data['members'] = $this->user->getWhere($member);
		// $data['genders'] = [
		// [
		// 	'name' => 'Laki-laki',
		// 	'label' => 'warning'
		// ],
		// [
		// 	'name' => 'Perempuan',
		// 	'label' => 'primary'
		// 	]
		// ];
		
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/admin/savings/content', $data);
		$this->load->view('includes/footer');

    }
    
}
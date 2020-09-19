<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auths extends Public_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model(
            array(
                'user',
            )
        );
        $this->load->library(
            array(
                'form_validation'
            )
        );
    }

	public function index()	{

		// Start Validation
        $this->form_validation->set_rules(
            'username',
            'Email',
            'required|trim',
            array(
                'required' => '*) Masukkan Username/Email Anda',
                'trim' => '*) Masukkan Username dengan Benar'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            array(
                'required' => '*) Masukkan Password Anda',
                'min_length' => '*) Password Minimal 6 Karakter'
            )
        );
		// End Validation

		// Start Checking
		if ($this->form_validation->run() == true) {

            $username = $this->input->post('username');
            $password = sha1(md5($this->input->post('password')));

            $result = $this->user->checkUser($username, $password);

            if (!empty($result) && count($result) > 0)
            {
                $dataSession = array(
                    'id' => $result->id,
                    'member_id' => $result->uid,
                    'username' => $result->username,
                    'email' => $result->email,
                    'name' => $result->name,
                    'gender' => $result->gender,
                    'address' => $result->address,
                    'phone' => $result->phone,
					'role' => $result->role,
					'joined_since' => $result->joined_since
                );

                $this->session->set_userdata($dataSession);

                if ($result->role == 1) {
                    redirect('admin/');
                }
                else {
                    redirect('member/');
                }

            }
            else
            {
                $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, "Login Gagal, Username/Email dan Password Tidak Valid"));
                redirect('/', 'refresh');
            }
        }
        else {
			$this->load->view('includes/auth/header');
			$this->load->view('pages/auth/login');
			$this->load->view('includes/auth/footer');
        }
		// End Checking
		
	}
	
	public function registration() {
		$this->load->view('includes/auth/header');
		$this->load->view('pages/auth/registration');
		$this->load->view('includes/auth/footer');
		// echo "member-".date('YmdHis');
	}

	public function logout() {
		$this->session->sess_destroy();
        redirect(base_url());
	}
}

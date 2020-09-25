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
                $image = $result->gender == User::MALE ? "male.png" : "female.png";
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
                    'joined_since' => $result->joined_since,
                    'image' => $image
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
				$this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::ERROR, "Login Gagal!", "Username/Email dan Password Tidak Valid", "false"));
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

		// Start Validation
        $this->form_validation->set_rules(
            'name',
            'Nama',
            'required',
            array(
                'required' => '*) Masukkan <b>Nama</b> Anda'
            )
        );
		$this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[users.username]', 
            array(
                'required' => '*) Masukkan <b>Username</b> Anda', 
                'trim' => '*) Masukkan <b>Username</b> Dengan Benar',
                'is_unique' => '*) <b>Username</b> Telah Digunakan'
            )
        );
		$this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[users.email]', 
            array(
                'required' => '*) Masukkan <b>Email</b> Anda', 
                'valid_email' => '*) Masukkan Alamat <b>Email</b> Dengan Benar',
                'is_unique' => '*) Alamat <b>Email</b> Telah Digunakan'
            )
		);
		$this->form_validation->set_rules(
            'phone',
            'Phone',
            'required',
            array(
                'required' => '*) Masukkan <b>Nomor Handphone</b> Anda'
            )
        );
		$this->form_validation->set_rules(
            'address',
            'Alamat',
            'required',
            array(
                'required' => '*) Masukkan <b>Alamat</b> Anda'
            )
        );
        $this->form_validation->set_rules(
            'password', 
            'Password', 
            'required|min_length[8]',
            array(
                'required' => '*) Masukkan <b>Password</b> Anda', 
                'min_length' => '*) <b>Password</b> Minimal 8 Karakter'            
            )
        );
        $this->form_validation->set_rules(
            'password-confirm',
            'Ulang Password', 
            'required|matches[password]',
            array(
                'required' => '*) Masukkan <b>Ulang Password</b> Anda', 
                'matches' => '*) <b>Password</b> Tidak Valid'
            )
        );
		// End Validation

		if ($this->form_validation->run() === TRUE) {
			$data['uid'] = "member-".date('YmdHis');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
            $data['password'] = sha1(md5($this->input->post('password')));
            $data['gender'] = $this->input->post('gender');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
			$data['role'] = User::MEMBER_ROLE;
			$data['joined_since'] = date('Y-m-d H:i:s');;
			
			$this->user->insert($data);
            $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, "Registrasi Berhasil, Silahkan Masuk"));
            redirect('/', 'refresh');
		} else {
			$this->load->view('includes/auth/header');
			$this->load->view('pages/auth/registration');
			$this->load->view('includes/auth/footer');
		}

	}

	public function logout() {
		$this->session->sess_destroy();
        redirect(base_url());
	}
}

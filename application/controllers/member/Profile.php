<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Member_Controller {

	private $pageCurrent = 'member/profile';
    private $pageContent = 'Profil';

    public function __construct() {
        parent::__construct();
        $this->load->model(
            array(
                'user',
                'loan',
                'saving'
            )
        );
    }
    
    public function index() {

		$id = $this->session->userdata("id");

        $member['id'] = $id;
        $data['member'] = $this->user->getWhere($member);

        if ($this->input->post() != null) {
            
            // Start Validation
            $this->form_validation->set_rules(
                'name',
                'Nama',
                'required',
                array(
                    'required' => '*) Masukkan <b>Nama</b>'
                )
            );
            $this->form_validation->set_rules(
                'phone',
                'Phone',
                'required',
                array(
                    'required' => '*) Masukkan <b>Nomor Handphone</b>'
                )
            );
            $this->form_validation->set_rules(
                'address',
                'Alamat',
                'required',
                array(
                    'required' => '*) Masukkan <b>Alamat</b>'
                )
            );
            
            // End Validation

            if ($this->input->post('password') != null) {
                
                $this->form_validation->set_rules(
                    'password', 
                    'Password', 
                    'min_length[8]',
                    array(
                        'min_length' => '*) <b>Password</b> Minimal 8 Karakter'            
                    )
                );
                $this->form_validation->set_rules(
                    'password-confirm',
                    'Ulang Password', 
                    'required|matches[password]',
                    array(
                        'required' => '*) Masukkan <b>Ulang Password</b>', 
                        'matches' => '*) <b>Password</b> Tidak Valid'
                    )
                );

                if ($this->form_validation->run() === TRUE) {
                    $data['password'] = sha1(md5($this->input->post('password')));
                }

            }

            if ($data['member'][0]->username !== $this->input->post('username')) {
                $this->form_validation->set_rules(
                    'username',
                    'Username',
                    'required|trim|is_unique[users.username]', 
                    array(
                        'required' => '*) Masukkan <b>Username</b>', 
                        'trim' => '*) Masukkan <b>Username</b> Dengan Benar',
                        'is_unique' => '*) <b>Username</b> Telah Digunakan'
                    )
                );
            }

            if ($data['member'][0]->email !== $this->input->post('email')) {
                $this->form_validation->set_rules(
                    'email',
                    'Email',
                    'required|valid_email|is_unique[users.email]', 
                    array(
                        'required' => '*) Masukkan <b>Email</b>', 
                        'valid_email' => '*) Masukkan Alamat <b>Email</b> Dengan Benar',
                        'is_unique' => '*) Alamat <b>Email</b> Telah Digunakan'
                    )
                );
            }

            if ($this->form_validation->run() === TRUE) {

                if ($_FILES['userfile']['name']) {

                    $filename                               = date('YmdHis');
                    $config['upload_path']          		= './assets/uploads/';
                    $config['allowed_types']        		= 'gif|jpg|png|jpeg';
                    $config['overwrite']                    = "true";
                    $config['max_size']                     = "2048";
                    $config['file_name']                    = $this->input->post('username').'-'.$filename;	
        
                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload()) {
        
                        $this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::ERROR, "ERROR!", $this->upload->display_errors(), "false"));
                        redirect($this->pageCurrent, 'refresh');
        
                    } else {

                        $file_upload = $this->upload->data();
                        $input['username'] = $this->input->post('username');
                        $input['email'] = $this->input->post('email');
                        $input['name'] = $this->input->post('name');
                        $input['gender'] = $this->input->post('gender');
                        $input['address'] = $this->input->post('address');
                        $input['phone'] = $this->input->post('phone');
                        $input['image'] = $file_upload['file_name'];


                        $fileImage = $this->input->post('old_image');
                        $pathFile = './assets/uploads/';
                        unlink($pathFile.$fileImage);
                        
                        if ($this->user->update($id, $input)) {
                            echo "
                                <script language='javascript'>
                                    alert('Perhatian! Mohon Login/Masuk ulang ke Dashboard Anda');
                                </script>
                            ";
                            redirect('logout', 'refresh');
                        }

                    }
                } else {
                    
                    $input['username'] = $this->input->post('username');
                    $input['email'] = $this->input->post('email');
                    $input['name'] = $this->input->post('name');
                    $input['gender'] = $this->input->post('gender');
                    $input['address'] = $this->input->post('address');
                    $input['phone'] = $this->input->post('phone');

                    if ($this->user->update($id, $input)) {
                        $this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::SUCCESS, "Berhasil!", "Data telah diperbarui", "false"));
                        redirect($this->pageCurrent, 'refresh');
                    }

                }
            } else {
                $this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::ERROR, "Gagal!", "Data yang diinputkan tidak valid", "false"));
            }

        }

        $data['pageCurrent'] = $this->pageCurrent;
        $data['pageTitle'] = 'Edit Data Diri';
        $data['pageTitleSub'] = 'Data Diri';
        $data['pageContent'] = $this->pageContent;
        $data['genders'] = ['Laki-laki','Perempuan'];

        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/sidebar');
        $this->load->view('pages/admin/members/update', $data);
        $this->load->view('includes/footer');

    }

    public function print()
    {
        $id = $this->session->userdata("id");

        $user['id_user'] = $id;
        $member['id'] = $user['id_user'];
		$data['member'] = $this->user->getWhere($member);
		$data['loans'] = $this->loan->getWhere($user);
        $data['debt'] = $this->loan->countDebtTotal($user['id_user']) - $this->loan->countDebtpaid($user['id_user']);
        $data['savings'] = $this->saving->getSavingsOfMembers($user['id_user']);
		$data['statuses'] = [
			[
				'name' => 'Belum Lunas'
			],
			[
				'name' => 'Lunas'
			]
        ];
        $data['types'] = [
			[
				'name' => 'Setor'
			],
			[
				'name' => 'Tarik'
			]
		];
		$data['kinds'] = [
			[
				'name' => 'Pokok'
			],
			[
				'name' => 'Sukarela'
			],
			[
				'name' => 'Wajib'
			]
        ];
        
        $this->load->library('f_pdf');
        $this->load->view('pages/member/print', $data);
    }
}
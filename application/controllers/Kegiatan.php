<?php

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
    }
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'kegiatan' => $this->Donasi_model->getTotalDonasiKegiatan()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('kegiatan/index');
        $this->load->view('templates/footer');
    }

    public function donasi()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'ketua') {
                redirect('ketua/kegiatan');
            } elseif ($this->CI->session->userdata['level'] == 'admin') {
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('success_login', 'Silahkan login dahulu !.');
                redirect('kegiatan');
            }
        }
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('kegiatan/donasi');
        $this->load->view('templates/footer');
    }

    public function rek()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('kegiatan/rek');
        $this->load->view('templates/footer');
    }
}

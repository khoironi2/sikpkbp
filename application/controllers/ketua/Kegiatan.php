<?php

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
    }

    public function index()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'donatur') {
                redirect('donatur/donasi');
            } elseif ($this->CI->session->userdata['level'] == 'admin') {
                redirect('admin/dashboard');
            }
        }
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'kegiatan' => $this->Donasi_model->getTotalDonasiKegiatan()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_ketua');
        $this->load->view('ketua/kegiatan/index');
        $this->load->view('templates/footer');
    }
}

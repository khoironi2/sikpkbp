<?php

class Laporan extends CI_Controller
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
            if ($this->CI->session->userdata['level'] == 'ketua') {
                redirect('ketua/kegiatan');
            } elseif ($this->CI->session->userdata['level'] == 'admin') {
                redirect('admin/dashboard');
            }
        }

        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'laporan' => $this->db->get('tbl_laporan_donasi')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_donatur');
        $this->load->view('donatur/laporan/index');
        $this->load->view('templates/footer');
    }
}

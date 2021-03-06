<?php

class Donatur extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'donatur' => $this->Users_model->getAllUsersDonatur()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_ketua');
        $this->load->view('ketua/donatur/index');
        $this->load->view('templates/footer');
    }
}

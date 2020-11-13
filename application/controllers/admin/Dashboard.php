<?php

class Dashboard extends CI_Controller
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
                redirect('donatur/kegiatan');
            } elseif ($this->CI->session->userdata['level'] == 'ketua') {
                redirect('ketua/kegiatan');
            }
        }
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'profile' => $this->db->get('tbl_profile')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/dashboard/index');
        $this->load->view('templates/footer');
    }

    public function update ($id)
    {

        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'profile' => $this->db->get_where('tbl_profile', ['id' => $id])->row_array()
        ];

        $this->form_validation->set_rules('title', 'judul', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/dashboard/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_profile', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Profile Berhasil Diubah</div>');
            redirect('admin/dashboard');
        }
    }
}

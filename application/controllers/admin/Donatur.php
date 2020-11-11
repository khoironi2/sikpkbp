<?php

class Donatur extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'donatur' => $this->db->get_where('tbl_users', ['level' => 'donatur'])->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/donatur/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->form_validation->set_rules('name', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/donatur/create');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => 'donatur'
            ];

            $this->db->insert('tbl_users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Donatur Berhasil Ditambahkan</div>');
            redirect('admin/donatur');
        }
    }
}

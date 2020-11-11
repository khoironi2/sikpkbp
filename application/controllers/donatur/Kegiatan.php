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
            if ($this->CI->session->userdata['level'] == 'ketua') {
                redirect('ketua/kegiatan');
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
        $this->load->view('templates/navbar_donatur');
        $this->load->view('donatur/kegiatan/index');
        $this->load->view('templates/footer');
    }

    public function donasi($id)
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
            'kegiatan' => $this->db->get_where('tbl_kegiatan', ['id_kegiatan' => $id])->row_array()
        ];
        $this->form_validation->set_rules('id_kegiatan', 'kegiatan', 'required');
        $this->form_validation->set_rules('nominal_donasi', 'nominal_donasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_donatur');
            $this->load->view('donatur/kegiatan/donasi');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kegiatan' => $this->input->post('id_kegiatan'),
                'nominal_donasi' => $this->input->post('nominal_donasi'),
                'validasi_donasi' => 'belum_transfer',
                'time_create_donasi' => date('Y-m-d H:i:s'),
                'time_update_donasi' => date('Y-m-d H:i:s'),
                'id_users' => $this->input->post('id_users'),
            ];
            $this->db->insert('tbl_donasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">Sukses, Donasi berhasil ditambah !</div>');
            redirect('donatur/kegiatan/rek');
        }
    }

    public function rek()
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
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_donatur');
        $this->load->view('donatur/kegiatan/rek');
        $this->load->view('templates/footer');
    }
}

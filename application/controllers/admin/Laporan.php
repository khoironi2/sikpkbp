<?php 

class Laporan extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/laporan/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/laporan/create');
        $this->load->view('templates/footer');
    }
}
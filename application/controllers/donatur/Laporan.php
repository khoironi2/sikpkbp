<?php 

class Laporan extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_ketua');
        $this->load->view('ketua/laporan/index');
        $this->load->view('templates/footer');
    }
}
<?php

class Donasi extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'alldonasi' => $this->Donasi_model->getTotalDonaturKegiatan(),
            'totaldonasi' => $this->Donasi_model->getTotaldonasi()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/donasi/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/donasi/create');
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/donasi/edit');
        $this->load->view('templates/footer');
    }

    public function laporan_keuangan_pdf()
    {
        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            'totalpenjualan' => $this->Donasi_model->getTotaldonasiBydate($keyword1, $keyword2),
            // 'totalpenjualan' => $this->Penjualan_model->getTotalPenjualan(),
            'logo' => '<img src="assets/img/sample/apple.png" alt="" class="mr-3" height="50">',
            'gambar' => 'assets/img/perbaikan/'
        ];
        $data['nasabah'] = $this->Donasi_model->getTotalDonaturKegiatanBydate($keyword1, $keyword2);
        $this->load->view('admin/donasi/laporan/pdf/Donasi', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_donasi.pdf", ['Attachment' => 0]);
    }
}

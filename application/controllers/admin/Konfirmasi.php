<?php

class Konfirmasi extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'donasi' => $this->Donasi_model->getAll(),
            'donasiku' => $this->Donatur_model->getMyDonasiKegiatan(),
            'totaldonasiku' => $this->Donatur_model->getTotalDonasiKu()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/konfirmasi/index');
        $this->load->view('templates/footer');
    }

    public function updateStatusW($id)
    {
        $client = $this->Donasi_model->getPById($id);
        $status_client = "";

        if ($client->validasi_donasi == "sudah_tranfer") {
            $status_client = "terkonfirmasi";
        } else {
            $status_client = "terkonfirmasi";
        }

        $data = array(
            'id_donasi'         => $id,
            'validasi_donasi'     => $status_client
        );

        $this->Donasi_model->updateData($id, $data);

        redirect(site_url('admin/konfirmasi'));
    }
}

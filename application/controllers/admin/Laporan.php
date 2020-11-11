<?php

class Laporan extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'laporan' => $this->db->get('tbl_laporan_donasi')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/laporan/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'kegiatan' => $this->db->get('tbl_kegiatan')->result_array(),
        ];

        $this->form_validation->set_rules('deskripsi_laporan_donasi', 'deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/laporan/create');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_file' => $this->input->post('nama_file'),
                'id_kegiatan' => $this->input->post('id_kegiatan'),
                'deskripsi_laporan_donasi' => $this->input->post('deskripsi_laporan_donasi'),
                'id_users' => $data['users']['id_users'],
            ];

            $upload_image = $_FILES['file_laporan_donasi']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'pdf';
                $config['upload_path'] = './assets/laporan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_laporan_donasi')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file_laporan_donasi', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->insert('tbl_laporan_donasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Laporan Donasi Berhasil Ditambahkan</div>');
            redirect('admin/laporan');
        }
    }

    public function destroy($id)
    {
        $this->db->delete('tbl_laporan_donasi', ['id_laporan_donasi' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Laporan Donasi Berhasil Dihapus</div>');
        redirect('admin/laporan');
    }
}

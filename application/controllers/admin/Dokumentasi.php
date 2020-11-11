<?php

class Dokumentasi extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'kegiatan' => $this->db->get('tbl_kegiatan')->result_array(),
            'dokumentasi' => $this->db->get('tbl_dokumentasi')->result_array(),
        ];

        $this->form_validation->set_rules('deskripsi_dokumentasi', 'deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/dokumentasi/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kegiatan' => $this->input->post('id_kegiatan'),
                'deskripsi_dokumentasi' => $this->input->post('deskripsi_dokumentasi'),
            ];

            $upload_image = $_FILES['gambar_dokumentasi']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/img/dokumentasi/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_dokumentasi')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_dokumentasi', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->insert('tbl_dokumentasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dokumentasi Berhasil Ditambahkan</div>');
            redirect('admin/dokumentasi');
        }
    }
    public function edit($id)
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'kegiatan' => $this->db->get('tbl_kegiatan')->result_array(),
            'dokumentasi' => $this->db->get_where('tbl_dokumentasi', ['id_dokumentasi' => $id])->row_array()
        ];

        $old_image = $data['dokumentasi']['gambar_dokumentasi'];

        $this->form_validation->set_rules('deskripsi_dokumentasi', 'deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/dokumentasi/edit');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kegiatan' => $this->input->post('id_kegiatan'),
                'deskripsi_dokumentasi' => $this->input->post('deskripsi_dokumentasi'),
            ];

            $upload_image = $_FILES['gambar_dokumentasi']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/img/dokumentasi/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_dokumentasi')) {
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/dokumentasi/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_dokumentasi', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_dokumentasi', $this->input->post('id'));
            $this->db->update('tbl_dokumentasi', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dokumentasi Berhasil Diubah</div>');
            redirect('admin/dokumentasi');
        }
    }

    public function destroy($id)
    {
        $data = [
            'dokumentasi' => $this->db->get_where('tbl_dokumentasi', ['id_dokumentasi' => $id])->row_array(),
        ];

        $old_image = $data["dokumentasi"]["gambar_dokumentasi"];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/dokumentasi/' . $old_image);
        }

        $this->db->delete('tbl_dokumentasi', ['id_dokumentasi' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dokumentasi Berhasil Dihapus</div>');
        redirect('admin/dokumentasi');
    }
}

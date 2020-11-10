<?php 

class Kegiatan extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'kegiatan' => $this->db->get('tbl_kegiatan')->result_array(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_admin');
        $this->load->view('admin/kegiatan/index');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH'
        ];

        $this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'required');
        $this->form_validation->set_rules('time_pelakasanaan_kegiatan', 'tanggal kegiatan', 'required');
        // $this->form_validation->set_rules('gambar_kegiatan', 'gambar kegiatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/kegiatan/create');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'time_pelakasanaan_kegiatan' => $this->input->post('time_pelakasanaan_kegiatan'),
            ];

            $upload_image = $_FILES['gambar_kegiatan']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/img/kegiatan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_kegiatan')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_kegiatan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->insert('tbl_kegiatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kegiatan Berhasil Ditambahkan</div>');
            redirect('admin/kegiatan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH',
            'kegiatan' => $this->db->get_where('tbl_kegiatan', ['id_kegiatan' => $id])->row_array(),
        ];

        $old_image = $data['kegiatan']['gambar_kegiatan'];

        $this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'required');
        $this->form_validation->set_rules('time_pelakasanaan_kegiatan', 'tanggal kegiatan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/kegiatan/edit');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'time_pelakasanaan_kegiatan' => $this->input->post('time_pelakasanaan_kegiatan'),
            ];

            $upload_image = $_FILES['gambar_kegiatan']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/img/kegiatan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_kegiatan')) {
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/kegiatan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_kegiatan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_kegiatan', $this->input->post('id'));
            $this->db->update('tbl_kegiatan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kegiatan Berhasil Diubah</div>');
            redirect('admin/kegiatan');
        }
    }

    public function destroy($id)
    {
        $data = [
            'kegiatan' => $this->db->get_where('tbl_kegiatan', ['id_kegiatan' => $id])->row_array(),
        ];

        $old_image = $data["kegiatan"]["gambar_kegiatan"];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/kegiatan/' . $old_image);
        }

        $this->db->delete('tbl_kegiatan', ['id_kegiatan' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kegiatan Berhasil Dihapus</div>');
        redirect('admin/kegiatan');
    }
}
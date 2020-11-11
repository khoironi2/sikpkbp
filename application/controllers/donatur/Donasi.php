<?php

class Donasi extends CI_Controller
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
            'donasiku' => $this->Donatur_model->getMyDonasiKegiatan(),
            'totaldonasiku' => $this->Donatur_model->getTotalDonasiKu()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_donatur');
        $this->load->view('donatur/donasi/index');
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_donasi');


        //CONFIGURASI UPLOAD IMAGE
        $config['upload_path']         = './assets/img/bukti_donasi';
        $config['allowed_types']     = 'jpg|png|svg|jpeg';
        $config['max_size']         = '12000';

        $this->load->library('upload', $config);

        //PROSES UPLOAD IMAGE
        if (!$this->upload->do_upload('bukti_donasi')) {
            $data['errors']     = $this->upload->display_errors();
            print_r($data);
        } else {
            //PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
            $upload_data                = array('uploads' => $this->upload->data());
            // Image Editor
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/img/bukti_donasi/' . $upload_data['uploads']['file_name'];
            $config['new_image']         = './assets/img/bukti_donasi/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['quality']             = "100%";
            $config['max_size'] = '100M';
            $config['maintain_ratio']     = FALSE;
            $config['width']             = 5028; // Pixel
            $config['height']             = 3364; // Pixel
            $config['x_axis']             = 0;
            $config['y_axis']             = 0;
            $config['thumb_marker']     = '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //PROSES MASUK KEDATABASE
            //$slug = url_title($this->input->post('judul_post'), 'dash', TRUE);
            //date_default_timezone_set("ASIA/JAKARTA");
            $data = array(
                'time_update_donasi'    => date('Y-m-d H:i:s'),
                'bukti_donasi'        => $upload_data['uploads']['file_name'],
                'validasi_donasi'        => 'sudah_tranfer'
            );

            $update = $this->Donatur_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');

                redirect('donatur/donasi');
            }
        }
    }
}

<?php

class Donasi_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_donasi.id_users');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_donasi.id_kegiatan');
        // $this->db->where('validasi_donasi', 'sudah_tranfer');
        $this->db->where('tbl_users.level', 'donatur');

        $result = $this->db->get();

        return $result->result();
    }
    public function insert($data1)
    {
        $this->db->insert('tbl_donasi', $data1);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function tampil_data()
    {
        return $this->db->get('tbl_katalog');
    }

    function cari($id_katalog)
    {
        $query = $this->db->get_where('tbl_katalog', array('id_katalog' => $id_katalog));
        return $query;
    }

    public function getTotalDonasiKegiatan()
    {
        $this->db->select('tbl_kegiatan.id_kegiatan,tbl_kegiatan.gambar_kegiatan,tbl_kegiatan.nama_kegiatan,tbl_kegiatan.nominal_dana_kegiatan,tbl_kegiatan.time_pelakasanaan_kegiatan,sum(tbl_donasi.nominal_donasi) as total,
        tbl_kegiatan.bulan,
        tbl_kegiatan.hari,
        tbl_kegiatan.tahun');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_donasi.id_kegiatan');
        $this->db->group_by('tbl_kegiatan.id_kegiatan');
        $this->db->where('validasi_donasi !=', 'belum_transfer');

        $result = $this->db->get();

        return $result->result();
    }
    public function getTotalDonaturKegiatan()
    {
        $this->db->select('tbl_kegiatan.id_kegiatan,tbl_kegiatan.gambar_kegiatan,tbl_kegiatan.nama_kegiatan,tbl_kegiatan.nominal_dana_kegiatan,tbl_kegiatan.time_pelakasanaan_kegiatan,sum(tbl_donasi.nominal_donasi) as total,count(tbl_donasi.id_users) as totaldonatur');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_donasi.id_kegiatan');
        $this->db->group_by('tbl_kegiatan.id_kegiatan');
        $this->db->where('validasi_donasi !=', 'belum_transfer');

        $result = $this->db->get();

        return $result->result();
    }
    public function getTotalDonaturKegiatanBydate($keyword1, $keyword2)
    {
        $this->db->select('tbl_kegiatan.id_kegiatan,tbl_kegiatan.gambar_kegiatan,tbl_kegiatan.nama_kegiatan,tbl_kegiatan.nominal_dana_kegiatan,tbl_kegiatan.time_pelakasanaan_kegiatan,sum(tbl_donasi.nominal_donasi) as total,count(tbl_donasi.id_users) as totaldonatur');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_donasi.id_kegiatan');
        $this->db->group_by('tbl_kegiatan.id_kegiatan');
        $this->db->where('validasi_donasi !=', 'belum_transfer');
        $this->db->where('time_create_donasi >=', $keyword1);
        $this->db->where('time_create_donasi <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }
    public function getTotaldonasiBydate($keyword1, $keyword2)
    {
        $this->db->select('sum(tbl_donasi.nominal_donasi) as total');
        $this->db->from('tbl_donasi');
        $this->db->where('validasi_donasi !=', 'belum_transfer');
        $this->db->where('time_create_donasi >=', $keyword1);
        $this->db->where('time_create_donasi <=', $keyword2);
        $result = $this->db->get();

        return $result->result();
    }
    public function getTotaldonasi()
    {
        $this->db->select('sum(tbl_donasi.nominal_donasi) as total');
        $this->db->from('tbl_donasi');
        $this->db->where('validasi_donasi !=', 'belum_transfer');
        $result = $this->db->get();

        return $result->result();
    }
    public function getDetaildonatur()
    {
        $this->db->select('*');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_donasi.id_users');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_donasi.id_kegiatan');
        $this->db->group_by('tbl_users.id_users');
        $this->db->where('validasi_donasi !=', 'belum_transfer');
        $result = $this->db->get();

        return $result->result();
    }

    public function getNasabahbytgl($keyword1, $keyword2)
    {
        $this->db->select('tbl_users.name,tbl_penjualan.time_create_penjualan,tbl_katalog.nama_katalog,sum(tbl_penjualan.berat_penjualan) as berat,tbl_penjualan.harga_penjualan,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->join('tbl_users', 'tbl_users.id_users=tbl_penjualan.id_users');
        $this->db->group_by('tbl_penjualan.id_penjualan');
        $this->db->where('time_create_penjualan >=', $keyword1);
        $this->db->where('time_create_penjualan <=', $keyword2);
        $result = $this->db->get();

        return $result->result();
    }
    public function getSaldoku($keyword1, $keyword2)
    {
        $this->db->select('sum(tbl_penjualan.berat_penjualan) as berat,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->where('time_create_penjualan >=', $keyword1);
        $this->db->where('time_create_penjualan <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }

    public function getStokReady()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('armada');
        $this->db->where('status', 'ready');
        $result = $this->db->get();

        return $result->result();
    }

    public function getPById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_donasi');
        $this->db->where('id_donasi', $id);

        $result = $this->db->get();

        return $result->row();
    }
    public function updateData($id, $data)
    {
        $this->db->where('id_donasi', $id);
        $this->db->update('tbl_donasi', $data);
    }
}

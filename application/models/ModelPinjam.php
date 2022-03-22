<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPinjam extends CI_Model
{
    //manip table pinjam
    public function simpanPinjam($data)
    {
        $this->db->insert('pinjam', $data);
    }
    public function selectData($table, $where)
    {
        return $this->db->get($table, $where);
    }
    public function updateData($data, $where)
    {
        $this->db->update('pinjam', $data, $where);
    }
    public function deleteData($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }
    public function joinData()
    {
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('detail_pinjam', 'detail_pinjam.no_pinjam=pinjam.no_pinjam', 'Right');
        $this->db->join('user', 'pinjam.id_user = user.id');
        $this->db->order_by('pinjam.no_pinjam', 'DESC');
        // $this->db->join('booking', 'booking_detail.id_booking = booking.id_booking');
        // $this->db->join('buku', 'booking_detail.id_buku = buku.id_buku');

        return $this->db->get()->result_array();
    }
    //manip tabel detai pinjam
    public function simpanDetail($idbooking, $nopinjam)
    {
        $sql = "INSERT INTO detail_pinjam (no_pinjam,id_buku) SELECT pinjam.no_pinjam,booking_detail.id_buku FROM pinjam, booking_detail WHERE booking_detail.id_booking=$idbooking AND pinjam.no_pinjam='$nopinjam'";
        $this->db->query($sql);
    }
}

<?php

class Model_status extends CI_Model
{

  function simpan_status()
  {
    $tanggal = date('Y-m-d');
    $data = array('status' => $_POST['status'],
                  'member_id' => 2,
                  'tanggal' => $tanggal);

    $this->db->insert('status', $data);
  }

  function hapus($id)
  {
    $this->db->where('status_id', $id);
    $this->db->delete('status');
  }

  function tampil_status()
  {
    $query = "SELECT s.*, m.username
              FROM status AS s, member AS m
              WHERE m.member_id = s.member_id
              ORDER BY status_id DESC";

    return $this->db->query($query);
  }

  function cari_status($keyword, $field)
  {
    // perhatikan $field dan $fields berbeda
    if ($field == 'username') {
      $fields = 'm.username';
    }else {
      $fields = 's.status';
    }

    $query = "SELECT s.*, m.username
              FROM status AS s, member AS m
              WHERE m.member_id = s.member_id
              AND $fields LIKE '%$keyword%'
              ORDER BY status_id DESC";

    return $this->db->query($query);
  }
}


 ?>

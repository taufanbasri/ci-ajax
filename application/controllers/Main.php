<?php

class Main extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Model_status');
  }

  function index()
  {
    $this->load->view('view_main');
  }

  function postStatus()
  {
    $this->Model_status->simpan_status();
  }

  function hapusStatus($id)
  {
    $id = $_GET['status_id'];
    $this->Model_status->hapus($id);
  }

  function loadStatus()
  {
    $data = $this->Model_status->tampil_status();

    foreach ($data->result() as $status) {
      echo "<div class='status$status->status_id'>";
      echo $status->username."<br>";
      echo $status->tanggal."<br>";
      echo $status->status."<br>";
      echo "<a href='' onclick='hapus($status->status_id)'>Hapus</a><hr>";
      echo "</div>";

    }
  }

  function searchStatus()
  {
    $keyword = $_GET['keyword'];
    $field = $_GET['field'];

    $data = $this->Model_status->cari_status($keyword, $field);

    foreach ($data->result() as $status) {
      echo $status->username."<br>";
      echo $status->tanggal."<br>";
      echo $status->status."<br><hr>";
    }
  }
}


 ?>

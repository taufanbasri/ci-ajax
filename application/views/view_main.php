<script src="<?php echo base_url() ?>assets/jquery-3.1.1.min.js"></script>

<body onload="load_status()"></body>

<script type="text/javascript">
$(document).ready(function() {
  $("#keyword").keyup(function() {
    var keyword = $("#keyword").val();
    var field = $("#field").val();

    $.ajax({
      url: 'Main/searchStatus',
      type: 'GET',
      data: 'keyword='+keyword+'&field='+field,
      success: function(respon) {
        $("#list_status").html(respon);
      }
    });
  });

  $("#submitstatus").click(function() {
    var status = $("#status").val();

    $.ajax({
      url: 'Main/postStatus',
      type: 'POST',
      data: 'status='+status,
      success: function(respon) {
        load_status();
      }
    });
  });
});

function hapus(id) {
  $.ajax({
    url: "Main/hapusStatus",
    type: "GET",
    data: 'status_id='+id,
    success: function(respon) {
      $('.status'+id).hide(300);
    }
  });
}

function load_status() {
  $.ajax({
    url: "Main/loadStatus",
    type: "GET",
    data: '',
    success: function(respon) {
      $("#list_status").html(respon);
    }
  });
}

</script>

<select id="field">
  <option value="status">Status</option>
  <option value="username">Nama</option>
</select>

<input type="text" id="keyword" placeholder="Kata Kunci"><br>
<textarea id="status"></textarea><br>
<button id="submitstatus">Posting Status</button>
<hr>
<div id="list_status"></div>

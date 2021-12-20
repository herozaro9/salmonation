<br>
<div class="row">
  <div class="col-xl-12 col-md-12 col-sm-12 col-12 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($total[0]['total'],0,",","."); ?><span class="new-box">Whitelist</span></h4><span>Total Whitelist</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-12 dashboard-sec box-col-12">
  <div class="card earning-card">
    <div class="card-body p-0">
      <div class="row m-0">
        <div class="col-xl-12 earning-content p-0">
          <div class="row m-0 chart-left pb-0">
            <div class="col-xl-12 p-0 left_side_earning">
              <h5>Whitelists</h5>
              <p class="font-roboto">Overview data whitelist</p>
            </div>
          </div>
        </div>
        <div class="col-lg-12 pb-3 pt-3">
          <table class="table table-striped datatablexport">
            <thead>
              <tr>
                <th>Fullname</th>
                <th class="text-center">Telegram</th>
                <th class="text-center">Twitter</th>
                <th class="text-center">Email</th>
                <th class="text-center">Address</th>
                <th class="text-center">Join Time</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)){
                foreach ($all as $dataall) { ?>
                  <tr>
                    <td><?php echo $dataall['fullname']; ?></td>
                    <td><?php echo $dataall['telegram']; ?></td>
                    <td><?php echo $dataall['twitter']; ?></td>
                    <td><?php echo $dataall['email']; ?></td>
                    <td><?php echo $dataall['bscaddress']; ?></td>
                    <td><?php echo $dataall['join_time']; ?></td>
                    <td class="pb-5 text-center">
                      <button type="button" class="btn btn-danger" onclick="deletewhitelist('<?php echo $dataall["whitelist_id"]; ?>')"><i class="fa fa-times"></i></button>
                    </td>
                  </tr>
                <?php } } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function deletewhitelist(whitelist_id){
      swal({
        title: "Are you sure want to delete this data?",
        text: "If data deleted you cannot be recovered!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $("#loading").show();
          $.ajax({
            url: '<?php echo base_url() ?>form/deletewhitelist',
            data: {whitelist_id : whitelist_id, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
            type: 'POST',
            datatype: "JSON",
            success: function (response) {
              var hasil = JSON.parse(response);
              if (hasil == "ok") {
                $("#loading").hide();
                swal("Gotcha!", "Whitelist Deleted Succesfully!", "success");
                setTimeout(function(){ location.reload(); }, 1000);
              }else{
                $("#loading").hide();
                swal("Oops!", "Failed Delete Data!", "error");
              }
            }
          });
        } else {
          // WOOO
        }
      });
    }
  </script>
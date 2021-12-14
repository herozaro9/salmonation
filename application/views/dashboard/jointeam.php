<br>
<div class="row">
  <div class="col-xl-3 col-md-3 col-sm-3 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($total[0]['total'],0,",","."); ?><span class="new-box">Join Team</span></h4><span>Total Join Team</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-3 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($pending[0]['total'],0,",","."); ?><span class="new-box">Join Team</span></h4><span>Pending</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-3 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($followup[0]['total'],0,",","."); ?><span class="new-box">Join Team</span></h4><span>Follow Up</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-3 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($end[0]['total'],0,",","."); ?><span class="new-box">Join Team</span></h4><span>Finished</span>
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
        <div class="col-xl-3 earning-content p-0">
          <div class="row m-0 chart-left pb-0">
            <div class="col-xl-12 p-0 left_side_earning">
              <h5>Join Team</h5>
              <p class="font-roboto">Overview data reques join team</p>
            </div>
          </div>
        </div>
        <div class="col-lg-12 pb-3 pt-3">
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th>Title</th>
                <th class="text-center">Email</th>
                <th class="text-center">Telegram</th>
                <th class="text-center">Phone Number</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)){
                foreach ($all as $dataall) { ?>
                  <tr>
                    <td><?php echo $dataall['name']; ?></td>
                    <td><?php echo $dataall['telegram']; ?></td>
                    <td><?php echo $dataall['mail']; ?></td>
                    <td><?php echo $dataall['phone']; ?></td>
                    <td class="text-center"><?php if($dataall['status'] == "Pending"){echo '<span class="badge badge-warning">Pending</span>';}else if($dataall['status'] == "Follow Up"){echo '<span class="badge badge-primary">Follow Up</span>';}else{echo '<span class="badge badge-success">Finished</span>';} ?></td>
                    <td class="d-flex pb-5 text-center">
                      <button type="button" class="btn btn-warning" onclick="findjointeam('<?php echo $dataall["join_id"]; ?>')"><i class="fa fa-edit"></i></button>&nbsp;
                      <button type="button" class="btn btn-danger" onclick="deletejointeam('<?php echo $dataall["join_id"]; ?>')"><i class="fa fa-times"></i></button>
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

  <!-- The Modal -->
  <div class="modal fade" id="myModaledit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form id="editjointeam">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Join Team Detail</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <input type="hidden" name="join_id" required="">
            <div class="row justify-content-center">
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" placeholder="Name" required="" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" required="" name="statusedit">
                    <option value="Pending">Pending</option>
                    <option value="Follow Up">Follow Up</option>
                    <option value="Finished">Finished</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" placeholder="Email" required="" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" name="phone" placeholder="Phone Number" required="" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Telegram</label>
                  <input type="text" name="telegram" placeholder="Telegram" required="" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Project</label>
                  <input type="text" name="project" placeholder="Project" required="" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Time Submit</label>
                  <input type="text" name="time_submit" placeholder="Time Submit" required="" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" rows="10" cols="80" required="" readonly="" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $("document").ready(function(){
      $("#editjointeam").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('join_id', $('input[name="join_id"]').val());
        form.append('status', $('select[name="statusedit"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');
        
        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/editjointeam',
          data: form,
          contentType: false,
          processData: false,
          cache: false,
          datatype : "JSON",
          type: 'POST',
          success: function (response) {
            var result = JSON.parse(response);
            if (result == "ok") {
              $("#loading").hide();
              swal("Gotcha!", "Request Join Team Updated Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });
    })

    function findjointeam(join_id){
      $.ajax({
        url: '<?php echo base_url(); ?>form/findjointeam',
        data: {join_id : join_id, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
        type: 'POST',
        datatype: "JSON",
        success: function (response) {
          if (response != "fail") {
            var hasil = JSON.parse(response);
            $('input[name="name"]').val(hasil[0].name);
            $('input[name="email"]').val(hasil[0].mail);
            $('input[name="phone"]').val(hasil[0].phone);
            $('input[name="telegram"]').val(hasil[0].telegram);
            $('input[name="project"]').val(hasil[0].project);
            $('input[name="time_submit"]').val(hasil[0].time_submit);
            $('input[name="join_id"]').val(hasil[0].join_id);
            $('textarea[name="description"]').val(hasil[0].description);
            $('select[name="statusedit"]').val(hasil[0].status).trigger('change');
            $("#myModaledit").modal("show");
          }else{
            swal("Oops!", "Data not found!", "error");
          }
        }
      });
    }

    function deletejointeam(join_id){
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
            url: '<?php echo base_url() ?>form/deletejointeam',
            data: {join_id : join_id, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
            type: 'POST',
            datatype: "JSON",
            success: function (response) {
              var hasil = JSON.parse(response);
              if (hasil == "ok") {
                $("#loading").hide();
                swal("Gotcha!", "Request Join Team Deleted Succesfully!", "success");
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
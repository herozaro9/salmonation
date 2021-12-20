<br>
<div class="col-xl-12 dashboard-sec box-col-12">
  <div class="card earning-card">
    <div class="card-body p-0">
      <div class="row m-0">
        <div class="col-xl-12 earning-content p-0">
          <div class="row m-0 chart-left pb-0">
            <div class="col-xl-10 p-0 left_side_earning">
              <h5>Teams</h5>
              <p class="font-roboto">Overview data team</p>
            </div>
            <div class="col-xl-2 p-0 left-btn a-right-bgt"><button type="button" class="btn btn-gradient a2-right-bgt" data-bs-toggle="modal" data-bs-target="#myModalnew">Add Team</button></div>
          </div>
        </div>
        <div class="col-lg-12 pb-3 pt-3">
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th>Name</th>
                <th class="text-center">Job</th>
                <th class="text-center">Order Position</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)){
                foreach ($all as $datateam) { ?>
                  <tr>
                    <td><?php echo $datateam['name']; ?></td>
                    <td class="text-center"><?php echo $datateam['job']; ?></td>
                    <td class="text-center"><?php echo $datateam['order_position']; ?></td>
                    <td class="d-flex pb-5 text-center">
                      <button type="button" class="btn btn-warning" onclick="findteam('<?php echo $datateam["team_id"]; ?>')"><i class="fa fa-edit"></i></button>&nbsp;
                      <button type="button" class="btn btn-danger" onclick="deleteteam('<?php echo $datateam["team_id"]; ?>', '<?php echo $datateam["file"]; ?>')"><i class="fa fa-times"></i></button>
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
  <div class="modal fade" id="myModalnew">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form id="addteam">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Team</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Fullname</label>
                  <input type="text" name="nameadd" placeholder="Insert Fullname" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Job</label>
                  <input type="text" name="jobadd" placeholder="Insert Job" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" required="" name="statusadd">
                    <option value="Aktif">Active</option>
                    <option value="Tidak Aktif">Not Active</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="imageadd" required="" class="form-control image-file" accept="image/png, image/gif, image/jpeg">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Order Position</label>
                  <input type="number" name="order_positionadd" placeholder="Insert Order Position" required="" class="form-control">
                  <small>* Insert a larger number so that it is show first</small>
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Linkedin</label>
                  <input type="text" name="lnadd" placeholder="https://linkedin.com/" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Facebook</label>
                  <input type="text" name="fbadd" placeholder="https://facebook.com/" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Instagram</label>
                  <input type="text" name="igadd" placeholder="https://instagram.com/" class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Twitter</label>
                  <input type="text" name="twadd" placeholder="https://twitter.com/" class="form-control">
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

  <!-- The Modal -->
  <div class="modal fade" id="myModaledit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form id="editteam">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Team</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-7 col-sm-8 col-12">
                <img src="#" class="img-fluid" id="imgmodal">
              </div>
            </div>
            <br>
            <div class="row justify-content-center">
              <input type="hidden" name="team_idedit" value="" id="team_id">
              <input type="hidden" name="hgambaredit" value="" id="hgambaredit">
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Fullname</label>
                  <input type="text" name="nameedit" placeholder="Insert Fullname" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Job</label>
                  <input type="text" name="jobedit" placeholder="Insert Job" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" required="" name="statusedit">
                    <option value="Aktif">Active</option>
                    <option value="Tidak Aktif">Not Active</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="imageedit" class="form-control image-file" accept="image/png, image/gif, image/jpeg">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Order Position</label>
                  <input type="number" name="order_positionedit" placeholder="Insert Order Position" required="" class="form-control">
                  <small>* Insert a larger number so that it is show first</small>
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Linkedin</label>
                  <input type="text" name="lnedit" placeholder="https://linkedin.com/" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Facebook</label>
                  <input type="text" name="fbedit" placeholder="https://facebook.com/" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Instagram</label>
                  <input type="text" name="igedit" placeholder="https://instagram.com/" class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Twitter</label>
                  <input type="text" name="twedit" placeholder="https://twitter.com/" class="form-control">
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
      $("#addteam").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('file', $('input[name="imageadd"]')[0].files[0]);
        form.append('name', $('input[name="nameadd"]').val());
        form.append('job', $('input[name="jobadd"]').val());
        form.append('ln', $('input[name="lnadd"]').val());
        form.append('fb', $('input[name="fbadd"]').val());
        form.append('ig', $('input[name="igadd"]').val());
        form.append('tw', $('input[name="twadd"]').val());
        form.append('order_position', $('input[name="order_positionadd"]').val());
        form.append('status', $('select[name="statusadd"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');

        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/addteam',
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
              swal("Gotcha!", "Team Added Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });

      $("#editteam").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('team_id', $('input[name="team_idedit"]').val());
        form.append('name', $('input[name="nameedit"]').val());
        form.append('job', $('input[name="jobedit"]').val());
        form.append('ln', $('input[name="lnedit"]').val());
        form.append('fb', $('input[name="fbedit"]').val());
        form.append('ig', $('input[name="igedit"]').val());
        form.append('tw', $('input[name="twedit"]').val());
        form.append('order_position', $('input[name="order_positionedit"]').val());
        form.append('status', $('select[name="statusedit"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');
        if ($('input[name="imageedit"]').val() != "") {
          form.append('file', $('input[name="imageedit"]')[0].files[0]);
          form.append('hgambar', $('input[name="hgambaredit"]').val());
        }
        
        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/editteam',
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
              swal("Gotcha!", "Team Updated Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });
    })

    function findteam(team_id){
      $.ajax({
        url: '<?php echo base_url(); ?>form/findteam',
        data: {team_id : team_id, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
        type: 'POST',
        datatype: "JSON",
        success: function (response) {
          if (response != "fail") {
            var hasil = JSON.parse(response);
            $('#titlemodal').text(hasil[0].title);
            $('input[name="nameedit"]').val(hasil[0].name);
            $('input[name="jobedit"]').val(hasil[0].job);
            $('input[name="order_positionedit"]').val(hasil[0].order_position);
            $('input[name="lnedit"]').val(hasil[0].ln);
            $('input[name="fbedit"]').val(hasil[0].fb);
            $('input[name="igedit"]').val(hasil[0].ig);
            $('input[name="twedit"]').val(hasil[0].tw);
            $('input[name="hgambaredit"]').val(hasil[0].file);
            $('input[name="team_idedit"]').val(hasil[0].team_id);
            $('select[name="statusedit"]').val(hasil[0].status).trigger('change');
            $('#imgmodal').attr('src', '<?php echo base_url(); ?>upload/team/' + hasil[0].file);
            $("#myModaledit").modal("show");
          }else{
            swal("Oops!", "Data not found!", "error");
          }
        }
      });
    }

    function deleteteam(team_id, image){
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
              url: '<?php echo base_url() ?>form/deleteteam',
              data: {team_id : team_id, image : image, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
              type: 'POST',
              datatype: "JSON",
              success: function (response) {
                var hasil = JSON.parse(response);
                if (hasil == "ok") {
                  $("#loading").hide();
                  swal("Gotcha!", "Team Deleted Succesfully!", "success");
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
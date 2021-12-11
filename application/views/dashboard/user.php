<br>
<div class="row">
  <div class="col-xl-3 col-md-3 col-sm-3 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($totaluser[0]['total'],0,",","."); ?><span class="new-box">User</span></h4><span>Total User</span>
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
            <h4><?php echo number_format($totaladmin[0]['total'],0,",","."); ?><span class="new-box">User</span></h4><span>Total Admin</span>
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
            <h4><?php echo number_format($aktif[0]['total'],0,",","."); ?><span class="new-box">User</span></h4><span>User Active</span>
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
            <h4><?php echo number_format($nonaktif[0]['total'],0,",","."); ?><span class="new-box">User</span></h4><span>User Not Active</span>
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
              <h5>Users</h5>
              <p class="font-roboto">Overview data user</p>
            </div>
            <div class="col-xl-12 p-0 left-btn a-right-bgt"><button type="button" class="btn btn-gradient a2-right-bgt" data-bs-toggle="modal" data-bs-target="#myModalnew">Add User</button></div>
          </div>
        </div>
        <div class="col-lg-12 pb-3 pt-3">
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th>Username</th>
                <th class="text-center">Email</th>
                <th class="text-center">Role</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)){
                foreach ($all as $dataall) { ?>
                  <tr>
                    <td><?php echo $dataall['username']; ?></td>
                    <td class="text-center"><?php echo $dataall['email']; ?></td>
                    <td class="text-center"><?php if($dataall['role'] == 'Admin'){echo '<span class="badge badge-warning">Admin</span>';}else{echo '<span class="badge badge-primary">User</span>';} ?></td>
                    <td class="text-center"><?php if($dataall['status'] == 'Tidak Aktif'){echo '<span class="badge badge-danger">Non Active</span>';}else{echo '<span class="badge badge-success">Active</span>';} ?></td>
                    <td class="d-flex pb-5 text-center">
                      <button type="button" class="btn btn-warning" onclick="finduser('<?php echo $dataall["user_id"]; ?>')"><i class="fa fa-edit"></i></button>&nbsp;
                      <button type="button" class="btn btn-danger" onclick="deleteuser('<?php echo $dataall["user_id"]; ?>')"><i class="fa fa-times"></i></button>
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
        <form id="adduser">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add User</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="usernameadd" placeholder="Insert Username" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Email</label>
                  <input type="mail" name="emailadd" placeholder="example@salmonation.io" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="passwordadd" placeholder="************" required="" class="form-control">
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
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" required="" name="roleadd">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                  </select>
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
        <form id="edituser">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit User</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row justify-content-center">
              <input type="hidden" name="user_idedit" value="" id="user_idedit">
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="usernameedit" placeholder="Insert Username" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Email</label>
                  <input type="mail" name="emailedit" placeholder="example@salmonation.io" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="passwordedit" placeholder="************" class="form-control">
                  <small>* Leave this input blank if you don't want to change the password</small>
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
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" required="" name="roleedit">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                  </select>
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
      $("#adduser").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('username', $('input[name="usernameadd"]').val());
        form.append('email', $('input[name="emailadd"]').val());
        form.append('password', $('input[name="passwordadd"]').val());
        form.append('role', $('select[name="roleadd"]').val());
        form.append('status', $('select[name="statusadd"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');

        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/adduser',
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
              swal("Gotcha!", "User Added Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });

      $("#edituser").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('user_id', $('input[name="user_idedit"]').val());
        form.append('username', $('input[name="usernameedit"]').val());
        form.append('email', $('input[name="emailedit"]').val());
        form.append('role', $('select[name="roleedit"]').val());
        form.append('status', $('select[name="statusedit"]').val());
        form.append('password', $('input[name="passwordedit"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');
        
        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/edituser',
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
              swal("Gotcha!", "User Updated Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });
    })

    function finduser(user_id){
      $.ajax({
        url: '<?php echo base_url(); ?>form/finduser',
        data: {user_id : user_id, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
        type: 'POST',
        datatype: "JSON",
        success: function (response) {
          if (response != "fail") {
            var hasil = JSON.parse(response);
            $('input[name="usernameedit"]').val(hasil[0].username);
            $('input[name="emailedit"]').val(hasil[0].email);
            $('select[name="statusedit"]').val(hasil[0].status).trigger('change');
            $('select[name="roleedit"]').val(hasil[0].role).trigger('change');
            $('input[name="user_idedit"]').val(hasil[0].user_id);
            $("#myModaledit").modal("show");
          }else{
            swal("Oops!", "Data not found!", "error");
          }
        }
      });
    }

    function deleteuser(user_id, image){
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
              url: '<?php echo base_url() ?>form/deleteuser',
              data: {user_id : user_id, image : image, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
              type: 'POST',
              datatype: "JSON",
              success: function (response) {
                var hasil = JSON.parse(response);
                if (hasil == "ok") {
                  $("#loading").hide();
                  swal("Gotcha!", "User Deleted Succesfully!", "success");
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
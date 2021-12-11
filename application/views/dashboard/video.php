<br>
<div class="row">
  <div class="col-xl-4 col-md-4 col-sm-4 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($totalvideo[0]['total'],0,",","."); ?><span class="new-box">Video</span></h4><span>Total Video</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 col-sm-4 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($aktif[0]['total'],0,",","."); ?><span class="new-box">Video</span></h4><span>Video Active</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 col-sm-4 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($nonaktif[0]['total'],0,",","."); ?><span class="new-box">Video</span></h4><span>Video Not Active</span>
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
              <h5>Videos</h5>
              <p class="font-roboto">Overview data video</p>
            </div>
            <div class="col-xl-12 p-0 left-btn a-right-bgt"><button type="button" class="btn btn-gradient a2-right-bgt" data-bs-toggle="modal" data-bs-target="#myModalnew">Add Video</button></div>
          </div>
        </div>
        <div class="col-lg-12 pb-3 pt-3">
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th>Title</th>
                <th class="text-center">Link</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)){
                foreach ($all as $dataall) { ?>
                  <tr>
                    <td><?php echo $dataall['title']; ?></td>
                    <td class="text-center"><a href="<?php echo $dataall['link']; ?>" target="_blank" class="btn btn-primary">Link Video</a></td>
                    <td class="text-center"><?php if($dataall['status'] == 'Tidak Aktif'){echo '<span class="badge badge-danger">Non Active</span>';}else{echo '<span class="badge badge-success">Active</span>';} ?></td>
                    <td class="d-flex pb-5 text-center">
                      <button type="button" class="btn btn-warning" onclick="findvideo('<?php echo $dataall["video_id"]; ?>')"><i class="fa fa-edit"></i></button>&nbsp;
                      <button type="button" class="btn btn-danger" onclick="deletevideo('<?php echo $dataall["video_id"]; ?>')"><i class="fa fa-times"></i></button>
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
        <form id="addvideo">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Video</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="titleadd" placeholder="Insert Title" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Link</label>
                  <input type="mail" name="linkadd" placeholder="https://youtube.com/" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" required="" name="statusadd">
                    <option value="Aktif">Active</option>
                    <option value="Tidak Aktif">Not Active</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="descriptionadd" id="descriptionadd" rows="10" cols="80" required="">Insert Description</textarea>
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
        <form id="editvideo">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Video</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row justify-content-center">
              <input type="hidden" name="video_idedit" value="" id="video_idedit">
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="titleedit" placeholder="Insert Title" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Link</label>
                  <input type="mail" name="linkedit" placeholder="https://youtube.com/" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" required="" name="statusedit">
                    <option value="Aktif">Active</option>
                    <option value="Tidak Aktif">Not Active</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="descriptionedit" id="descriptionedit" rows="10" cols="80" required="">Insert Description</textarea>
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
      $("#addvideo").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('title', $('input[name="titleadd"]').val());
        form.append('link', $('input[name="linkadd"]').val());
        form.append('description', $('textarea[name="descriptionadd"]').val());
        form.append('status', $('select[name="statusadd"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');

        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/addvideo',
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
              swal("Gotcha!", "Video Added Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });

      $("#editvideo").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('video_id', $('input[name="video_idedit"]').val());
        form.append('title', $('input[name="titleedit"]').val());
        form.append('link', $('input[name="linkedit"]').val());
        form.append('description', $('textarea[name="descriptionedit"]').val());
        form.append('status', $('select[name="statusedit"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');
        
        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/editvideo',
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
              swal("Gotcha!", "Video Updated Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });
    })

    function findvideo(video_id){
      $.ajax({
        url: '<?php echo base_url(); ?>form/findvideo',
        data: {video_id : video_id, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
        type: 'POST',
        datatype: "JSON",
        success: function (response) {
          if (response != "fail") {
            var hasil = JSON.parse(response);
            $('input[name="titleedit"]').val(hasil[0].title);
            $('input[name="linkedit"]').val(hasil[0].link);
            $('textarea[name="descriptionedit"]').val(hasil[0].description);
            $('select[name="statusedit"]').val(hasil[0].status).trigger('change');
            $('input[name="video_idedit"]').val(hasil[0].video_id);
            $("#myModaledit").modal("show");
          }else{
            swal("Oops!", "Data not found!", "error");
          }
        }
      });
    }

    function deletevideo(video_id, image){
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
              url: '<?php echo base_url() ?>form/deletevideo',
              data: {video_id : video_id, image : image, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
              type: 'POST',
              datatype: "JSON",
              success: function (response) {
                var hasil = JSON.parse(response);
                if (hasil == "ok") {
                  $("#loading").hide();
                  swal("Gotcha!", "Video Deleted Succesfully!", "success");
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
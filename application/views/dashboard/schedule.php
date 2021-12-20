<br>
<div class="row">
  <div class="col-xl-4 col-md-4 col-sm-4 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($total[0]['total'],0,",","."); ?><span class="new-box">Schedule</span></h4><span>Total Schedule</span>
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
            <h4><?php echo number_format($commingsoon[0]['total'],0,",","."); ?><span class="new-box">Schedule</span></h4><span>Comming Soon</span>
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
            <h4><?php echo number_format($missed[0]['total'],0,",","."); ?><span class="new-box">Schedule</span></h4><span>Ended</span>
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
            <div class="col-xl-10 p-0 left_side_earning">
              <h5>Schedules</h5>
              <p class="font-roboto">Overview data scedule</p>
            </div>
            <div class="col-xl-2 p-0 left-btn a-right-bgt"><button type="button" class="btn btn-gradient a2-right-bgt" data-bs-toggle="modal" data-bs-target="#myModalnew">Add Schedule</button></div>
          </div>
        </div>
        <div class="col-lg-12 pb-3 pt-3">
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th>Title</th>
                <th class="text-center">Date</th>
                <th class="text-center">Time Start</th>
                <th class="text-center">Time End</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)){
                foreach ($all as $data) { ?>
                  <tr>
                    <td><?php echo $data['title']; ?></td>
                    <td class="text-center"><?php echo date('d F Y', strtotime($data['schedule'])); ?></td>
                    <td class="text-center"><?php echo date('H:i:s', strtotime($data['time_first'])); ?></td>
                    <td class="text-center"><?php echo date('H:i:s', strtotime($data['time_end'])); ?></td>
                    <td class="d-flex pb-5 text-center">
                      <button type="button" class="btn btn-warning" onclick="findSchedule('<?php echo $data["calendar_id"]; ?>')"><i class="fa fa-edit"></i></button>&nbsp;
                      <button type="button" class="btn btn-danger" onclick="deleteSchedule('<?php echo $data["calendar_id"]; ?>', '<?php echo $data["file"]; ?>')"><i class="fa fa-times"></i></button>
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
        <form id="addschedule">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Schedule</h4>
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
                  <label>Link Url</label>
                  <input type="text" name="linkadd" placeholder="https://salmonation.io/" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="scheduleadd" value="<?php echo date('d-m-Y') ?>" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Time Start</label>
                  <input type="time" name="time_firstadd" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Time End</label>
                  <input type="time" name="time_endadd" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="imageadd" required="" class="form-control image-file" accept="image/png, image/gif, image/jpeg">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="descriptionadd" id="descriptionadd" rows="10" cols="80" required="">Insert Description</textarea>
                  <script>
                    CKEDITOR.replace( 'descriptionadd' );
                  </script>
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
        <form id="editschedule">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Schedule</h4>
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
              <input type="hidden" name="schedule_idedit" value="" id="schedule_id">
              <input type="hidden" name="hgambaredit" value="" id="hgambaredit">
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="titleedit" placeholder="Insert Title" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Link Url</label>
                  <input type="text" name="linkedit" placeholder="https://salmonation.io/" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="scheduleedit" value="<?php echo date('d-m-Y') ?>" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Time Start</label>
                  <input type="time" name="time_firstedit" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Time End</label>
                  <input type="time" name="time_endedit" required="" class="form-control">
                </div>
              </div>
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="imageedit" class="form-control image-file" accept="image/png, image/gif, image/jpeg">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="descriptionedit" id="descriptionedit" rows="10" cols="80" required="">Insert Description</textarea>
                  <script>
                    CKEDITOR.replace( 'descriptionedit' );
                  </script>
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
      $("#addschedule").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('file', $('input[name="imageadd"]')[0].files[0]);
        form.append('title', $('input[name="titleadd"]').val());
        form.append('description', CKEDITOR.instances.descriptionadd.getData());
        form.append('schedule', $('input[name="scheduleadd"]').val());
        form.append('time_first', $('input[name="time_firstadd"]').val());
        form.append('time_end', $('input[name="time_endadd"]').val());
        form.append('link', $('input[name="linkadd"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');

        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/addschedule',
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
              swal("Gotcha!", "Schedule Added Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });

      $("#editschedule").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('calendar_id', $('input[name="schedule_idedit"]').val());
        form.append('title', $('input[name="titleedit"]').val());
        form.append('description', CKEDITOR.instances.descriptionedit.getData());
        form.append('schedule', $('input[name="scheduleedit"]').val());
        form.append('time_first', $('input[name="time_firstedit"]').val());
        form.append('time_end', $('input[name="time_endedit"]').val());
        form.append('link', $('input[name="linkedit"]').val());
        form.append('<?php echo $csrf_name;?>', '<?php echo $csrf_hash;?>');
        if ($('input[name="imageedit"]').val() != "") {
          form.append('file', $('input[name="imageedit"]')[0].files[0]);
          form.append('hgambar', $('input[name="hgambaredit"]').val());
        }
        
        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/editschedule',
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
              swal("Gotcha!", "Schedule Updated Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });
    })

    function findSchedule(schedule_id){
      $.ajax({
        url: '<?php echo base_url(); ?>form/findschedule',
        data: {schedule_id : schedule_id, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
        type: 'POST',
        datatype: "JSON",
        success: function (response) {
          if (response != "fail") {
            var hasil = JSON.parse(response);
            $('input[name="titleedit"]').val(hasil[0].title);
            $('input[name="jobedit"]').val(hasil[0].job);
            $('input[name="scheduleedit"]').val(hasil[0].schedule);
            $('input[name="time_firstedit"]').val(hasil[0].time_first);
            $('input[name="time_endedit"]').val(hasil[0].time_end);
            $('input[name="linkedit"]').val(hasil[0].link);
            $('input[name="hgambaredit"]').val(hasil[0].file);
            $('input[name="schedule_idedit"]').val(hasil[0].calendar_id);
            CKEDITOR.instances.descriptionedit.setData(hasil[0].description);
            $('#imgmodal').attr('src', '<?php echo base_url(); ?>upload/calendar/' + hasil[0].file);
            $("#myModaledit").modal("show");
          }else{
            swal("Oops!", "Data not found!", "error");
          }
        }
      });
    }

    function deleteSchedule(schedule_id, image){
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
              url: '<?php echo base_url() ?>form/deleteschedule',
              data: {schedule_id : schedule_id, image : image, <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>'},
              type: 'POST',
              datatype: "JSON",
              success: function (response) {
                var hasil = JSON.parse(response);
                if (hasil == "ok") {
                  $("#loading").hide();
                  swal("Gotcha!", "Schedule Deleted Succesfully!", "success");
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
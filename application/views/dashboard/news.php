<br>
<div class="row">
  <div class="col-xl-4 col-md-4 col-sm-4 col-6 chart_data_right box-col-12">
    <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body right-chart-content">
            <h4><?php echo number_format($total[0]['total'],0,",","."); ?><span class="new-box">Blog</span></h4><span>Total Blog</span>
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
            <h4><?php echo number_format($aktif[0]['total'],0,",","."); ?><span class="new-box">Blog</span></h4><span>Blog Active</span>
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
            <h4><?php echo number_format($nonaktif[0]['total'],0,",","."); ?><span class="new-box">Blog</span></h4><span>Blog Not Active</span>
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
              <h5>Blog</h5>
              <p class="font-roboto">Overview data blog</p>
            </div>
            <div class="col-xl-12 p-0 left-btn a-right-bgt"><button type="button" class="btn btn-gradient a2-right-bgt" data-bs-toggle="modal" data-bs-target="#myModalnew">Add Blog</button></div>
          </div>
        </div>
        <div class="col-lg-12 pb-3 pt-3">
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th>Title</th>
                <th class="text-center">Status</th>
                <th class="text-center">Author</th>
                <th class="text-center">Publish</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)){
                foreach ($all as $datablog) { ?>
                  <tr>
                    <td><?php echo $datablog['title']; ?><br><a href="<?php echo base_url(); ?>news/d/<?php echo $datablog['slug']; ?>" target="_blank" class="text-primary"><i class="fa fa-share"></i>Url</a></td>
                    <td class="text-center"><?php if($datablog['status'] == 'Tidak Aktif'){echo '<span class="badge badge-danger">Not Active</span>';}else{echo '<span class="badge badge-success">Active</span>';} ?></td>
                    <td class="text-center"><?php echo $datablog['author']; ?></td>
                    <td class="text-center"><?php echo date('d F Y', strtotime($datablog['publish'])); ?></td>
                    <td class="d-flex pb-5 text-center">
                      <button type="button" class="btn btn-warning" onclick="findBlog('<?php echo $datablog["news_id"]; ?>')"><i class="fa fa-edit"></i></button>&nbsp;
                      <button type="button" class="btn btn-danger" onclick="deleteBlog('<?php echo $datablog["news_id"]; ?>', '<?php echo $datablog["file"]; ?>')"><i class="fa fa-times"></i></button>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form id="addblog">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Blog</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="titleadd" placeholder="Inset Title Blog" required="" class="form-control">
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
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Image Blog</label>
                  <input type="file" name="imageadd" required="" class="form-control image-file" accept="image/png, image/gif, image/jpeg">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Content</label>
                  <textarea name="contentadd" id="contentadd" rows="10" cols="80" required="">Insert Content Blog</textarea>
                  <script>
                    CKEDITOR.replace( 'contentadd' );
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form id="editblog">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" id="titlemodal"></h4>
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
              <input type="hidden" name="news_idedit" value="" id="news_id">
              <input type="hidden" name="hgambaredit" value="" id="hgambaredit">
              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="titleedit" placeholder="Inset Title Blog" required="" class="form-control">
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
              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label>Image Blog</label>
                  <input type="file" name="imageedit" class="form-control image-file" accept="image/png, image/gif, image/jpeg">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Content</label>
                  <textarea name="contentedit" id="contentedit" rows="10" cols="80" required="">Edit Content Blog</textarea>
                  <script>
                    CKEDITOR.replace( 'contentedit' );
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
      $("#addblog").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('file', $('input[name="imageadd"]')[0].files[0]);
        form.append('title', $('input[name="titleadd"]').val());
        form.append('description', CKEDITOR.instances.contentadd.getData());
        form.append('status', $('select[name="statusadd"]').val());

        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/addblog',
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
              swal("Gotcha!", "News Added Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });

      $("#editblog").submit(function(e){
        e.preventDefault();
        var form = new FormData();
        form.append('news_id', $('input[name="news_idedit"]').val());
        form.append('title', $('input[name="titleedit"]').val());
        form.append('description', CKEDITOR.instances.contentedit.getData());
        form.append('status', $('select[name="statusedit"]').val());
        if ($('input[name="imageedit"]').val() != "") {
          form.append('file', $('input[name="imageedit"]')[0].files[0]);
          form.append('hgambar', $('input[name="hgambaredit"]').val());
        }
        
        $("#loading").show();
        $.ajax({
          url: '<?php echo base_url(); ?>form/editblog',
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
              swal("Gotcha!", "News Updated Succesfully!", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              $("#loading").hide();
              swal("Oops!", result, "error");
            }
          }
        });
      });
    })

    function findBlog(blog_id){
      $.ajax({
        url: '<?php echo base_url(); ?>form/findblog',
        data: {news_id : blog_id},
        type: 'POST',
        datatype: "JSON",
        success: function (response) {
          if (response != "fail") {
            var hasil = JSON.parse(response);
            $('#titlemodal').text(hasil[0].title);
            $('input[name="titleedit"]').val(hasil[0].title);
            $('input[name="hgambaredit"]').val(hasil[0].file);
            $('input[name="news_idedit"]').val(hasil[0].news_id);
            if(hasil[0].status == 'Aktif'){
              $('select[name="statusedit"]').val('Aktif').trigger('change');
            }else{
              $('select[name="statusedit"]').val('Tidak Aktif').trigger('change');
            }
            $('#imgmodal').attr('src', '<?php echo base_url(); ?>upload/news/' + hasil[0].file);
            CKEDITOR.instances.contentedit.setData(hasil[0].description);
            $("#myModaledit").modal("show");
          }else{
            swal("Oops!", "Data not found!", "error");
          }
        }
      });
    }

    function deleteBlog(blog_id, image){
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
              url: '<?php echo base_url() ?>form/deleteblog',
              data: {blog_id : blog_id, image : image},
              type: 'POST',
              datatype: "JSON",
              success: function (response) {
                var hasil = JSON.parse(response);
                if (hasil == "ok") {
                  $("#loading").hide();
                  swal("Gotcha!", "News Deleted Succesfully!", "success");
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
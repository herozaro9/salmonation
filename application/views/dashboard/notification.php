<br>
<div class="col-xl-12 dashboard-sec box-col-12">
  <div class="card earning-card">
    <div class="card-body p-0">
      <div class="row m-0">
        <div class="col-xl-3 earning-content p-0">
          <div class="row m-0 chart-left pb-0">
            <div class="col-xl-12 p-0 left_side_earning">
              <h5>Notifications</h5>
              <p class="font-roboto">Overview all notification</p>
            </div>
          </div>
        </div>
        <div class="col-lg-12 pb-3 pt-3">
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th>Notification</th>
                <th class="text-center">Time</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)){
                foreach ($all as $dataall) { ?>
                  <tr>
                    <td><i class="fa fa-<?php echo $dataall['icon']; ?>"></i> <b><?php echo $dataall['author']; ?></b> <?php echo $dataall['notification']; ?></td>
                    <td class="text-center"><?php echo date('d F Y H:i:s', strtotime($dataall['time_notification'])); ?></td>
                  </tr>
                <?php } } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Bootstrap js-->
<script src="<?php echo base_url(); ?>assets/dashboard/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="<?php echo base_url(); ?>assets/dashboard/js/icons/feather-icon/feather.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="<?php echo base_url(); ?>assets/dashboard/js/scrollbar/simplebar.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="<?php echo base_url(); ?>assets/dashboard/js/config.js"></script>
<!-- Plugins JS start-->
<script src="<?php echo base_url(); ?>assets/dashboard/js/sidebar-menu.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/chart/chartist/chartist.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/chart/knob/knob.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/chart/knob/knob-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/chart/apex-chart/apex-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/chart/apex-chart/stock-prices.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/notify/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/dashboard/default.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/notify/index.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/datepicker/date-picker/datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/datepicker/date-picker/datepicker.custom.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?php echo base_url(); ?>assets/dashboard/js/script.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VD2BC0KPYG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VD2BC0KPYG');
</script>
<!-- Plugin used-->

<script type="text/javascript">
  $("document").ready(function(){
    if(localStorage.getItem('body-mode') == 'darkmode'){
      $("body").addClass('dark-only')
      $(".mode").addClass('darkmode')
      $('.mode i').addClass("fa-lightbulb-o")
      $('.mode i').removeClass("fa-moon-o")
    }else{
      $("body").removeClass('dark-only')
      $(".mode").addClass('lightmode')
      $('.mode i').removeClass("fa-lightbulb-o")
      $('.mode i').addClass("fa-moon-o")
    }

    $("#changepassword").submit(function(e){
      e.preventDefault();
      var passwordBaru = $("input[name='newpassword']").val();
      var passwordBaruConf = $("input[name='confirmationpassword']").val();
      var passwordLama = $("input[name='currectpassword']").val();

      if(passwordBaru == passwordBaruConf){
        if(passwordBaru.length <6){
          return swal('Notifikasi', 'Minimun password 6 character!', 'error');
        }
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url();?>Authorized/changePassword",
          data: {
            password: $("input[name='currectpassword']").val(),
            newpassword: $("input[name='newpassword']").val(),
          },
          success: function (response) {
            if (JSON.parse(response) == "ok") {
              swal("Gotcha!", "Success change password, please login again!", "success");
              setTimeout(function(){window.location.href = "<?php echo base_url();?>Authorized/logout"},1500);
            } else {
              swal("Oops!", JSON.parse(response), "error");
            }
          }
        });
      }else{
        return swal('Notification', 'New password and confirmation password not match!', 'error')
      }
    })
  })
  
  function logout(){
    swal({
      title: "Are you sure want to logout?",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = "<?php echo base_url();?>Authorized/logout";
      } else {
      }
    });
  }
</script>
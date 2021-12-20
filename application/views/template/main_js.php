<!-- DEFAULT-SCRIPT -->
<script src="<?php echo base_url(); ?>assets/lib/jquery/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/jquery-validation/jquery.validate.min.js"></script>
<!-- PLUGIN SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- IZZI TOAST -->
<script src="https://unpkg.com/izitoast/dist/js/iziToast.min.js"></script>
<!-- TEMPLATE SCRIPT -->
<script src="<?php echo base_url(); ?>assets/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sm-common.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VD2BC0KPYG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VD2BC0KPYG');
</script>
<script>
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://salmonation-io.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  var code;
  var code2;
  var code3;
  $(document).ready(function () {
    createCaptcha();
    createCaptcha2();
    createCaptcha3();

    $("#buttonfollowtwitter").click(function(){
      $("#twitterfollow").val('1')
    })

    $("#buttonfollowtele").click(function(){
      $("#telegramfollow").val('1')
    })
    $("#registration").submit(function (e) {
      e.preventDefault();
      if (document.getElementById("cpatchaTextBox").value == code) {
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url();?>registration/add",
          data: {
            name: $("input[name='fullname']").val(),
            mail: $("input[name='email']").val(),
            phone: $("input[name='phonenumber']").val(),
            telegram: $("input[name='telegram']").val(),
            project: $("select[name='project']").val(),
            description: $("textarea[name='description']").val(),
            <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>',
          },
          success: function (response) {
            if (JSON.parse(response) == 'ok') {
              swal("Gotcha!", "Form Registrasi Anda Berhasil Dikirim! Mohon Tunggu Feedback Kami Melalui Email Atau Whatsapp!", "success");
              createCaptcha();
              $("input[name='fullname']").val('');
              $("input[name='email']").val('');
              $("input[name='phonenumber']").val('');
              $("input[name='telegram']").val('');
              $("select[name='project']").val('');
              $("textarea[name='description']").val('');
              $("#cpatchaTextBox").val('');
            } else {
              swal("Oops!", "Form Registrasi Gagal Dikirim! Silahkan Coba Lagi!", "error");
              createCaptcha();
              $("#cpatchaTextBox").val('');
            }
          }
        });
      } else {
        swal("Oops!", "Captcha Salah, Silahkan Coba Lagi!", "error");
        createCaptcha();
        $("#cpatchaTextBox").val('');
      }
    });

    $("#jointeam").submit(function (e) {
      e.preventDefault();
      if (document.getElementById("cpatchaTextBox2").value == code2) {
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url();?>join-team/add",
          data: {
            name: $("input[name='fullname2']").val(),
            mail: $("input[name='email2']").val(),
            phone: $("input[name='phonenumber2']").val(),
            telegram: $("input[name='telegram2']").val(),
            project: $("select[name='project2']").val(),
            description: $("textarea[name='description2']").val(),
            <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>',
          },
          success: function (response) {
            if (JSON.parse(response) == 'ok') {
              swal("Gotcha!", "Form Registrasi Anda Berhasil Dikirim! Mohon Tunggu Feedback Kami Melalui Email Atau Whatsapp!", "success");
              createCaptcha2();
              $("input[name='fullname2']").val('');
              $("input[name='email2']").val('');
              $("input[name='phonenumber2']").val('');
              $("input[name='telegram2']").val('');
              $("select[name='project2']").val('');
              $("textarea[name='description2']").val('');
              $("#cpatchaTextBox2").val('');
            } else {
              swal("Oops!", "Form Registrasi Gagal Dikirim! Silahkan Coba Lagi!", "error");
              createCaptcha2();
              $("#cpatchaTextBox2").val('');
            }
          }
        });
      } else {
        swal("Oops!", "Captcha Salah, Silahkan Coba Lagi!", "error");
        createCaptcha2();
        $("#cpatchaTextBox2").val('');
      }
    });

    $("#joinwhitelist").submit(function (e) {
      e.preventDefault();

      if(!$("#twitterfollow").val()){
        return swal("Error!", "Follow twitter terlebih dahulu!", "error");
      }

      if(!$("#telegramfollow").val()){
        return swal("Error!", "Join telegram group terlebih dahulu!", "error");
      }

      if (document.getElementById("cpatchaTextBox3").value == code3) {
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url();?>join-whitelist/add",
          data: {
            fullname: $("input[name='fullnamejoin']").val(),
            twitter: $("input[name='twitterjoin']").val(),
            telegram: $("input[name='telegramjoin']").val(),
            email: $("input[name='emailjoin']").val(),
            bscaddress: $("input[name='bscaddressjoin']").val(),
            <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>',
          },
          success: function (response) {
            if (JSON.parse(response) == 'ok') {
              swal("Gotcha!", "Berhasil join whitelist SALMONATION!", "success");
              createCaptcha2();
              $("input[name='fullnamejoin']").val('');
              $("input[name='twitterjoin']").val('');
              $("input[name='telegramjoin']").val('');
              $("input[name='emailjoin']").val('');
              $("input[name='bscaddressjoin']").val('');
              $("input[name='twitterfollow']").val('');
              $("input[name='telegramfollow']").val('');
              $("#cpatchaTextBox3").val('');
              $("#modalwhitelist").modal('hide');
              createCaptcha3();
            } else {
              swal("Oops!", "Whitelist Gagal Dikirim! Silahkan Coba Lagi!", "error");
              createCaptcha3();
              $("#cpatchaTextBox3").val('');
            }
          }
        });
      } else {
        swal("Oops!", "Captcha Salah, Silahkan Coba Lagi!", "error");
        createCaptcha3();
        $("#cpatchaTextBox3").val('');
      }
    });
  });

  function createCaptcha() {
    document.getElementById('captcha').innerHTML = "";
    var charsArray =
    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {

      var index = Math.floor(Math.random() * charsArray.length + 1);
      if (captcha.indexOf(charsArray[index]) == -1)
        captcha.push(charsArray[index]);
      else i--;
    }
    var canv = document.createElement("canvas");
    canv.id = "captcha";
    canv.width = 100;
    canv.height = 50;
    var ctx = canv.getContext("2d");
    ctx.font = "25px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);

    code = captcha.join("");
    document.getElementById("captcha").appendChild(canv);
  }

  function createCaptcha2() {
    document.getElementById('captcha2').innerHTML = "";
    var charsArray =
    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {

      var index = Math.floor(Math.random() * charsArray.length + 1);
      if (captcha.indexOf(charsArray[index]) == -1)
        captcha.push(charsArray[index]);
      else i--;
    }
    var canv = document.createElement("canvas");
    canv.id = "captcha2";
    canv.width = 100;
    canv.height = 50;
    var ctx = canv.getContext("2d");
    ctx.font = "25px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);

    code2 = captcha.join("");
    document.getElementById("captcha2").appendChild(canv);
  }

  function createCaptcha3() {
    document.getElementById('captcha3').innerHTML = "";
    var charsArray =
    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {

      var index = Math.floor(Math.random() * charsArray.length + 1);
      if (captcha.indexOf(charsArray[index]) == -1)
        captcha.push(charsArray[index]);
      else i--;
    }
    var canv = document.createElement("canvas");
    canv.id = "captcha3";
    canv.width = 100;
    canv.height = 50;
    var ctx = canv.getContext("2d");
    ctx.font = "25px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);

    code3 = captcha.join("");
    document.getElementById("captcha3").appendChild(canv);
  }

  Highcharts.chart('containerchart', {
  chart: {
    backgroundColor: 'transparent',
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  colors: ['#f57c00', '#ffb74d'],
  title: false,
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  credits:false,
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: false
      },
      showInLegend: true
    }
  },
  legend:false,
  series: [{
    name: 'Total',
    colorByPoint: true,
    innerSize: '45%',
    data: [{
      name: 'Liquidity',
      y: 90,
      sliced: true,
      selected: true
    }, {
      name: 'Development',
      y: 10
    }]
  }]
});
</script>
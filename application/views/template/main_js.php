<!-- DEFAULT-SCRIPT -->
<script src="<?php echo base_url(); ?>assets/lib/jquery/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/jquery-validation/jquery.validate.min.js"></script>
<!-- PLUGIN SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<!-- IZZI TOAST -->
<script src="https://unpkg.com/izitoast/dist/js/iziToast.min.js"></script>
<!-- TEMPLATE SCRIPT -->
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
  $(document).ready(function () {
    createCaptcha();
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
            description: $("textarea[name='description']").val(),
            <?php echo $csrf_name;?>: '<?php echo $csrf_hash;?>',
          },
          success: function (response) {
            if (JSON.parse(response) == 'ok') {
              swal("Gotcha!", "Form Registrasi Anda Berhasil Dikirim! Mohon Tunggu Feedback Kami Melalui Email Atau No Telp!", "success");
              createCaptcha();
              $("input[name='fullname']").val('');
              $("input[name='email']").val('');
              $("input[name='phonenumber']").val('');
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
</script>
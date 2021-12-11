<div id="main-wrapper" class="main-wrapper">
  <!-- <div class="bg-section bg-cover bg-cc">
    <div class="overlay" style="background-color: rgba(0,0,0,0.35);"></div>
  </div> -->
  <div id="home-wrapper" class="flex-cc page-wrapper">
    <div class="inner-wrapper">
      <div class="intro-section intro-section-1 animated s0-8" data-animOut="fadeOut" data-animIn="fadeIn">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-12 order-md-1 order-sm-2 order-2">
              <div class="text-animation mb-2">
                <div class="hd-text">
                  <h2 class="main-text">SALMONATION</h2>
                  <p class="second-text">Jasa Konsultan dan Penasihat Tokenomic Crypto</p>
                  <p>Salmonation memberikan jasa konsultan dan penasihat kepada para pedagang / developer di Indonesia awalnya, untuk menciptakan sebuah keharmonisan tokenomic dalam sebuah project yang dijalankan guna mencapai keberhasilan project. Secara tidak langsung akan  menciptakan sebuah standarisasi tokenomic yang tepat untuk sebuah  project yang dijalankan.</p>
                </div>
              </div>
              <div class="navigation-wrp-1">
                <div class="inner-wrp">
                  <a href="https://t.me/salmonation" target="_blank" class="nav-link"><i class="fab fa-telegram-plane"></i></a>
                  <a href="https://t.me/salmonation" target="_blank" class="nav-link"><i class="fab fa-twitter"></i></a>
                  <a href="https://salmonchain.com/" target="_blank" class="nav-link"><i class="fas fa-layer-group"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 order-md-2 order-sm-1 order-1">
              <img src="<?php echo base_url(); ?>assets/images/raw-img.png" alt="" class="img-raw-right">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section id="presale">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="title-border-left-right-bottom">Presale</h3>
        <div class="header-title">
          PRESALE SALMONATION
        </div>
        <div id="countdown">
          <!-- <div class="clock_in"><span id="d">S</span>Days</div> -->
          <div class="clock_in"><span id="d">S</span></div>
          <div class="clock_in"><span id="h">O</span></div>
          <div class="clock_in"><span id="m">O</span></div>
          <div class="clock_in"><span id="s">N</span></div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="ama">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-sm-12 col-12 d-flex align-items-center">
        <img src="<?php echo base_url(); ?>assets/images/ama-salmonation.svg" alt="" class="img-raw-right">
      </div>
      <div class="col-lg-7 col-sm-12 col-12">
        <h3 class="title-border-left-right-bottom text-left">Ask Me Anything</h3>
        <div class="header-title text-left">
          AMA SALMONATION
        </div>
        <div class="amalist" id="amalist">
        <?php if(!empty($calendar)){ ?>
        <?php foreach($calendar as $calendar){ ?>
          <div class="ama" style="display: inline-block;">
            <div class="ama-wrapper">
              <div class="ama-img back-img" style="background-image: url('<?php echo base_url(); ?>upload/calendar/<?php echo $calendar['file']; ?>')"></div>
              <div class="ama-wrapper-text">
                <h3 class="h3-title"><?php echo date('d M Y', strtotime($calendar['schedule'])); ?></h3>
                <p><?php echo date('H:i', strtotime($calendar['time_first'])); ?> - <?php echo date('H:i', strtotime($calendar['time_end'])); ?></p>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#amamodal<?php echo $calendar['calendar_id']; ?>" title="View More"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        <?php } } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php if(!empty($team)){ ?>
<section id="team">
  <div class="container">
    <div class="row page-team-slider justify-content-center">
      <div class="col-lg-12">
        <h3 class="title-border-left-right-bottom">Our Team</h3>
        <div class="header-title">
          TEAM
        </div>
      </div>
      <?php foreach($team as $team){ ?>
      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="team-box">
          <div class="team-img-box">
            <div class="team-img back-img" style="background-image: url('<?php echo base_url(); ?>upload/team/<?php echo $team['file']; ?>');background-position: top center;background-size: cover;">
              <div class="team-social">
                <?php if(!empty($team['ln']) || $team['ln'] !== ""){ ?>
                <a href="<?php echo $team['ln']; ?>" target="_blank" title="Follow on Linkedin" tabindex="-1"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                <?php } ?>
                <?php if(!empty($team['fb']) || $team['fb'] !== ""){ ?>
                <a href="<?php echo $team['fb']; ?>" target="_blank" title="Follow on Facebook" tabindex="-1"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                <?php } ?>
                <?php if(!empty($team['ig']) || $team['ig'] !== ""){ ?>
                <a href="<?php echo $team['ig']; ?>" target="_blank" title="Follow on Instagram" tabindex="0"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                <?php } ?>
                <?php if(!empty($team['tw']) || $team['tw'] !== ""){ ?>
                <a href="<?php echo $team['tw']; ?>" target="_blank" title="Follow on Twitter" tabindex="0"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="team-text">
            <h3 class="h3-title"><?php echo $team['name']; ?></h3>
            <p><?php echo $team['job']; ?></p>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
<?php if(!empty($video)){ ?>
<section id="video">
  <div class="container">
    <div class="row page-team-slider justify-content-center">
      <div class="col-lg-12">
        <h3 class="title-border-left-right-bottom">Our Video</h3>
        <div class="header-title">
          VIDEO
        </div>
      </div>
      <div class="blog-list">
        <div class="row justify-content-center">
        <?php foreach($video as $video){ ?>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4 d-flex align-items-strecth">
            <div class="blog-box video-box">
              <div class="blog-img-box">
                <div class="blog-img back-img">
                  <iframe width="100%" height="250" src="<?php echo $video['link']; ?>" title="<?php echo $video['title']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
              <div class="blog-text video-text">
                <h3 class="h3-title"><a href="#" title="<?php echo $video['title']; ?>"><?php echo $video['title']; ?></a></h3>
                <p><?php echo $video['description']; ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php if(!empty($blog)){ ?>
<section id="blog">
  <div class="container">
    <div class="row page-team-slider justify-content-center">
      <div class="col-lg-12">
        <h3 class="title-border-left-right-bottom">New Blog</h3>
        <div class="header-title">
          BLOG
        </div>
      </div>
      <div class="blog-list">
        <div class="row justify-content-center">
        <?php foreach($blog as $blog){ ?>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4 d-flex align-items-strecth">
            <div class="blog-box">
              <div class="blog-img-box">
                <div class="blog-img back-img" style="background-image: url('upload/news/<?php echo $blog['file']; ?>');">
                </div>
                <div class="blog-date">
                  <a href="javascript:void(0);" title="</i><?php echo date('d M Y', strtotime($blog['publish'])); ?>"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo date('d M Y', strtotime($blog['publish'])); ?></a>
                  <a href="javascript:void(0);" title="</i><?php echo $blog['author']; ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo $blog['author']; ?></a>
                </div>
              </div>
              <div class="blog-text">
                <h3 class="h3-title"><a href="<?php echo base_url(); ?>blog/<?php echo $blog['slug']; ?>" title="<?php echo $blog['title']; ?>"><?php echo $blog['title']; ?></a></h3>
                <p><?php echo strip_tags(character_limiter($blog['description'], 250)); ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<section id="form">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <h3 class="title-border-left-right-bottom">form</h3>
        <div class="header-title">
          FORM REGISTRATION
        </div>
      </div>
      <div class="col-lg-7">
        <div class="card-transparent">
          <div class="subscribe-form subscribe-form-1" data-animout="fadeOutUp" data-animin="fadeInUp">
            <form id="registration">
              <div class="field-group">
                <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Full Name" required="">
              </div>
              <div class="field-group mt-3">
                <input class="form-control" type="email" name="email" id="email" placeholder="example@mail.com" required="">
              </div>
              <div class="field-group mt-3">
                <input class="form-control" type="number" name="phonenumber" id="phonenumber" placeholder="628xxxxxxx" required="">
              </div>
              <div class="field-group mt-3">
                <textarea class="form-control" rows="5" cols="40" name="description" id="description" placeholder="Description of Project" style="height:auto;" required=""></textarea>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-sm-6 col-12 mt-3">
                      <div id="captcha" class="captcha bg-white text-center"></div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12 mt-3">
                      <div class="form-group">
                          <input type="text" placeholder="Masukan Captcha" id="cpatchaTextBox" required="" class="form-control" />
                      </div>
                  </div>
              </div>
              <div class="msg-wrp"></div>
              <button type="submit" id="submit" class="btn btn-glass">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if(!empty($calendarmodal)){ ?>
  <?php foreach($calendarmodal as $calendarmodal){ ?>
 <!-- Modal -->

  <div class="modal fade" id="amamodal<?php echo $calendarmodal['calendar_id']; ?>">
    <div class="modal-dialog modal-dialog-centered modal-ama">
      <div class="modal-content">
        <div class="modal-body">
          <img src="<?php echo base_url(); ?>upload/calendar/<?php echo $calendarmodal['file']; ?>" class="img-fluid">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="p-3">
            <h4><?php echo $calendarmodal['title']; ?></h4>
            <div class="ama-time"><?php echo date('d M Y', strtotime($calendar['schedule'])); ?>, <?php echo date('H:i', strtotime($calendar['time_first'])); ?> - <?php echo date('H:i', strtotime($calendar['time_end'])); ?> GMT+7</div>
            <p><?php echo $calendarmodal['description']; ?></p>
            <div class="row">
              <!-- <div class="col-lg-6">
                <button type="button" class="btn-gradient-blue mt-2">Add To Google Calendar</button>
              </div> -->
              <div class="col-lg-12">
                <a href="<?php echo $calendarmodal['link']; ?>" target="_blank" class="btn-gradient-orange mt-2">Link AMA</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } } ?>
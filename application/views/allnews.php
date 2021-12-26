<section id="blog" class="section-hero-top">
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
          <?php foreach($data as $blog){ ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4 d-flex align-items-strecth">
              <div class="blog-box">
                <div class="blog-img-box">
                  <div class="blog-img back-img" style="background-image: url('<?php echo base_url(); ?>upload/news/<?php echo $blog['file']; ?>');">
                  </div>
                  <div class="blog-date">
                    <a href="javascript:void(0);" title="</i><?php echo date('d M Y', strtotime($blog['publish'])); ?>"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo date('d M Y', strtotime($blog['publish'])); ?></a>
                    <a href="javascript:void(0);" title="</i><?php echo $blog['author']; ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo $blog['author']; ?></a>
                  </div>
                </div>
                <div class="blog-text">
                  <h3 class="h3-title"><a href="<?php echo base_url(); ?>blog/d/<?php echo $blog['slug']; ?>" title="<?php echo $blog['title']; ?>"><?php echo $blog['title']; ?></a></h3>
                  <p><?php echo strip_tags(character_limiter($blog['description'], 250)); ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <?php echo $pagination; ?>
      </div>
    </div>
  </div>
</section>
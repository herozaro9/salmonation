<section class="blog-detail">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<img src="<?php echo base_url(); ?>upload/news/<?php echo $news['file'] ?>" alt="" class="img-blog">
				<h4 class="h4-blog"><?php echo $news['title'] ?></h4>
				<div class="detail-blog">
					<i class="fa fa-calendar" aria-hidden="true"></i><?php echo date('d M Y', strtotime($news['publish'])); ?> | <i class="fa fa-user" aria-hidden="true"></i><?php echo $news['author']; ?>
				</div>
				<p class="description"><?php echo $news['description']; ?></p>
				<div class="sharethis-inline-share-buttons mt-3 mb-2"></div>
				<div id="disqus_thread"></div>
			</div>
			<div class="col-lg-4">
				<h5 class="other-blog">Blog Lainnya</h5>
				<?php foreach($othernews as $othernews){ ?>
					<div class="recent-post-box">
						<div class="recent-post-img back-img" style="background-image:url('<?php echo base_url(); ?>upload/news/<?php echo $othernews['file'] ?>')"></div>
						<div class="recent-post-text">
							<h6><a href="<?php echo base_url(); ?>blog/d/<?php echo $othernews['slug'] ?>"><?php echo $othernews['title'] ?></a></h6>
							<p><?php echo strip_tags(character_limiter($othernews['description'], 40)); ?></p>
						</div>
					</div>
				<?php } ?>
				<div class='twitter-embed'>
				  	<a class="twitter-timeline" data-theme="dark" data-link-color="#981" href="https://twitter.com/thesalmonation">Tweets by AyRenay</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
			</div>
		</div>
	</div>
</section>
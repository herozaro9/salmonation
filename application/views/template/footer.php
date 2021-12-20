<div class="modal fade" id="modalwhitelist">
	<div class="modal-dialog modal-dialog-centered modal-ama">
		<div class="modal-content">
			<div class="modal-body">
				<img src="<?php echo base_url(); ?>assets/images/whitelist.png" class="img-fluid img-whitelist">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="p-3">
					<h4 class="pb-3">Join Whitelist Salmonation</h4>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<a id="buttonfollowtwitter" href="https://twitter.com/thesalmonation" target="_blank" class="btn-gradient-blue mb-3"><i class="fab fa-twitter"></i> Follow Twitter</a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<a id="buttonfollowtele" href="https://t.me/salmonation" target="_blank" class="btn-gradient-bluesoft mb-3"><i class="fab fa-telegram-plane"></i> Join Telegram</a>
						</div>
					</div>
					<form id="joinwhitelist">
						<input class="form-control" type="hidden" name="twitterfollow" id="twitterfollow" required="">
						<input class="form-control" type="hidden" name="telegramfollow" id="telegramfollow" required="">
						<div class="field-group mb-3">
							<input class="form-control" type="text" name="fullnamejoin" id="fullnamejoin" placeholder="Fullname" required="">
						</div>
						<div class="field-group mb-3">
							<input class="form-control" type="text" name="twitterjoin" id="twitterjoin" placeholder="Twitter Username" required="">
						</div>
						<div class="field-group mb-3">
							<input class="form-control" type="text" name="telegramjoin" id="telegramjoin" placeholder="Telegram Username" required="">
						</div>
						<div class="field-group mb-3">
							<input class="form-control" type="email" name="emailjoin" id="emailjoin" placeholder="example@mail.com" required="">
						</div>
						<div class="field-group mb-3">
							<input class="form-control" type="text" name="bscaddressjoin" id="bscaddressjoin" placeholder="BSC Address" required="">
						</div>
						<div class="row d-flex align-items-center">
							<div class="col-lg-6 col-sm-6 col-12 mb-3">
								<div id="captcha3" class="captcha bg-white text-center"></div>
							</div>
							<div class="col-lg-6 col-sm-6 col-12 mb-3">
								<div class="form-group">
									<input type="text" placeholder="Masukan Captcha" id="cpatchaTextBox3" required="" class="form-control" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<button type="submit"  class="btn-gradient-orange mt-2">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<footer>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6 col-sm-6 col-6 d-flex align-item-center ">
				<img src="<?php echo base_url(); ?>assets/images/salmon.svg" class="footer-icon">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-6 justify-content-end">
				<ul class="sosmed-footer">
					<li>
						<a href="#">Terms and conditions</a>
					</li>
					<li>
						<a href="#">Privacy Policy</a>
					</li>
					<li>
						<a href="#">Documentation</a>
					</li>
					<li>
						<a href="#">FAQ</a>
					</li>
					<li>
						<a href="#" class="pr-0">Audit</a>
					</li>
				</ul>
				<p class="copy-right">Salmonation © <?php echo date('Y') ?> - info@salmonation.io - All rights reserved</p>
			</div>
			<div class="col-lg-12">
				<p class="copy-right-media">Salmonation © <?php echo date('Y') ?> - info@salmonation.io - All rights reserved</p>
			</div>
		</div>
	</div>
</footer>
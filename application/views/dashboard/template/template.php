<!DOCTYPE html>
<html lang="en">
	<?php echo $page["css"]; ?>
	<body>
		<div class="loader-wrapper">
			<div class="loader-index"><span></span></div>
			<svg>
				<defs></defs>
				<filter id="goo">
					<fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
					<fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
				</filter>
			</svg>
		</div>
		<div class="tap-top"><i data-feather="chevrons-up"></i></div>
		<div class="page-wrapper compact-wrapper" id="pageWrapper">
			<?php echo $page["header"];?>
			<div class="page-body-wrapper">
				<?php echo $page["sidebar"];?>
				<div class="page-body">
					<?php echo $content; ?>
					<!-- The Modal -->
					<div class="modal fade" id="mymodalchangepassword">
					    <div class="modal-dialog modal-dialog-centered">
					        <div class="modal-content">
					            <!-- Modal Header -->
					            <div class="modal-header">
					                <h4 class="modal-title">Change My Password</h4>
					                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					            </div>
					            <form id="changepassword">
					                <!-- Modal body -->
					                <div class="modal-body">
					                    <div class="form-group mb-2">
					                        <label>Old Password</label>
					                        <input type="password" name="currectpassword" class="form-control" required="" placeholder="************">
					                    </div>
					                    <div class="row">
					                      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
					                         <div class="form-group">
					                            <label>New Password</label>
					                            <input type="password" name="newpassword" class="form-control" required="" placeholder="************">
					                        </div>
					                      </div>
					                      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
					                         <div class="form-group">
					                            <label>Confirmation Password</label>
					                            <input type="password" name="confirmationpassword" class="form-control" required="" placeholder="************">
					                        </div>
					                      </div>
					                    </div>
					                </div>
					                <!-- Modal footer -->
					                <div class="modal-footer modal-footer-uniform">
					                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					                    <button type="submit" class="btn btn-primary float-end">Save</button>
					                </div>
					            </form>
					        </div>
					    </div>
					</div>
				</div>
				<?php echo $page["footer"]; ?>
			</div>
		</div>
		<?php echo $page['js'];?>
	</body>
</html>
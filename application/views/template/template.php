<!DOCTYPE html>
<html>
<?php echo $page["css"]; ?>
	<body>
		<div class="page-loader-wrapper page-loader-wrapper-3 flex-cc">
			<div class="loader">
				<div class="spinner">
					<div class="circle1"></div>
					<div class="circle2"></div>
				</div>
			</div>
		</div>
		<?php echo $page["header"];?>
		<?php echo $content; ?>
		<?php echo $page["footer"]; ?>
		<?php echo $page['js'];?>
	</body>
</html>
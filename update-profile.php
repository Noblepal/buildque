<?php include('./includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php include('./includes/head.php');?>
	<body>
		<?php include('./includes/preloader.php');?>

		<?php include('./includes/header.php');?>

  <!-- Intro Section -->
 <!-- <section class="inner-intro bg-img light-color overlay-before parallax-background">
    <div class="container">
      <div class="row title">
      	<div class="title_row">
      		<h1 data-title="Blank"><span>Blank</span></h1>
      		<div class="page-breadcrumb">
							<a>Home</a>/ <span>Blank</span>
						</div>

      	</div>

      </div>
    </div>
  </section> -->
 <!-- Intro Section End-->

  <!-- CONTENT -->

  <div class="faq padding pt-xs-40 mt-5">
  <div class="container"> <h3>Update Profile <small  class="ml-3">Kindly enter all your information below</small></h3>
		<?php
			if (isset($_GET['success'])) {
				$success = $_GET['success'];
				if ($success == 1) {
					?>
						<div class="alert alert-success">
							<?php echo $_GET['message']; ?>
						</div>
					<?php
				} else if ($success == 0) {
					?>
						<div class="alert alert-danger">
							<?php echo $_GET['message']; ?>
						</div>
					<?php
				}
			}
		?>
		<div id="login" class="page-signin">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					<div class="main-body">
						<div class="body-inner">
							<div class="card bg-white">
								<div class="card-content">
									<section class="logo text-center">
										<h2>Contractor Profile</h2>
									</section>
									<form method="post">
										<fieldset>
											 <div class="form-group">
												<div class="ui-input-group">
													<select class="form-control" name="service" required>
														<option value="" selected disabled>Select Service Type</option>
														<?php echo getServices(); ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<div class="ui-input-group">
													<select class="form-control" name="location">
														<option value="" selected disabled>Select Your Location</option>
														<?php echo getLocations(); ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<div class="ui-input-group">
													<input name="identity_no" type="number" required class="form-control">
													<span class="input-bar"></span>
													<label>ID Number</label>
												</div>
											</div>

											<div class="form-group">
												<div class="ui-input-group">
													<input name="phonenumber" type="phone" required class="form-control">
													<span class="input-bar"></span>
													<label>Phone Number</label>
												</div>
											</div>

											<div class="form-group">
												<div class="ui-input-group">
													<textarea id="info" name="brief_info" rows="8" cols="80" class="form-control" placeholder="Brief information about yourself"></textarea>
													<span class="input-bar"></span>
												</div>
											</div>

											<div class="spacer"></div>
											<div class="form-group checkbox-field">
												<label for="check_box" class="text-small">
													<input type="checkbox" id="check_box" required>
													<span class="ion-ios-checkmark-empty22 custom-check"></span> By clicking on sign up, you agree to <a href="javascript:;"><i>terms</i></a> and <a href="javascript:;"><i>privacy policy</i></a></label>
											</div>
										</fieldset>
										<input type="submit" name="updateContractor" value="Update Profile" class="card-action no-border text-right">
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
  </div>

  </div>


			<?php include('./includes/footer.php');?>


			<script>
				var x = document.getElementById("location");
				function getLocation() {
				  if (navigator.geolocation) {
				    navigator.geolocation.getCurrentPosition(showPosition);
				  } else {
				    console.log("Geolocation is not supported by this browser.");
				  }
				}

				function showPosition(position) {
					console.log("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);
				}

				function showError(error) {
					switch(error.code) {
						case error.PERMISSION_DENIED:
							console.log("User denied the request for Geolocation.");
							break;
						case error.POSITION_UNAVAILABLE:
							console.log("Location information is unavailable.");
							break;
						case error.TIMEOUT:
							console.log("The request to get user location timed out.");
							break;
						case error.UNKNOWN_ERROR:
							console.log("An unknown error occurred.");
							break;
					}
				}

			</script>

			<?php include('./includes/scripts.php');?>

	</body>

<!-- blank17:44 GMT -->
</html>

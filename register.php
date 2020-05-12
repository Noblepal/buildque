<!DOCTYPE html>
<html lang="en">

<?php
include('./includes/functions.php');
include('./includes/head.php');?>
	<body>
		<?php include('./includes/preloader.php');?>

		<?php include('./includes/header.php');
		session_start();?>

		<!-- Intro Section -->
 <section class="inner-intro bg-img light-color overlay-before parallax-background">
    <div class="container">
      <div class="row title">
      	<div class="title_row">
      		<h1 data-title="Register"><span>Register</span></h1>
      		<div class="page-breadcrumb">
							<a>Home</a>/ <span>Register</span>
						</div>

      	</div>

      </div>
    </div>
  </section>
 <!-- Intro Section End-->

  <!-- Login Section -->
  <div id="login" class="ptb ptb-xs-40 page-signin">
    <div class="container">
      <div class="row">
      	<div class="col-sm-12">
        <div class="main-body">
          <div class="body-inner">
            <div class="card bg-white">
              <div class="card-content">
                <section class="logo text-center">
                  <h2>Register</h2>
                </section>
                <form method="post" class="form-horizontal ng-pristine ng-valid">
                  <fieldset>
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input name="fname" type="text" required class="form-control">
                        <span class="input-bar"></span>
                        <label>First Name</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="ui-input-group">
                        <input name="lname" type="text" required class="form-control">
                        <span class="input-bar"></span>
                        <label>Last Name</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="ui-input-group">
                        <input name="email" type="text" required class="form-control">
                        <span class="input-bar"></span>
                        <label>Email Address</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="ui-input-group">
                        <input name="password" type="password"  required class="form-control">
                        <span class="input-bar"></span>
                        <label>Password</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="ui-input-group">
                        <input name="confirmpassword" type="password" required  class="form-control">
                        <span class="input-bar"></span>
                        <label>Please confirm your password </label>
                      </div>
                    </div>

										<div class="form-group">
											<div class="ui-input-group">
												<select class="form-control" name="isContractor" required>
													<option value="yes" selected>I am a contractor</option>
													<option value="no" selected>I am a client</option>
												</select>
											</div>
										</div>


										<div class="spacer"></div>
										<div class="form-group checkbox-field">
											<label for="check_box" class="text-small">
												<input type="checkbox" id="check_box" required>
												<span class="ion-ios-checkmark-empty22 custom-check"></span> By clicking on sign up, you agree to <a href="javascript:;"><i>terms</i></a> and <a href="javascript:;"><i>privacy policy</i></a></label>
										</div>

                  </fieldset>
                  <input type="submit" name="registerUser" value="Register" class="card-action no-border text-right">
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <!-- End Login Section -->



 <?php include('./includes/footer.php');?>
<?php include('./includes/scripts.php');?>

	</body>

<!-- register17:43 GMT -->
</html>

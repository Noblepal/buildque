<?php session_start();?>
		<header id="header" class="header">

			<div class="nav-wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="logo">
								<h2 class="text-light"><a href="index.php">ContractorsEE</a></h2>
							</div>
							<!-- Phone Menu button -->
							<button id="menu" class="menu hidden-md-up"></button>
						</div>
						<div class="col-md-9 nav-bg d-flex align-items-center">
							<nav class="navigation">
								<ul>
									<li>
										<a href="index.php">Home</a>
									</li>

										<?php
											if(!isset($_SESSION['identity_no'])){
											?>
											<li>
												<a href="login.php">login</a>
											</li>
											<li>
												<a href="register.php">Register</a>
											</li>
											<?php
											} else {
												?>
												<li>
													<a><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'];?></a>
												</li>
												<li>
													<a href="logout.php">Logout</a>
												</li>
												<?php
											}
										?>
										

								</ul>

							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--Header End
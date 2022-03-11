<div class="container pt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark" style="border-radius: 1rem;">
				<div class="card-body px-5 py-2 text-center">
					<p class="fw-bold fs-4 mb-3 text-uppercase text-white">Login</p>
					<p class="mb-3 text-secondary" id="error-message">Please enter your login and password!</p>

					<form class="text-start" id="login-form">
						<div class="mb-3 px-3">
							<input type="email" class="form-control" id="login-email"
								placeholder="Email address" required> 
						</div>

						<div class="mb-2 px-3">
							<input type="password" class="form-control" id="login-password"
								placeholder="Password" required>
						</div>

						<p class="small mb-3 px-3 pb-lg-2 text-end"><a class="text-secondary" href="#!">Forgot password?</a></p>

						<div class="mt-4 text-center">
							<button class="btn btn-outline-light w-50">Login</button>
						</div>
                          
					</form>

					<div>
						<p class="mt-5 mb-2 text-white">Don't have an account?
							<a href="<?php echo base_url() ?>/register" class="text-secondary">Register</a>
						</p>
					</div>
				</div>
			</div>
		</div>
    </div>
 </div>

<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>Login</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link href="<?= ($BASE) ?>/ui/backend/assets/css/pages/login/classic/login-3.css" rel="stylesheet" type="text/css" />
		<?php echo $this->render('backend/inc/header.html',NULL,get_defined_vars(),0); ?>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(<?= ($BASE) ?>/ui/backend/assets/media/bg/bg-1.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="<?= ($BASE) ?>/uploads/logo/logo.png" class="max-h-100px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin" id="app">
							<div class="mb-20">
								<h3>Sign In To Admin</h3>
								<p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>
							</div>
							<form class="form" id="login-form">
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="Email" name="email" autocomplete="off" v-model="email" v-on:keyup.enter="doEnter"/>
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Password" name="password" v-model="password" v-on:keyup.enter="doEnter"/>
								</div>
								<div class="form-group text-center mt-10">
									<button type="button" id="login" v-on:click="login"class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 btn-submit">Sign In</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign in form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<?php echo $this->render('backend/inc/script.html',NULL,get_defined_vars(),0); ?>
		<script src="<?= ($BASE) ?>/ui/backend/assets/js/login-general.js"></script>
		<script type="text/javascript">
			new Vue({
			  el:'#app',
			  data:{
				baseUrl:'<?= ($BASE) ?>/',
				email:'',
				password:'',
			  },
			  methods:{
				login:function() {
				  if(this.email != '' && this.password != '') {
					$("button.btn-submit").prop('disabled', true);
					$('button.btn-submit').css('cursor','not-allowed');
					$('button.btn-submit i.fa').addClass( "fa-refresh fa-spin" );
					axios.post(this.baseUrl+'login',$('#login-form').serialize()/*, {headers: {'Content-Type': 'multipart/form-data'}}*/)
					.then(response => {
					  var data = response.data;
					  if(data.success == true){
						window.location.href = this.baseUrl;
					  } else {
						Swal.fire("Error!", data.message, "error");
						$('button.btn-submit i.fa').removeClass( "fa-refresh fa-spin" );
						$('button.btn-submit').removeAttr('style');
						$("button.btn-submit").prop('disabled', false);
					  }
					})
				  }
				},
				doEnter: function(e) {
				  if (e.keyCode === 13) {
					this.login();
				  }
				},
			  }
			})
		  </script>
	</body>
	<!--end::Body-->
</html>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/corona/jquery/template/modern-vertical/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2019 10:47:35 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tektik Admin Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/modern-vertical/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="POST" action="{{ route('admin_save_register') }}">
                  @csrf
                  <div class="form-group @error('fullname') has-danger @enderror">
                    <label>Full Name</label>
                    <input name="fullname" type="text" class="form-control p_input @error('fullname') form-control-danger @enderror">
                    @error('fullname')
                      <label class="error mt-2 text-danger">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('username') has-danger @enderror">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control p_input @error('username') form-control-danger @enderror">
                    @error('username')
                      <label class="error mt-2 text-danger">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('email') has-danger @enderror">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control p_input @error('email') form-control-danger @enderror">
                    @error('email')
                      <label class="error mt-2 text-danger">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('password') has-danger @enderror">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control p_input @error('password') form-control-danger @enderror">
                    @error('password')
                      <label class="error mt-2 text-danger">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col mr-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="{{ route('admin_login') }}"> Sign In</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin_assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin_assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin_assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin_assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin_assets/js/todolist.js') }}"></script>
    <!-- endinject -->
  </body>

<!-- Mirrored from www.bootstrapdash.com/demo/corona/jquery/template/modern-vertical/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2019 10:47:35 GMT -->
</html>
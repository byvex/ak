<x-guest-layout>
      <!-- <div class="d-flex col-12 align-items-center authentication-bg p-sm-12 p-6"> -->
        <div class="d-flex col-12 align-items-center authentication-bg p-sm-12 p-6 authentication-wrapper authentication-basic container-p-y" 
     >

        <div class="w-px-400 mx-auto mt-12 pt-5">
          <!-- Login -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-6">
                <div class="app-brand-link">
                  <span class="app-brand-logo demo">
                    <span class="text-primary">
                    </span>
                  </span>
                  <span class="app-brand-text demo text-heading fw-bold">INTERIOR DESIGN</span>
                </div>
              </div>
              <!-- /Logo -->
               <div class="app-brand justify-content-center mb-4">
              <h5 class="mb-1">Welcome to Login Page 👋</h5>
              </div>
@if($errors->any())
        <div class="app-brand justify-content-center" style="color:red;">
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
              <form id="formAuthentication" method="POST" action="{{ route('admin.login.submit') }}" class="mb-4">
                @csrf
                <div class="mb-6 form-control-validation">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email" />
                </div>
                <div class="mb-6 form-password-toggle form-control-validation">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"></span>
                    <!-- <i class="icon-base ti tabler-eye-off"></i> -->
                  </div>
                </div>
                <div class="my-8">
                  <div class="d-flex justify-content-between">
                    <div class="form-check mb-0 ms-2">
                      <input class="form-check-input" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                    <!-- <a href="#">
                      <p class="mb-0">Forgot Password?</p>
                    </a> -->
                  </div>
                </div>
                <div class="mb-6">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>  
            </div>
          </div>
          <!-- /Login -->
        </div>
      </div>
</x-guest-layout>


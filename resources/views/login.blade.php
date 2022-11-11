<x-main>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
          <form method="POST" action=""{{route('loginn') }}">
          @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input name = "email" type="email" id="loginName" class="form-control" value="{{old('email')}}" required autocomplete="email" autofocus>
              <label class="form-label" for="loginName">Email</label>
              @error('email')
              <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
          @enderror
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input name = "password" type="password" id="loginPassword" class="form-control" value="{{old('password')}}" required autocomplete="current-password">
              <label class="form-label" for="loginPassword">{{__('Password')}}</label>
              @error('password')
              <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
          @enderror
            </div>
            <!-- 2 column grid layout -->
            <div class="row mb-4">
              <div class="col-md-6 d-flex justify-content-left">
                <!-- Checkbox -->
                <div class="form-check mb-3 mb-md-0">
                  <input name="remember_me"class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                  <label class="form-check-label" for="loginCheck"> {{__('Remember me')}} </label>
                </div>
              </div>
              <div class="col-md-6 d-flex justify-content-right">
                <!-- Simple link -->

              </div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-3">{{__("Sign in")}}</button>
            <!-- Register buttons -->
            <div class="text-left">
              <p>{{__("Not a member?")}}<a href="{{route('register')}}">{{__("Register")}}</a></p>
            </div>
          </form>
        </div>
      </div>
    </x-main>

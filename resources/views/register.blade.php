<div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    <form  method="POST" action="{{route('registerr')}}">
     @csrf

     <!-- Name input -->

     <div class="form-outline mb-3 ">
       <input name= "name"  type="text" id="registerName" class="form-control" value="{{old('name')}}" required >
       <label class="form-label" for="registerName" >{{__("Name")}}</label>
       @error('name')
       <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
   @enderror
     </div>

     <!-- Role input -->
     <div class="form-outline mb-3">
       <input  name= "role"  type="text" id="registerUsername" class="form-control" value="{{old('username')}}" required>
       <label class="form-label" for="registerUsername">{{__("Role")}}</label>
     
     </div>

     <!-- Email input -->
     <div class="form-outline mb-3">
       <input  name="email"type="email" id="registerEmail" class="form-control" value="{{old('email')}}" required >
       <label class="form-label" for="registerEmail">Email</label>
       @error('email')
       <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
   @enderror
     </div>

     <!-- Password input -->
     <div class="form-outline mb-3">
       <input  name="password"  type="password" id="registerPassword" class="form-control" value="{{old('password')}}"required >
       <label class="form-label" for="registerPassword">{{__("Password")}}</label>
       @error('password')
       <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
   @enderror
     </div>
  <!-- Password input -->
  <div class="form-outline mb-3">
    <input  name="password_confirmation"  type="password" id="registerPassword" class="form-control" value="{{old('password')}}"required >
    <label class="form-label" for="registerPassword">{{__("Password")}}</label>
    @error('password_confirmation')
    <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
@enderror
  </div>

     <!-- Submit button -->
     <button type="submit" class="btn btn-primary btn-block mb-2">{{__("Sign up")}}</button>

     @if($errors->any())
       <ul>
         @foreach ($errors->all() as $error)
           <li class="text-red-500 text-xs mt-1">{{$error}}</li>
          @endforeach
      </ul>
     @endif


   </form>
 </div>
</div>
<div class="text-center ">
</div>
 </div>
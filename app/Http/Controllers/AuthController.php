<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function index(Request $request)
    {
      //create user  \Illuminate\Support\Facades\Artisan::call('user:create --count=1');
    //return Cache::remember('user', 60*60*24*24, function () {
       $users=  User::with('roles')->get();
     //  });
         return view("welcome", compact('users'));
    }

    public function showlogin()
    {
        return view('login');
    }

    public function showregister()
    {
        return view('register');
    }



    public function login(Request $request)
    {
       $fields = $request->validate([
            'email' => 'required|string|exists:users,email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        $token = $user->createToken('myappToken')->plainTextToken;

        $response = [
            'token' => $token,
            'user' => $user

        ];

        if(Auth()->attempt($fields))
        {
            session()->regenerate();
            return redirect()->route('index');
        }

       // return response($response, 201);
    }



    public function register(Request $request)
    {
        try{
       $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'role'  => 'required|string'

        ]);

       $user = User::create([
                    'name' => $fields['name'],
                    'email' => $fields['email'],
                    'password' => bcrypt($fields['password']),
                ]);

        $token = $user->createToken('myappToken')->plainTextToken;

        $user->syncRoles($request->role);

        $response = [
            'user' => $user,
            'token' => $token
        ];
        Auth()->login($user);
       return redirect()->route('index');
        //return response($response, 201);
    }
    catch(\Spatie\Permission\Exceptions\RoleDoesNotExist $e){
        $user = User::where('id', $user->id)->firstorfail()->delete();
        return response()->error(["You can select just Super-Admin, Admin, Standard-User"], 401);

    }
    }


    public function logout(Request $request){
        Auth()->logout();
        //$delete = auth()->user()->tokens()->delete();
       //if($delete){

            return redirect()->route('show');
      //  }

    }

    public function update(Request $request)
    {

        $user = User::where('email', $request->email)->firstOrFail();
    try{
        $fields = $request->validate( [
            'name' => 'required',
            'email' => ['required',Rule::unique('users')->ignore($user->id),],
            'old_password' => 'required'
        ]);


        if(!Hash::check($fields['old_password'], $user->password)){

            return response()->error(["Your password incorrect"], 401);
        }else{

           $update = $user->syncRoles($request->role);
            if($update){
                $user->update([
                'name' => $request->name,
                'email'=> $request->email
            ]);
            return $user;
            }
    }
    }
        catch(\Spatie\Permission\Exceptions\RoleDoesNotExist $e){
            return response()->error(["You can select just Super-Admin, Admin, Standard-User"], 401);

        }

    }

}

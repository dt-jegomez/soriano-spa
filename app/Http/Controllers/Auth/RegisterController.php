<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\InteresController as interes;
// use App\Interes;
use DB;
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function registered(Request $request, User $user)
    {
        if ($user instanceof MustVerifyEmail) {
            return response()->json(['status' => trans('verification.sent')]);
        }

        return response()->json($user);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_completo' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'rol_id' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        return DB::transaction(function () use ($data) {
            
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            
            if (count($data['intereses'])>0) {
                $controller = new interes;
                $controller->store($data['intereses'],$user);
                
                // $collection = collect($data['intereses'])->map(function($value) use ($user){
                //     return ['tag' => $value, 'user_id' => $user->id];
                // })->toArray();
                // $a = Interes::insert($collection);
                // dd($a);
            }
            return $user;
            
        });
    }
}

<?php

namespace App\Http\Controllers;

use App\Interes;
use Illuminate\Http\Request;
use DB;
class InteresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Interes::all();
    }


    public function store($data,$user)
    {
        try {
                $collection = collect($data)->map(function($value) use ($user){
                    return ['tag' => $value, 'user_id' => $user->id];
                })->toArray();

                Interes::insert($collection);
                  
                return response([ 'mensaje' => 'registro exitoso'], 201);

        } catch (\Throwable $th) {
            return $th;
        }
    }

    
}

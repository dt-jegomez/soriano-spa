<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;
use DB;
class RolController extends Controller
{
    
    public function index()
    {
        return Rol::select('id','nombre')->get();
    }

  

 
    public function store(Request $request)
    {
        try {
            return DB::transaction(function()use($request){
                Rol::create($request->all());
                return response(['mensaje'=>'registro exitoso'],201);
            });
        } catch (\Throwable $th) {
            return $th;
        }
    }



    public function update(Request $request, $id)
    {
        try {
            return DB::transaction(function () use ($request,$id) {
                Rol::whereId($id)->update($request->all());
                return response(['mensaje' => 'registro exitoso'], 201);
            });
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {
            Rol::whereId($id)->delete();
            return response(['mensaje' => 'registro exitoso'], 201);
        });

    }
}

<?php

namespace App\Http\Controllers;

use App\Disco;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DiscoController extends Controller
{

   
    
   
    public function index()
    {
        return Disco::select( 'id','nombre', 'album', 'artista', 'genero', 'anio', 'foto')->get();
    }

   

    
    public function store(Request $request)
    {
        try {
            return DB::transaction(function()use($request){
                $request['anio'] = Carbon::parse($request['anio'])->toDateString() ;
                Disco::create($request->all());
                return response(['mensaje'=>'registro exitoso'],201);
            });
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function update(Request $request, $id)
    {
        Disco::whereId($id)->update($request->all());
        return response(['mensaje' => 'registro exitoso'], 200);

    }


    public function destroy($id)
    {
        Disco::whereId($id)->delete();
        return response(['mensaje' => 'eliminado exitoso'], 200);
    }

    public function listInteres()
    {
        $model = new Disco();
        return $model->listInteres();
    }


}

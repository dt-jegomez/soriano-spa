<?php

namespace App\Http\Controllers;

use App\Disco;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DiscoController extends Controller
{

   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Disco::select( 'id','nombre', 'album', 'artista', 'genero', 'anio', 'foto')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function show(Disco $disco)
    {
        return Disco::all();
    }

    public function listInteres()
    {
        $model = new Disco();
        return $model->listInteres();
    }


}

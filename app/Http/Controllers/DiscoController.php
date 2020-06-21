<?php

namespace App\Http\Controllers;

use App\Disco;
use Illuminate\Http\Request;

class DiscoController extends Controller
{

   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

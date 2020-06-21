<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    /**
     * Get authenticated user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request)
    {
        return response()->json($request->user());
    }

    public function store(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                return $request->all();
                // return response(['mensaje' => 'registro exitoso'], 201);
            });
        } catch (\Throwable $th) {
            return $th;
        }
    }
}

<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $request['nombre_completo']  =  $request['nombre'];
        return tap($user)->update($request->only('nombre_completo', 'email'));
    }
}

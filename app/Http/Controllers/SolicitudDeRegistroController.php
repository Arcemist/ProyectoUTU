<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SolicitudDeRegistro;
use Illuminate\Http\Request;
use Response;

class SolicitudDeRegistroController extends Controller
{
    /**
     * Acepta la solicitud.
     */
    public function update(Request $request): void
    {
        $id = $request->id;

        $solicitud = SolicitudDeRegistro::findOrFail($id);

        User::create([
            'name' => $solicitud->name,
            'email' => $solicitud->email,
            'password' => $solicitud->password,
            'user_type' => $solicitud->user_type,
        ]);

        $solicitud->delete();

    }

    /**
     * Rechaza la solicitud.
     */
    public function destroy(Request $request): void
    {
        $id = $request->id;

        SolicitudDeRegistro::findOrFail($id)->delete();
    }
}

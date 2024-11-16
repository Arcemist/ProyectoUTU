<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\arreglos;
use App\Models\documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PowerDeleteProfileController extends Controller
{
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): void
    {
        $userID = $request->id;

        documentos::where('Subido_por', '=', $userID)->delete();
        arreglos::where('Creado_por', '=', $userID)->delete();
        arreglos::where('Empresa_encargada', '=', $userID)->delete();

        User::findOrFail($userID)->delete();
    }
}

<?php

namespace App\Http\Controllers\Api\BD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControladorPerfil extends Controller
{
    public function guardarFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:5120', // 5MB
        ]);

        /** @var \App\Models\Usuario $usuario */
        $usuario = Auth::user();
        
        if (!$usuario) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        // Leer el contenido de la imagen
        $archivo = file_get_contents($request->file('foto')->getRealPath());

        // Guardar en BLOB
        $usuario->fotoPerfil = $archivo;
        $usuario->save(); //

        return response()->json(['message' => 'Foto de perfil actualizada']);
    }

    // Obtener foto de perfil
    public function obtenerFoto()
    {
        $usuario = Auth::user();

        if (!$usuario || !$usuario->fotoPerfil) {
            return response()->json(['message' => 'No hay foto'], 404);
        }

        return response($usuario->fotoPerfil)
            ->header('Content-Type', 'image/jpeg'); // ajusta según tipo
    }
}

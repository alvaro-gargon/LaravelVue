<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [1,2,3];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$data = $request->all(); recoge todo lo que se le pase
        $data = $request->only('title','body');
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'mensaje'=>'Funcioooonoo',
            'data'=>[
                'id' => $id,
                'title' => 'prueba',
                'body' => 'Post body'
            ]
        ],201)
        ->header('Test','Zulu')
        ->header('Test2','Zebra')
        //->setStatusCode(201)
        ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

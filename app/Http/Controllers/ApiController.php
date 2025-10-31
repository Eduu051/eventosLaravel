<?php

namespace App\Http\Controllers;

use App\Models\Esdeveniment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Llista esdeveniments',
            'esdeveniments' => Esdeveniment::all(),
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Esdeveniment::create($request->all());
        return response()->json([
            'message' => 'Esdeveniment creat correctament',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $esdeveniment = Esdeveniment::find($id);
        if (!$esdeveniment) {
            return response()->json([
                'message' => 'Esdeveniment no trobat',
            ], 404);
        }
        return response()->json([
            'esdeveniment' => $esdeveniment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $esdeveniment = Esdeveniment::find($id);
        if (!$esdeveniment) {
            return response()->json([
                'message' => 'Esdeveniment no trobat',
            ], 404);
        }
        $esdeveniment->update($request->all());
        return response()->json([
            'message' => 'Esdeveniment actualitzat correctament',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $esdeveniment = Esdeveniment::find($id);
        if (!$esdeveniment) {
            return response()->json([
                'message' => 'Esdeveniment no trobat',
            ], 404);
        }
        $esdeveniment->delete();
        return response()->json([
            'message' => 'Esdeveniment eliminat correctament',
        ]);
    }
}

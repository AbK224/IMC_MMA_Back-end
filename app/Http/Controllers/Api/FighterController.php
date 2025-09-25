<?php

namespace App\Http\Controllers\Api;

use App\Models\Fighters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FighterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Fighter::query();

        // Recherche plein texte sur prénom et nom
        if ($search = $request->query('search')) {
            $query->where(function($q) use ($search) {
                $q->where('FirstName', 'like', "%$search%")
                  ->orWhere('LastName', 'like', "%$search%");
            });
        }

        // Filtrage par catégorie d’IMC
        if ($BMI_Category = $request->query('BMI_Category')) {
            $query->where('BMI_Category', $BMI_Category);
        }

        // Filtrage par classe de poids
        if ($MMA_Weight_class = $request->query('MMA_Weight_class')) {
            $query->where('MMA_Weight_class', $MMA_Weight_class);
        }

        return response()->json($query->get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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

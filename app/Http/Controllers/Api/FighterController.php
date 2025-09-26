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
    public function index(Request $request)
    {
        $query = Fighters::query();

        // Recherche plein texte sur prénom et nom
        if($request->has('search')){
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('FirstName', 'LIKE', "%$search%")
                  ->orWhere('LastName', 'LIKE', "%$search%");
            });
        }

        // Filtrage par catégorie d’IMC
        if ($request->has('category') && $request->input('category') != '') {
            $category = $request->input('category');
            $query->where('BMI_Category','LIKE',"%$category%");
        }


        return response()->json($query->get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'FirstName'=> ['required','string','max:30'],
            'LastName'=> ['required','string','max:25'],
            'age'=> ['required','integer','min:18'],
            'weight'=> ['required','integer','max:200'],
            'height'=> ['required','integer','max:250'],
        ]);
        $fighter = Fighters::create($data);
        return response()->json($fighter,200);
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
        $fighter = Fighters::find($id);
        if(!$fighter){
            return response() -> json(["message"=>"Le combattant ayant l'id $id n'existe pas"],404);
        } else {
                $fighter -> delete();
                return response() -> json(["message"=>"Le combattant $id supprimé avec succès"]);
        }
    }

    // Summary on fighters
    public function summary() 
    {
        $toalfighters = Fighters::count(); // comptes le nombres de combattants
        $averageBMI = Fighters::avg('BMI'); // calcul la moyenne des imc
        return response() -> json([
            "Nombres totales de combattants" => $toalfighters,
            "La Moyenne des IMCs" => round($averageBMI,2)
        ]);
    }
}

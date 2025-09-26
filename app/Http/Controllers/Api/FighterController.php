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
        $fighters = Fighters::all();
        return response()->json($fighters);

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
}

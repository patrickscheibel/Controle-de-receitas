<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::orderBy('id', 'asc')->paginate(10);
     
        return $ingredients;
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ]);

        Ingredient::create($request->all());
     
        return true;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'code' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ]);
        
        $ingredient = Ingredient::find($request->id);

        if($ingredient) 
        {
            $ingredient->update($request->all());

            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $ingredient = Ingredient::find($request->id);

        if($ingredient) 
        {
            $ingredient->delete();

            return true;
        } 
        else 
        {
            return false;
        }
    }
}

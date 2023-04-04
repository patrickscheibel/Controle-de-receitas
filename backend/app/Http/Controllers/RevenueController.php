<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Item;
use App\Models\Revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenues = Revenue::orderBy('id', 'asc')->paginate(10);
    
        return $revenues;
    }

    /**
     * Find a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function findByCode(Request $request)
    {
        $revenue = Revenue::whereCode($request->code)
                            ->whereStatus(true)->first();

        if($revenue)
        {
            $items = Item::whereRevenue_code($revenue->code)
                        ->whereVersion($revenue->version)
                        ->orderBy('position', 'asc')->get();
        
            $ingredients = array();

            if(!$items->isEmpty())
            {
                foreach($items as $item)
                {
                    $ingredient = Ingredient::whereCode($item->ingredient_code)->first();
                    
                    if($ingredient)
                    {
                        $ingredient->position = $item->position;
                        array_push($ingredients, $ingredient);
                    }
                };
            }
            $revenue->ingredients = $ingredients;

            return $revenue;
        }
        else
        {
            return false;
        }
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'description' => 'required'
        ]);

        $revenue = Revenue::whereCode($request->code)->update(['status' => false]);

        if($revenue) 
        {
            $request->request->add(['version' => $revenue + 1]); 
        } 
        else 
        {
            $request->request->add(['version' => 1]); 
        }

        Revenue::create($request->all());
     
        return true;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'code' => 'required',
            'description' => 'required',
            'version' => 'required'
        ]);
        
        $revenue = Revenue::find($request->id);

        if($revenue)
        {
            $revenue->update($request->all());

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
     * @param  \App\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $revenue = Revenue::find($request->id);
            
        if($revenue) 
        {
            $revenue->delete();

            return true;
        }
        else
        {
            return false;
        }
    }
}
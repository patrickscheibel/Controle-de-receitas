<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('id', 'asc')->paginate(10);
     
        return $items;
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
            'revenue_code' => 'required',
            'ingredient_code' => 'required',
            'version' => 'required',
            'position' => 'required'
        ]);

        Item::create($request->all());
     
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
            'revenue_code' => 'required',
            'ingredient_code' => 'required',
            'version' => 'required',
            'position' => 'required'
        ]);
        
        $item = Item::find($request->id);

        if($item)
        {
            $item->update($request->all());

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
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $item = Item::find($request->id);

        if($item) 
        {
            $item->delete();
            
            return true;
        } 
        else
        {
            return false;
        }
    }
}
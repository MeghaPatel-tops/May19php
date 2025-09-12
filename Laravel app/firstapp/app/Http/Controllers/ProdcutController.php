<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdcutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "index method";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         echo "create method";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->pname == "" ){
            return back()->with('msg','Invalid product name');
        }
        else{
            //return redirect()->route('product.index');
            return redirect()->route('product.show',1);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         echo "show method   ".$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         echo "edit method";
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

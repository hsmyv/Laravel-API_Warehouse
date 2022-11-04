<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Warehouse::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'address'   => 'required',
            'type'      => 'required',
            ]);
    
            if ($validator->fails()) {    
                return getError();
    
            }
    
            $warehouse = Warehouse::create([
                'name' => $request->name,
                'status' => 1,
                'address' => $request->address,
                'type' => $request->type
            ]);
    
            //$warehouse = Warehouse::create($request->all());
            return $warehouse;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Warehouse::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'address'   => 'required',
            'type'      => 'required',
            'status'    => 'required' 
            ]);

            if ($validator->fails()) {    
                return getError();
    
            } 
            
        $warehouse = Warehouse::find($id);
        $warehouse->update($request->all());
        return $warehouse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        return Warehouse::destroy($id);
 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Updatecategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::with('products')->get();

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
       
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'parent_category'  => 'exists:categories,id'
            ]);
    
            if ($validator->fails()) {    
                return getError();
    
            }

            $category = Category::create([
                'name' => $request->name,
                'status' => 1,
                'parent_category' => $request->parent_category
            ]);
    
           
            return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
       
        $validator = Validator::make($request->all(),[
            'name'          => 'required',
            'status'        => 'required',
            'parent_category'  => 'exists:categories,id'
            ]);

            if ($validator->fails()) {    
             return getError();
    
            }

            $category = Category::findOrFail($id);
            $category->update($request->all());
            return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Category::destroy($id);
    }
}

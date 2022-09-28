<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::latest()->get();
        return view('dashboard.superadmin.category.index',compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.superadmin.category.create');
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
            'name' => 'required|string',
        ]);

        $input = $request->all();
        category::create($input);

        
        return redirect()->route('category.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'Category Created successfully',
                                    'class' => 'success'
                                ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category,$id)
    {
        $category = category::findOrFail($id)->where('id',$id)->first();            
        return view('dashboard.superadmin.category.edit',compact(['category']));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $oldCategory = category::where('id',$id)->get();
        $request->validate([
            'name' => 'required|string',
        ]);
        $input = [
            'name' => $request->name,
        ];

        category::where('id',$id)->update($input);     
        return redirect()->route('category.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'Category Updated successfully',
                                    'class' => 'success'
                                ]);   

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id', $id)->delete();
        return redirect()->route('category.index')
                                    ->with([
                                        'success' => true,
                                        'message' => 'Category Deleted successfully',
                                        'class' => 'danger'
                                    ]); 
    }
}

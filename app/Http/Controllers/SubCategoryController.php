<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $subcategories = SubCategory::latest()->get();
        $subcategories = DB::table('sub_categories')
                            ->select('sub_categories.*','categories.name as category_name')
                            ->leftJoin('categories','categories.id','=','sub_categories.category_id')
                            ->get();
        return view('dashboard.superadmin.subcategory.index',compact(['subcategories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('dashboard.superadmin.subcategory.create',compact('categories'));
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
        SubCategory::create($input);

        
        return redirect()->route('subcategory.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'Sub Category Created successfully',
                                    'class' => 'success'
                                ]);

    }

    public function edit(subcategory $subcategory,$id)
    {
        $categories = category::all();
        $subcategory = SubCategory::findOrFail($id)->where('id',$id)->first();            
        return view('dashboard.superadmin.subcategory.edit',compact(['subcategory','categories']));
        
    }

 
    public function update(Request $request,$id)
    {
        $oldCategory = SubCategory::where('id',$id)->get();
        $request->validate([
            'name' => 'required|string',
        ]);
        $input = [
            'category_id' => $request->category_id,
            'name' => $request->name,
        ];

        SubCategory::where('id',$id)->update($input);     
        return redirect()->route('subcategory.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'Sub Category Updated successfully',
                                    'class' => 'success'
                                ]);   

        
    }


    public function destroy($id)
    {
        SubCategory::where('id', $id)->delete();
        return redirect()->route('subcategory.index')
                                    ->with([
                                        'success' => true,
                                        'message' => 'Sub Category Deleted successfully',
                                        'class' => 'danger'
                                    ]); 
    }
}

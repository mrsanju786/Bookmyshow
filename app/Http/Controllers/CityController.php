<?php

namespace App\Http\Controllers;

use App\Models\city;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = city::latest()->get();
        return view('dashboard.superadmin.cities.index',compact(['cities']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.superadmin.cities.create');
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
            'image' => 'required|mimes:jpg,jpeg',
        ]);

        $input = $request->all();
        $fileName = time().'.'.$request->image->getClientOriginalName();  
        $request->image->move(public_path('uploads/city/'), $fileName);
        $input['image'] = $fileName;

        city::create($input);
        
        return redirect()->route('city.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'City Created successfully',
                                    'class' => 'success'
                                ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city,$id)
    {
        $city = city::findOrFail($id)->where('id',$id)->first();            
        return view('dashboard.superadmin.cities.edit',compact(['city']));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $oldCity = city::find($id);
        $request->validate([
            'name' => 'required|string',
        ]);
        $input = [
            'name' => $request->name,
        ];

        // $request->image->move(public_path('uploads'), $fileName);
        // $input['image'] = $fileName;
        
        if ($image = $request->file('image')) {
            $fileName = time().'.'.$request->image->getClientOriginalName();  
            $image->move(public_path('uploads/city/'), $fileName);
            $input['image'] = "$fileName";
            $OldImage = public_path('uploads/city/'.$oldCity->image); 
            unlink($OldImage);
        }else{
            unset($input['image']);
        }

        city::where('id',$id)->update($input);     
        return redirect()->route('city.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'City Updated successfully',
                                    'class' => 'success'
                                ]);   

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        city::where('id', $id)->delete();
        return redirect()->route('city.index')
                                    ->with([
                                        'success' => true,
                                        'message' => 'City Deleted successfully',
                                        'class' => 'danger'
                                    ]); 
    }
}

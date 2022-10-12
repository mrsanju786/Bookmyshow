<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::latest()->get();
        return view('dashboard.superadmin.banners.index',compact(['banners']));
    }


    public function create()
    {
        return view('dashboard.superadmin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg',
        ]);

        $input = $request->all();
        $fileName = time().'.'.$request->image->getClientOriginalName();  
        $request->image->move(public_path('uploads/banner/'), $fileName);
        $input['image'] = $fileName;

        Banner::create($input);
        
        return redirect()->route('banner.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'Banner Created successfully',
                                    'class' => 'success'
                                ]);

    }

    public function show(banner $banner)
    {
        //
    }

    public function edit(banner $banner,$id)
    {
        $banner = Banner::findOrFail($id)->where('id',$id)->first();            
        return view('dashboard.superadmin.banners.edit',compact(['banner']));
        
    }


    public function update(Request $request,$id)
    {
        $oldBanner = Banner::find($id);
        $request->validate([
            'name' => 'required|string',
        ]);
        $input = [
            'name' => $request->name,
            'status' => $request->status,
        ];

        if ($image = $request->file('image')) {
            $fileName = time().'.'.$request->image->getClientOriginalName();  
            $image->move(public_path('uploads/banner/'), $fileName);
            $input['image'] = "$fileName";
            $OldImage = public_path('uploads/banner/'.$oldBanner->image); 
            unlink($OldImage);
        }else{
            unset($input['image']);
        }

        Banner::where('id',$id)->update($input);     
        return redirect()->route('banner.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'Banner Updated successfully',
                                    'class' => 'success'
                                ]);   

        
    }

    public function destroy($id)
    {
        Banner::where('id', $id)->delete();
        return redirect()->route('banner.index')
                                    ->with([
                                        'success' => true,
                                        'message' => 'Banner Deleted successfully',
                                        'class' => 'danger'
                                    ]); 
    }
}
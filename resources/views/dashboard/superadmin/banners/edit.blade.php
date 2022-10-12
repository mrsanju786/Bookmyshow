@extends('dashboard.superadmin.layouts.app')

@section('content')
<div class="pagetitle">
  <h1>Banner Edit</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Banner</li>
      <li class="breadcrumb-item active">create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">banner Edit Form </h5>

          <!-- General Form Elements -->
          <form class="form form-vertical" action="{{ route('banner.update',$banner->id) }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Banner Name</label>
              <div class="col-sm-10">
                <input type="text" id="name" 
                  class="form-control" name="name" value="{{ $banner->name }}"
                  placeholder="Banner Name">

                  @error('name')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Banner Image</label>
              <div class="col-sm-10">
                <input type="file" id="image" 
                  class="form-control" name="image" value="{{ $banner->image }}"
                  placeholder="Banner Image">

                  @error('image')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
  
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select name="status" class="form-control" id="">
                  <option value="1" @if($banner->status == 1) selected @endif>Active</option>
                  <option value="0" @if($banner->status == 0) selected @endif >Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
  

            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

          </form>
          <!-- End General Form Elements -->
          
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
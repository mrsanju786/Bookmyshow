@extends('dashboard.superadmin.layouts.app')

@section('content')
<div class="pagetitle">
  <h1>Sub Category Edit</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Sub Category</li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sub Category Edit Form </h5>

          <!-- General Form Elements -->
          <form class="form form-vertical" action="{{ route('subcategory.update',$subcategory->id) }}" method="post">
          @csrf
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
              <select name="category_id" id="" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @if($subcategory->category_id == $category->id) selected=""  @endif>{{ $category->name }}</option>
                @endforeach
              </select>

                @error('category_id')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">subCategory Name</label>
              <div class="col-sm-10">
                <input type="text" id="name" 
                  class="form-control" name="name" value="{{ $subcategory->name }}"
                  placeholder="Sub Category Name">

                  @error('name')
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
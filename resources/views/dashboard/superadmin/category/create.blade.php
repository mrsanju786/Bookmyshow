@extends('dashboard.superadmin.layouts.app')

@section('content')
<div class="pagetitle">
  <h1>Category Add</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">category</li>
      <li class="breadcrumb-item active">create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<!-- General Form Elements -->
<form class="form form-vertical" action="{{ route('category.store') }}" method="post">
@csrf
<section class="section">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <h5 class="card-title">Category Detail </h5><hr>
        <br>
        <div class="col-lg-12">


            <div class="row mb-3">
              <div class="col-sm-12">
                <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                <input type="text" id="name" 
                  class="form-control" name="name"
                  placeholder="Category Name">

                  @error('name')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              </div>
            </div>
  

            <div class="row mb-3">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

            
          </div>
        </div>

      </div>
    </div>
</section>
  </form>
  <!-- End General Form Elements -->

@endsection
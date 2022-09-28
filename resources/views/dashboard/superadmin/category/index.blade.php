@extends('dashboard.superadmin.layouts.app')

@section('content')


<div class="pagetitle">
    <h1>Categories</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">categories</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  
    {{-- Alerts --}}
@if (session('success'))
<div class="alert alert-{{ session('class') ?: 'danger' }}">
  {{ session('message') }}
</div>
@endif
@if (session('danger'))
<div class="alert alert-{{ session('class') ?: 'danger' }}">
  {{ session('message') }}
</div>
@endif

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-header">
            Categories Listing
              <button class="btn btn-primary btn-xs" style="float: right;">   
                  <a href="{{ url('category/create') }}" class="text-white">Add Category</a>     
              </button>
          </div>
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @php  $no = 1  @endphp
                  @foreach ($categories as $category)
                      
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                      <a href="{{ url('category/'.$category->id.'/edit') }}">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="{{ url('category/'.$category->id .'/delete') }}" onclick="return   confirm('Are you sure want to delete this recoard!')">
                        <i class="bi bi-trash-fill"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
    
@endsection
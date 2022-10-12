@extends('dashboard.superadmin.layouts.app')

@section('content')


<div class="pagetitle">
    <h1>Banner</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Banner</li>
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
            Cities Listing
              <button class="btn btn-primary btn-xs" style="float: right;">   
                  <a href="{{ url('banner/create') }}" class="text-white">Add Banner</a>     
              </button>
          </div>
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table table-striped" id="bannertbl">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Banner Name</th>
                  <th scope="col">Banner Image</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @php  $no = 1  @endphp
                  @foreach ($banners as $banner)
                      
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $banner->name }}</td>
                    <td>
                      <img src="{{ url('uploads/banner/'.$banner->image) }}" alt="" height="120" width="120">
                    </td>
                    <td> @if($banner->status == 1) active @else inactive  @endif</td>
                    <td>
                      <a href="{{ url('banner/'.$banner->id.'/edit') }}">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="{{ url('banner/'.$banner->id .'/delete') }}" onclick="return   confirm('Are you sure want to delete this recoard!')">
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

  @push('script')
  <script>
    // Simple Datatable
    let table1 = document.querySelector('#bannertbl');
    let dataTable = new simpleDatatables.DataTable(table1);
  </script>
@endpush
    
@endsection
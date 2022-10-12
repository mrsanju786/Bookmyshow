@extends('dashboard.superadmin.layouts.app')

@section('content')


<div class="pagetitle">
    <h1>Events</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Events</li>
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
                  <a href="{{ url('event/create') }}" class="text-white">Add Event</a>     
              </button>
          </div>
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table table-striped" id="eventtbl">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Event Name</th>
                  <th scope="col">Event Image</th>
                  <th scope="col">Event address</th>
                  <th scope="col">Event ticket name</th>
                  <th scope="col">Event ticket qty</th>
                  <th scope="col">Event ticket price</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @php  $no = 1  @endphp
                  @foreach ($events as $event)
                      
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $event->event_name }}</td>
                    <td>
                      <img src="{{ url('uploads/event_image/'.$event->event_image) }}" alt="" height="120" width="120">
                    </td>
                    <td>{{ $event->address }}</td>
                    <td>{{ $event->ticket_name }}</td>
                    <td>{{ $event->ticket_qty }}</td>
                    <td>{{ $event->ticket_price }}</td>
                    <td>
                      <a href="{{ url('event/'.$event->id.'/edit') }}">
                        <i class="bi bi-pencil-square lg"></i>
                      </a>
                      <a href="{{ url('event/'.$event->id .'/delete') }}" onclick="return   confirm('Are you sure want to delete this recoard!')">
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
    let table1 = document.querySelector('#eventtbl');
    let dataTable = new simpleDatatables.DataTable(table1);
  </script>
@endpush
    
@endsection
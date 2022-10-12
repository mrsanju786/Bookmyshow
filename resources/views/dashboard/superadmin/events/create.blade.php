@extends('dashboard.superadmin.layouts.app')

@section('content')
@push('head')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
@endpush

<div class="pagetitle">
  <h1>Event Add</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Event</li>
      <li class="breadcrumb-item active">create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Event Add Form </h5>
          <!-- General Form Elements -->
          <form class="form form-vertical" action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Event Name</label>
              <div class="col-sm-10">
                <input type="text" id="event_name" 
                  class="form-control" name="event_name"
                  placeholder="Event Name">

                  @error('event_name')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" id="title" 
                  class="form-control" name="title"
                  placeholder="Title">

                  @error('title')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Event Image</label>
              <div class="col-sm-10">
                <input type="file" id="event_image" 
                  class="form-control" name="event_image"
                  placeholder="City Name">

                  @error('event_image')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input type="text" id="pac-input" class="form-control" name="address" placeholder="Address">
                <input type="hidden" id="lat_address" class="form-control" name="lat_address"/>
                <input type="hidden" id="long_address" class="form-control" name="long_address"/>

                  @error('address')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Street 1</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="street1" placeholder="Street 1">
                  @error('steet1')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Street 2</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="street2" placeholder="Street 2">
                  @error('street2')
                      <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Languages</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="languages" placeholder="Languages">
                  @error('languages')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            


            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Event Create Date</label>

              <div class="col-sm-10">
                  <div id="inputFormRow">
                      <div class="input-group mb-3">
                          <input type="date" name="eventdate[]" class="form-control m-input" autocomplete="off">
                          <input type="time" name="eventstarttime[]" class="form-control m-input" autocomplete="off">
                          <input type="time" name="eventendtime[]" class="form-control m-input" autocomplete="off">
                          <div class="input-group-append">
                              <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                          </div>
                      </div>
                  </div>

                  <div id="newRow"></div>
                  <button id="addRow" type="button" class="btn btn-info">Add Row</button>
              </div>
            </div>

            





{{-- 
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Event Start Date</label>
              <div class="col-sm-10 addEventDate">
                <input type="date" class="form-control event_start_date" name="event_start_date" placeholder="Event start date">
                <br/>
                <input type="date" class="form-control event_end_date" name="event_end_date" placeholder="Event end date">
                <br/>
              </div> 
              <div class="col-sm-10 addEventDate">
                
              </div>
            </div> --}}
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Ticket Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ticket_name" placeholder="Ticket Name">
                  @error('ticket_name')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Ticket Type</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ticket_type" placeholder="Ticket Type">
                  @error('ticket_type')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Ticket Qty</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ticket_qty" placeholder="Ticket Qty">
                  @error('ticket_qty')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Ticket Price</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ticket_price" placeholder="Ticket Price">
                  @error('ticket_price')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>


            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Ticket Sale Date</label>

              <div class="col-sm-10">
                  <div id="inputFormRowTicket">
                      <div class="input-group mb-3">
                          <input type="date" name="ticketdate[]" class="form-control m-input" autocomplete="off">
                          <input type="time" name="ticketstarttime[]" class="form-control m-input" autocomplete="off">
                          <input type="time" name="ticketendtime[]" class="form-control m-input" autocomplete="off">
                          <div class="input-group-append">
                              <button id="removeRowTicket" type="button" class="btn btn-danger">Remove</button>
                          </div>
                      </div>
                  </div>

                  <div id="newRowTicket"></div>
                  <button id="addRowTicket" type="button" class="btn btn-info">Add Row</button>
              </div>
            </div>



            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
              <div class="col-sm-10">
                <select name="category_id" id="" class="form-control">
                  <option value="">-- Select Category --</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
              <label for="inputText" class="col-sm-2 col-form-label">Short Description</label>
              <div class="col-10">
                <div class="card">
                    <div class="card-body">
                      <textarea name="short_description" id="editorShortDesc" cols="30" rows="10"></textarea>

                        {{-- <div id="editorShortDesc">
                            <p>This is some sample content.</p>
                        </div> --}}
                    </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Long Desciption</label>
              <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <textarea name="long_description" id="editorLongDesc" cols="30" rows="10"></textarea>
                        {{-- <div id="editorLongDesc">
                            <p>This is some sample content.</p>
                        </div> --}}
                    </div>
                </div>
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


@push('script')

<script type="text/javascript">
  // add row
  $("#addRow").click(function () {
      var html = '';
      html += '<div id="inputFormRow">';
      html += '<div class="input-group mb-3">';
      html += '<input type="date" name="eventdate[]" class="form-control m-input" autocomplete="off">';
      html += '<input type="time" name="eventstarttime[]" class="form-control m-input" autocomplete="off">';
      html += '<input type="time" name="eventendtime[]" class="form-control m-input" autocomplete="off">';
      html += '<div class="input-group-append">';
      html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
      html += '</div>';
      html += '</div>';

      $('#newRow').append(html);
  });

  // remove row
  $(document).on('click', '#removeRow', function () {
      $(this).closest('#inputFormRow').remove();
  });


  // add row Ticket
  $("#addRowTicket").click(function () {
      var html = '';
      html += '<div id="inputFormRowTicket">';
      html += '<div class="input-group mb-3">';
      html += '<input type="date" name="ticketdate[]" class="form-control m-input" autocomplete="off">';
      html += '<input type="time" name="ticketstarttime[]" class="form-control m-input" autocomplete="off">';
      html += '<input type="time" name="ticketendtime[]" class="form-control m-input" autocomplete="off">';
      html += '<div class="input-group-append">';
      html += '<button id="removeRowTicket" type="button" class="btn btn-danger">Remove</button>';
      html += '</div>';
      html += '</div>';

      $('#newRowTicket').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowTicket', function () {
      $(this).closest('#inputFormRowTicket').remove();
  });
</script>



<script>
    // var startDate,endDate,dateArr;
  
    // $('.event_start_date').change(function(){

    //   startDate = $(this).val(); //YYYY-MM-DD
    // });
    // $('.event_end_date').change(function(){
    //     endDate = $(this).val(); //YYYY-MM-DD
        
    // });
  

var startDate = new Date("2022-10-28"); //YYYY-MM-DD
var endDate = new Date("2022-11-11"); //YYYY-MM-DD

var getDateArray = function(start, end) {
    var arr = new Array();
    var dt = new Date(start);
    while (dt <= end) {
        arr.push(new Date(dt));
        dt.setDate(dt.getDate() + 1);
    }
    return arr;
}

var dateArr = getDateArray(startDate, endDate);

for (var i = 0; i < dateArr.length; i++) {
    // document.write("<p>" + dateArr[i] + "</p>");
    var code = '<div class="row"> <div class="col-sm-6"> <input type="text" class="form-control " value="'+ new Date(dateArr[i]).getDate() + '-' + (dateArr[i].getMonth()+1) + '-' + dateArr[i].getFullYear()+ '"> </div><div class="col-sm-6"><input type="time" class="form-control col-sm-6" value="" name="date"> </div></div> </br></br>  ';

    // $('.addEventDate').append(new Date(dateArr[i]).getDate() + '-' + dateArr[i].getMonth() + '-' + dateArr[i].getFullYear() );
    $('.addEventDate').append(code);

}




  // for (var i = 0; i < dateArr.length; i++) {
  //   var code = '<input type="text" class="form-control" value="'+ new Date(dateArr[i]).getDate() +'"> </br>  ';
  //   document.write("<p>" + dateArr[i] + "</p>");
    
  //   // var myDate = code.push(dateArr[i]);
  //   console.log('my array : </br>' + "<p>" + dateArr[i] + "</p>" );
  // }
  // $('.addEventDate').append(code);
  
 


  // getDateArray(startDate, endDate)

  


  
    
</script>



<script src="{{ asset('dashboard/assets/vendors/ckeditor/ckeditor.js') }}"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editorShortDesc'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editorLongDesc'))
        .catch(error => {
            console.error(error);
        });
</script>  


{{-- <script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initAutocomplete&libraries=places&v=weekly"
defer
></script> --}}


{{--     
<script
src="https://maps.googleapis.com/maps/api/directions/json?origin=Disneyland&destination=Universal+Studios+Hollywood&key=AIzaSyCXKWXkdw6dJhdkVfderaQQ9hTv77sXxgQ
"
defer
></script> --}}

@endpush

@endsection
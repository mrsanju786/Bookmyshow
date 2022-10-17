@extends('dashboard.superadmin.layouts.app')

@section('content')
<div class="pagetitle">
  <h1>Banner Edit</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Event</li>
      <li class="breadcrumb-item active">edit</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<form class="form form-vertical" action="{{ route('event.update',$event->id) }}" method="post" enctype="multipart/form-data">
@csrf


<section class="section">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <h5 class="card-title">Event Detail</h5><hr>
        <br>
        <div class="col-lg-6">


          <!-- General Form Elements -->
          

          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
              
                <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                <select name="category_id" id="" class="form-control">
                  <option value="">-- Select Category --</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($event->category_id == $category->id)
                      selected=""
                    @endif>{{ $category->name }}</option>
                  @endforeach
                </select>

                  @error('category_id')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">Event Name</label>
                <input type="text" id="event_name" 
                  class="form-control" name="event_name" value="{{ $event->event_name }}"
                  placeholder="Event Name">

                  @error('event_name')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                <input type="text" id="title" 
                  class="form-control" name="title" value="{{ $event->title }}"
                  placeholder="Title">

                  @error('title')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
                
                <label for="inputText" class="col-sm-2 col-form-label">Event Image</label>
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
          </div>

    
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                <input type="text" id="pac-input" class="form-control" name="address" value="{{ $event->address }}" placeholder="Address">
                <input type="hidden" id="lat_address" class="form-control" name="lat_address"/>
                <input type="hidden" id="long_address" class="form-control" name="long_address"/>

                  @error('address')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">

                <label for="inputText" class="col-sm-2 col-form-label">Street 1</label>
                <input type="text" class="form-control" name="street1" value="{{ $event->street1 }}" placeholder="Street 1">
                  @error('steet1')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
             </div>
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">Street 2</label>
                <input type="text" class="form-control" name="street2" value="{{ $event->street2 }}" placeholder="Street 2">
                  @error('street2')
                      <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
              </div>
            </div>
          </div>


        </div>
        <div class="col-lg-6">


       
          
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">Languages</label>
                <input type="text" class="form-control" name="languages" value="{{ $event->languages }}" placeholder="Languages">
                  @error('languages')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
          </div>

        
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">Short Description</label>
                <div class="card">
                    <div class="card-body">
                      <textarea name="shor_description" id="editorShortDesc" cols="30" rows="10">

                        {!! $event->shor_description !!}

                      </textarea>

                        {{-- <div id="editorShortDesc">
                            <p>This is some sample content.</p>
                        </div> --}}
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">Long Desciption</label>
                <div class="card">
                    <div class="card-body">
                        <textarea name="long_description" id="editorLongDesc" cols="30" rows="10">

                          {!! $event->long_description !!}
                        </textarea>
                        {{-- <div id="editorLongDesc">
                            <p>This is some sample content.</p>
                        </div> --}}
                    </div>
                </div>
              </div>
            </div>
          </div>


          
          

        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <h5 class="card-title">Ticket detail</h5><hr>
        <br>
        <div class="col-lg-6">


          {{-- <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Event Create Date</label>

            <div class="col-sm-12">
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
          </div> --}}

          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">

              <label for="inputText" class="col-sm-2 col-form-label">Ticket Name</label>
              <input type="text" class="form-control" name="ticket_name" value="{{ $event->ticket_name }}" placeholder="Ticket Name">
                @error('ticket_name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">

              <label for="inputText" class="col-sm-2 col-form-label">Ticket Type</label>
              <input type="text" class="form-control" name="ticket_type"  value="{{ $event->ticket_type }}" placeholder="Ticket Type">
                @error('ticket_type')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
          </div>
          
         


          {{-- <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Ticket Sale Date</label>

            <div class="col-sm-12">
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
          </div> --}}

        </div>
        <div class="col-lg-6">
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">
              
              <label for="inputText" class="col-sm-2 col-form-label">Ticket Qty</label>
              <input type="text" class="form-control" name="ticket_qty" value="{{ $event->ticket_qty }}" placeholder="Ticket Qty">
                @error('ticket_qty')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-group">

                <label for="inputText" class="col-sm-2 col-form-label">Ticket Price</label>
                <input type="text" class="form-control" name="ticket_price" value="{{ $event->ticket_price }}" placeholder="Ticket Price">
                  @error('ticket_price')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>
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
</section>

</form>
<!-- End General Form Elements -->





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
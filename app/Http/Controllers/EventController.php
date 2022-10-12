<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Event;
use App\Models\EventTimeSchedule;
use App\Models\TicketSaleSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::latest()->get();
        $categories = category::all();
        return view('dashboard.superadmin.events.index',compact(['events','categories']));
    }


    public function create()
    {
        $categories = category::all();
        return view('dashboard.superadmin.events.create',compact('categories'));
    }

    public function store(Request $request)
    {
         $countEventDate = count($request->eventdate);
         $countTicketDate = count($request->ticketdate);

        $request->validate([
            'event_name' => 'required|string',
            'event_image' => 'required|mimes:jpg,jpeg',
        ]);

        // $input = $request->all();
        $input = [
            'event_name' => $request->event_name,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'address' => $request->address,
            'lat_address' => $request->lat_address ?? '',
            'long_address' => $request->long_address ?? '',
            'street1' => $request->street1,
            'street2' => $request->street2,
            'languages' => $request->languages,
            'shor_description' => $request->shor_description ?? '',
            'long_description' => $request->long_description ?? '',
            'ticket_name' => $request->ticket_name,
            'ticket_type' => $request->ticket_type,
            'ticket_qty' => $request->ticket_qty,
            'ticket_price' => $request->ticket_price,
            'created_by' => Auth::user()->id,
        ];
        $fileName = time().'.'.$request->event_image->getClientOriginalName();  
        $request->event_image->move(public_path('uploads/event_image/'), $fileName);
        $input['event_image'] = $fileName;

        $event = Event::create($input);
        
        for($i=0 ; $i<$countEventDate; $i++)
        {
            EventTimeSchedule::create([
                'event_id' => $event->id,
                'event_date' => $request->eventdate[$i],
                'event_start_time' => $request->eventstarttime[$i],
                'event_end_time' => $request->eventendtime[$i],
            ]);
            
        }
        
        for($i=0 ; $i<$countTicketDate; $i++)
        {
            TicketSaleSchedule::create([
                'event_id' => $event->id,
                'ticket_sale_date' => $request->ticketdate[$i],
                'ticket_sale_start_time' => $request->ticketstarttime[$i],
                'ticket_sale_end_time' => $request->ticketendtime[$i],
            ]);
            
        }
        return redirect()->route('event.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'Event Created successfully',
                                    'class' => 'success'
                                ]);

    }

    public function show(event $event)
    {
        //
    }

    public function edit(event $event,$id)
    {

        $categories = category::all();            
        $event = Event::findOrFail($id)->where('id',$id)->first();            
        return view('dashboard.superadmin.events.edit',compact(['event','categories']));
        
    }


    public function update(Request $request,$id)
    {
        $oldEvent = Event::find($id);
        $request->validate([
            'event_name' => 'required|string',
        ]);
      
        $input = [
            'event_name' => $request->event_name,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'address' => $request->address,
            'lat_address' => $request->lat_address ?? '',
            'long_address' => $request->long_address ?? '',
            'street1' => $request->street1,
            'street2' => $request->street2,
            'languages' => $request->languages,
            'shor_description' => $request->shor_description ?? '',
            'long_description' => $request->long_description ?? '',
            'ticket_name' => $request->ticket_name,
            'ticket_type' => $request->ticket_type,
            'ticket_qty' => $request->ticket_qty,
            'ticket_price' => $request->ticket_price,
            'created_by' => Auth::user()->id,
        ];

        if ($image = $request->file('event_image')) {
            $fileName = time().'.'.$request->event_image->getClientOriginalName();  
            $image->move(public_path('uploads/event_image/'), $fileName);
            $input['event_image'] = "$fileName";
            $OldImage = public_path('uploads/event_image/'.$oldEvent->event_image); 
            unlink($OldImage);
        }else{
            unset($input['image']);
        }

        Event::where('id',$id)->update($input);     
        return redirect()->route('event.index')
                                ->with([
                                    'success' => true,
                                    'message' => 'Event Updated successfully',
                                    'class' => 'success'
                                ]);   

        
    }

    public function destroy($id)
    {
        Event::where('id', $id)->delete();
        return redirect()->route('event.index')
                                    ->with([
                                        'success' => true,
                                        'message' => 'Event Deleted successfully',
                                        'class' => 'danger'
                                    ]); 
    }
}

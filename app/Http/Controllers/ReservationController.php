<?php

namespace App\Http\Controllers;



use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Notification;
use App\Notifications\reservationConfrimmed;
use Route;

class ReservationController extends Controller
{


        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::all();

        return view("reservation.index")->with('reservations', $reservation);

    }




    public function confirm($id){
        $reservation = Reservation::find($id);
        $reservation->status = 1;

        if ($reservation->save()) {

            Notification::route('mail', $reservation->email)
                                ->notify(new reservationConfrimmed());


            Toastr::success("The reservation Is Confirmed",
                                "Success",['positionClass' => 'toast-top-right']);


            session()->flash('confirmMassage', "The reservation Is Confirmed");   
        } 

        return redirect()->back();
        
    }



    public function notCconfirm($id){
        $reservation = Reservation::find($id);
        $reservation->status = 0;
        if ($reservation->save()) {
            session()->flash('notCconfirmMassage', "The reservation Is Not Confirmed");   
        }

        return redirect()->back();
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $reservation = new Reservation;

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|numeric',
            'massage' => 'required',
            'date_and_time' => 'required',            
        ]);

        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->massage = $request->massage;
        $reservation->date_and_time = $request->date_and_time;


    

        if($reservation->save()){
            Toastr::success("Reservation request Sent Successfuly. we will Confirm to you shortly",
            "Success",['positionClass' => 'toast-top-right']);
        }

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        if (empty($reservation)) {
            abort(404, 'Page not found');
        }

        if($reservation->delete()){
            session()->flash('deleteMassage', "The reservation Is Trsahed to the Soft Delete");
        }
        return redirect()->route('reservation.index');

    }



    public function trashed()
    {
        $reservation = Reservation::onlyTrashed()->get();
        return view('reservation.softDeleted')->with('reservations', $reservation);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $reservation = Reservation::withTrashed()->where('id', $id)->first();
        if (empty($reservation)) {
            abort(404, 'Page not found');
        }

        if ($reservation->forceDelete()) {
            session()->flash('deleteMassage', "The reservation Is Deleted");
        }
        return redirect()->route('reservation.index');
    }


    public function restore($id)
    {
        $reservation = Reservation::withTrashed()->where('id', $id)->first();

        if (empty($reservation)) {
            abort(404, 'Page not found');
        }

        if ($reservation->restore()) {

            session()->flash('restoreMassage', "The Reservation Is restored");

        }

        return redirect()->route('reservation.index');

    }


}

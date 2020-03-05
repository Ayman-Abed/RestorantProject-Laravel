<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return view("contact.index")->with("contacts", $contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'massage' => 'required'
        ]);



        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->massage = $request->massage;

        if($contact->save()){
            Toastr::success("Contact request Sent Successfuly. we will Confirm to you shortly",
            "Success",['positionClass' => 'toast-top-right']);
        }

        return redirect()->back();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (empty($contact)) {
            abort(404, 'Page not found');
        }

        if($contact->delete()){
            session()->flash('deleteMassage', "The contact Is Trsahed to the Soft Delete");
        }
        return redirect()->route('contact.index');

    }



    public function trashed()
    {
        $contact = Contact::onlyTrashed()->get();
        return view('contact.softDeleted')->with('contacts', $contact);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $contact = Contact::withTrashed()->where('id', $id)->first();
        if (empty($contact)) {
            abort(404, 'Page not found');
        }

        if ($contact->forceDelete()) {
            session()->flash('deleteMassage', "The contact Is Deleted");
        }
        return redirect()->route('contact.index');
    }


    public function restore($id)
    {
        $contact = Contact::withTrashed()->where('id', $id)->first();

        if (empty($contact)) {
            abort(404, 'Page not found');
        }

        if ($contact->restore()) {

            session()->flash('restoreMassage', "The contact Is restored");

        }
        
        return redirect()->route('contact.index');

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class userController extends Controller
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
        $users = User::all();
        return view("users.index")->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.addUser");
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
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);



        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        if($user->save()){
            session()->flash('addMassage', "Success to add user");
        }

        return redirect()->route('users.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // if not found User ID return 404 Not Found page
        if (empty($user)) {
            abort(404, 'Page not found');
        }
        return view("users.editUser")->with("user", $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (empty($user)) {
            abort(404, 'Page not found');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        if ($user->save()) {
            session()->flash('editMassage', "Success to update user");
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            abort(404, 'Page not found');
        }

        if($user->delete()){
            session()->flash('deleteMassage', "The User Is Trsahed to the Soft Delete");
        }
        return redirect()->route('users.index');

    }



    public function trashed()
    {
        $user = User::onlyTrashed()->get();
        return view('users.softDeleted')->with('users', $user);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if (empty($user)) {
            abort(404, 'Page not found');
        }

        if ($user->forceDelete()) {
            session()->flash('deleteMassage', "The User Is Deleted");
        }
        return redirect()->route('users.index');
    }


    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        if (empty($user)) {
            abort(404, 'Page not found');
        }

        if ($user->restore()) {

            session()->flash('restoreMassage', "The User Is restored");

        }
        
        return redirect()->route('users.index');

    }




    
}

<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        $slider = Slider::all();

        return view("slider.index")->with("sliders", $slider);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("slider.addSlider");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);



        // to add image For  Book
        if (!empty($request->image)) {
                # code...
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move("uploads/sliders/", $image_new_name);

        }else {
            // Becuse fond in file by Default
            $image_new_name = "default.jpg";
        }


        $slider = Slider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => 'uploads/sliders/'.$image_new_name,
        ]);

        if ($slider) {
            session()->flash('addMassage', "Success to add Slider");
        }


        return redirect()->route('slider.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        if (empty($slider)) {
            abort(404, 'Page not found');
        }

        return view("slider.editSlider")->with('slider', $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);


        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);


        if( $request->hasFile("image")) {

            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();
            // To get new image and the date The Image has Add
            $image->move('uploads/sliders/',$image_new_name);
            // To save new image add
            $slider->image ='uploads/sliders/'.  $image_new_name;
        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;

        if ($slider->save()) {
            session()->flash('editMassage', "Success to update Slider");
        }

        return redirect()->route('slider.index');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */





    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (empty($slider)) {
            abort(404, 'Page not found');
        }

        if($slider->delete()){
            session()->flash('deleteMassage', "The slider Is Trsahed to the Soft Delete");
        }
        return redirect()->route('slider.index');

    }



    public function trashed()
    {
        $slider = Slider::onlyTrashed()->get();
        return view('slider.softDeleted')->with('sliders', $slider);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $slider = Slider::withTrashed()->where('id', $id)->first();
        if (empty($slider)) {
            abort(404, 'Page not found');
        }

        if ($slider->forceDelete()) {
            session()->flash('deleteMassage', "The slider Is Deleted");
        }

        return redirect()->route('slider.trashed');
    }





    public function restore($id)
    {
        $slider = Slider::withTrashed()->where('id', $id)->first();

        if (empty($slider)) {
            abort(404, 'Page not found');
        }

        if ($slider->restore()) {

            session()->flash('restoreMassage', "The slider Is restored");

        }

        return redirect()->route('slider.index');

    }



}

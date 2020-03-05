<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;

use Illuminate\Http\Request;

class ItemController extends Controller
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
        $item = Item::all();
        return view("items.index")->with("items", $item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        if($category->count() == 0){
            return redirect()->route("category.addCategory");
        }
        return view("items.addItem")->with("categories", $category);
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
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);

        

        // to add image For  Book
        if (!empty($request->image)) {
                # code...
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move("uploads/items/", $image_new_name);

        }else {
            // Becuse fond in file by Default
            $image_new_name = "item.png";
        }


        $item = Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'image' => 'uploads/items/'.$image_new_name,
        ]);

        if ($item) {
            session()->flash('addMassage', "Success to add Item");
        }


        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();

        $item = Item::find($id);
        
        if (empty($item)) {
            abort(404, 'Page not found');
        }
        return view("items.editItem")->with("item",$item)->with("categories", $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);  
        
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        
        if( $request->hasFile("image")) {

            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();
            // To get new image and the date The Image has Add
            $image->move('uploads/items/',$image_new_name);
            // To save new image add
            $item->image ='uploads/items/'.  $image_new_name;
        }

        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;

        
        if ($item->save()) {
            session()->flash('editMassage', "Success to update Item");
        }

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (empty($item)) {
            abort(404, 'Page not found');
        }

        if($item->delete()){
            session()->flash('deleteMassage', "The item Is Trsahed to the Soft Delete");
        }
        return redirect()->route('item.index');

    }



    public function trashed()
    {
        $item = Item::onlyTrashed()->get();
        return view('items.softDeleted')->with('items', $item);
    }

    // {{-- hdelete =>> hard Delete حدف كامل --}}

    public function hdelete($id)
    {
        $item = Item::withTrashed()->where('id', $id)->first();
        if (empty($item)) {
            abort(404, 'Page not found');
        }

        if ($item->forceDelete()) {
            session()->flash('deleteMassage', "The item Is Deleted");
        }

        return redirect()->route('item.trashed');
    }


    public function restore($id)
    {
        $item = Item::withTrashed()->where('id', $id)->first();

        if (empty($item)) {
            abort(404, 'Page not found');
        }

        if ($item->restore()) {

            session()->flash('restoreMassage', "The item Is restored");

        }
        
        return redirect()->route('item.index');

    }


}

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required|unique:categories',
            'image' => 'required'
        ]);

        $image = $request->image->store('categories');

        Category::create([
            'name' => $request->name,
            'image' => $image
        ]);

        session()->flash('success','Category created successfully');

        return redirect(route('categories.index'));
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
    public function edit(Category $category)
    {
        return view('categories.create')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $this->validate(request(),[
            'name' => 'required',
        ]);
        $data = $request->only([
            'name'
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->image->store('categories');
            Storage::delete($category->image);
            $data['image'] = $image;
        }

        $category->update($data);

        session()->flash('success','The Category is Updated');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $category->delete();
       Storage::delete($category->image);

        session()->flash('success','The category successfully Deleted');

        return redirect(route('categories.index'));
    }

    //For api
    public function all()
    {
        return response()->json(Category::all(),200);
    }
}

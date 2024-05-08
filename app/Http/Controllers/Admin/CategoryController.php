<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\requests\CategoryRequest;
use App\Http\requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo "hello";
        $categories = Category::all();        
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // dd($request);//410 page expire error will occur
        $categories = Category::create($request->all());
        // $categories->save();
        // file upload
        $fileName = time().'.'.$request->image->extension();
        // dd($fileName);
        $upload = $request->image->move(public_path('images/category'), $fileName);
        if ($upload){
            $categories->image = "/images/category/".$fileName;
        }
        $categories->save(); 
        
        return redirect()->route('backend.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // echo $id;
        $category=Category::find($id);
        // echo $category;
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        // echo $id;
        // dd($request);     
        $category = Category::find($id);
        $category->update($request->all());
        if($request->hasfile('new_image')){
            $fileName = time().'.'.$request->new_image->extension();
            $upload = $request->new_image->move(public_path('images/'), $fileName);
            if ($upload){
                $category->image = "/images/".$fileName;
            }
        }else{
            $category->image = $request->old_image;
        }

        $category->save();
        return redirect()->route('backend.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // echo $id;
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('backend.categories.index');
    }
}

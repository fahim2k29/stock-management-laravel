<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(8);
        return view('categories.index', compact('categories'));
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
        $request->validate([
            'name' => 'required|min:4|max:28|unique:categories,name',
            'description' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, "-");
        $category->description = $request->description;
        $category->save();


        return redirect()->route('category.index')->with('message', 'Category added successfully.');
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
        $categories = Category::find($id);
        return view('categories.edit', compact('categories'));
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
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|min:4|max:28|unique:categories,name,' . $category->id,
            'description' => 'required',
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, "-");
        $category->description = $request->description;
        $category->update();

        return redirect()->route('category.index')->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('category.index')
                ->with('message', 'Category Deleted Successfully');
        } catch (QueryException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    
}


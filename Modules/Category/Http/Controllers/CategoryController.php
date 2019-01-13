<?php

namespace Modules\Category\Http\Controllers;

use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::with('posts')->get();
        $trashCount = Category::onlyTrashed()->count();
        return view('category::index', compact('categories', 'trashCount'));
    }

    public function trashes(){
        $categories = Category::with('posts')->onlyTrashed()->get();
        $categoryCount = Category::count();
        return view('category::trashes', compact('categories', 'categoryCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreCategory $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect()->route('categories.index')->with('success', __("messages.create.success"));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(StoreCategory $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();

        return redirect()->route('categories.index')->with('success', __("messages.update.success"));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', __("messages.delete.success"));
    }

    public function forceDestroy($id){
        Category::where("id", $id)->forceDelete();
        return redirect()->route('categories.trashes')->with('success', __("messages.delete.success"));
    }

    public function restore($id){
        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->route('categories.trashes')->with('success', __("messages.restore.success"));
    }

    public function destroyAll(){
        Category::onlyTrashed()->forceDelete();

        return redirect()->route('categories.index')->with('success', __("messages.delete.success"));
    }

    public function restoreAll(){
        Category::onlyTrashed()->restore();
        return redirect()->route('categories.index')->with('success', __("messages.restore.success"));
    }
}

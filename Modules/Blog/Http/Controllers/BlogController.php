<?php

namespace Modules\Blog\Http\Controllers;

use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Requests\StoreBlog;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $posts = Post::with(["categories", "tags"])->get();
        $trashCount = Post::onlyTrashed()->count();
        return view('blog::index', compact('posts', 'trashCount'));
    }

    public function trashes(){
        $trashes = Post::with(['categories', 'tags'])->onlyTrashed()->get();
        $postCount = Post::count();
        return view('blog::trashes', compact('trashes', 'postCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog::create', compact('categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function store(StoreBlog $request)
    {
        $categories = Category::findMany($request->categories);
        $tags = Tag::findMany($request->tags);

        DB::transaction(function() use ($request, $categories, $tags)  {
            $post = new Post();
            $post->fill($request->all());
            $post->save();

            $post->categories()->saveMany($categories);
            $post->tags()->saveMany($tags);
        });

        return redirect()->route('blogs.index')->with('success', __("messages.create.success"));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::with(["tags", "categories"])->findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        $categoryIDs = $post->categories->pluck('id')->toArray();
        $tagIDs = $post->tags->pluck('id')->toArray();
        return view('blog::edit', compact('post', 'categories', 'tags', 'categoryIDs', 'tagIDs'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(StoreBlog $request, $id)
    {
        $categories = Category::findMany($request->categories);
        $tags = Tag::findMany($request->tags);

        DB::transaction(function() use ($request, $categories, $tags, $id)  {
            $post = Post::findOrFail($id);
            $post->fill($request->all());
            $post->save();

            $post->categories()->detach();
            $post->tags()->detach();

            $post->categories()->saveMany($categories);
            $post->tags()->saveMany($tags);
        });

        return redirect()->route('blogs.index')->with('success', __("messages.update.success"));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('blogs.index')->with('success', __("messages.delete.success"));
    }

    public function forceDestroy($id){
        $post = Post::withTrashed()->findOrFail($id);

        $post->categories()->detach();
        $post->tags()->detach();

        $post->forceDelete();
        return redirect()->route('blogs.trashes')->with('success', __("messages.delete.success"));
    }

    public function restore($id){
        Post::withTrashed()->where('id', $id)->restore();
        return redirect()->route('blogs.trashes')->with('success', __("messages.restore.success"));
    }

    public function destroyAll(){
        $posts = Post::with(["categories", "tags"])->onlyTrashed()->get();
        foreach ($posts as $post){
            $post->categories()->detach();
            $post->tags()->detach();
            $post->forceDelete();
        }

        return redirect()->route('blogs.index')->with('success', __("messages.delete.success"));
    }

    public function restoreAll(){
        Post::onlyTrashed()->restore();
        return redirect()->route('blogs.index')->with('success', __("messages.restore.success"));
    }
}

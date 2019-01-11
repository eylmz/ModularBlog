<?php

namespace Modules\Tag\Http\Controllers;

use Modules\Tag\Entities\Tag;
use Modules\Tag\Http\Requests\StoreTag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tags = Tag::with('posts')->get();
        return view('tag::index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('tag::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreTag $request)
    {
        $tag = new Tag();
        $tag->fill($request->all());
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'create');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('tag::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag::edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(StoreTag $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->fill($request->all());
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('tags.index')->with('success', 'delete');
    }
}

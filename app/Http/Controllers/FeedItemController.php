<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\FeedItem;
use App\Feed;

class FeedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter=null, $offset=null)
    {
        Log::debug('offset ' . var_export($offset, true));
        Log::debug('filter ' . var_export($filter, true));
        $q = FeedItem::orderBy('feed_item_id')->limit(50);
        if ( $filter ) {
            $q->where('guid', 'like', "http://{$filter}%");
        }
        if ( ! empty($offset) ) {
            $q->offset($offset);
        }
        $posts = $q->get();
        $offset = (int)$offset;
        $offset += 50;
        $feeds = Feed::all();
        return view('feed_item.index', compact('posts', 'offset', 'filter', 'feeds'));
    }

    public function index2($offset=null)
    {
        Log::debug('offset ' . var_export($offset, true));
        
        $q = FeedItem::orderBy('feed_item_id')->limit(50);
        if ( ! empty($offset) ) {
            $q->offset($offset);
        }
        $posts = $q->get();
        $offset = (int)$offset;
        $offset += 50;
        $filter = null;
        $feeds = Feed::all();
        return view('feed_item.index', compact('posts', 'offset', 'filter', 'feeds'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

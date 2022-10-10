<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\ChannelPost;
use Illuminate\Support\Facades\{Log,Storage};

class ChannelPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $data = $request->only(['content', 'download']);
        $validator = Validator::make($data, 
        [
            'content' => 'required',
            'download' => 'boolean'
        ]);
        if ( $validator->fails() ) {          
            return response()->json(['error'=>$validator->errors()], 401);
        }
        
        $data['channel_id'] = 1;
        // dd($data);
        $channelPost = ChannelPost::create($data);
        return response()->json([
            'error' => false,
            'channelPost' => $channelPost,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // Log::debug($request->getContent());
        // Log::debug("headers " . print_r($request->header(), true));
        // Log::debug("content " . $request->input('content'));
        
        $data = $request->only(['content']);
        $validator = Validator::make($data, 
        [
            'content' => 'required',
        ]);
        // Log::debug(print_r($data, true));
        if ( $validator->fails() ) {          
            return response()->json(['error' => $validator->errors()], 400);
        }
        
        $data['channel_id'] = 1;

        // $channelPost = ChannelPost::create($data);
        Storage::disk('local')->append('data/list.txt', $data['content']);
        return response()->json([
            'message' => 'ok',
            'error' => false,            
        ], 200);
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

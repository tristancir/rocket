<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DiscordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discord = config('discord');
        $discord['rocket']['authorize_url'];
        // dd($discord['rocket']['scope']);
        $scope1 = json_decode($discord['rocket']['scope']);
        // $scope1 = json_decode("[\"a\",\"b\"]");
        // Log::debug('scope1 ' . print_r($scope1, true));
        // dd($scope1);
        $scope = implode(' ', json_decode($discord['rocket']['scope']));
        $authorizeUrl = str_replace('{scope}', $scope, $discord['rocket']['authorize_url']);
        $authorizeWebhookUrl = str_replace('{scope}', 'webhook.incoming', $discord['rocket']['authorize_url']);
        // Log::debug('discord config ' . print_r($discord, true));
        // Log::debug('token_url = ' . config('discord.token_url'));
        return view('discord.index', compact('discord', 'authorizeUrl', 'authorizeWebhookUrl'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function oauth(Request $request)
    {
        // dd($request->input('code'));
        $discord = config('discord');
        $all = $request->all();
        Log::info(json_encode($all));
        Log::debug('all = ' . print_r($request->all(), true));
        $scope = implode(' ', json_decode($discord['rocket']['scope']));
        Log::debug('scope = ' . print_r($scope, true));
        Log::debug('token_url = ' . config('discord.token_url'));
        $guzzle = new \GuzzleHttp\Client();
        $response = null;
        try {
            $response = $guzzle->request('POST', config('discord.token_url'), [
                'form_params' => [
                    'client_id' => config('discord.rocket.client_id'),
                    'client_secret' => config('discord.rocket.client_secret'),
                    'grant_type' => 'authorization_code',
                    'code' => $request->input('code'),
                    'redirect_uri' => 'https://268d5e103660.ngrok.io/discord/oauth',
                    // 'scope' => $scope,
                ]
            ]);
            Log::debug('http status code = ' . $response->getStatusCode());
            // "200"
            Log::debug('content-type = ' . $response->getHeader('content-type')[0]);
            // 'application/json; charset=utf8'
            Log::debug('body = ' . $response->getBody());
        } catch ( \GuzzleHttp\Exception\RequestException $e ) {
            Log::error($e->getMessage());
            abort(500);
        }
        return view('discord.oauth', ['response' => $response]);
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

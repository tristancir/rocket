<?php

namespace Tests\Unit\Api;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ChannelPostController;
use DB;

class ChannelPostControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function x_testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function testStoreChannelPost()
    {
        $controller = new ChannelPostController();
        $this->assertTrue(is_object($controller));
        $count1 = DB::table('channel_post')->count();
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
        DB::table('channel_post')->insert(
            [
                'content' => 'some content',
                'channel_id' => 1
                ]
            );
        $count2 = DB::table('channel_post')->count();
        $this->assertEquals($count2-1, $count1);
        $request = Request::create('/store', 'POST',[
            'content'     =>     'foo',
        ]);
        $response = $controller->store($request);
        $this->assertEquals(200, $response->getStatusCode());
        $responseBody = $response->getContent();
        $responseDecoded = json_decode($responseBody);
        $this->assertTrue( ! empty($responseDecoded));
        $this->assertFalse($responseDecoded->error);
        // dd($responseDecoded->channelPost);
    }
}

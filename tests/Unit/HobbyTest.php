<?php

namespace Tests\Unit;

use App\Models\Hobby;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HobbyTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test example.
     */

     /** @test */
     public function user_can_create_hobby(){
        $hobby = Hobby::create([
            'name' => 'test',
        ]);

        $this->assertInstanceOf(Hobby::class, $hobby);
        $this->assertEquals('test', $hobby->name);
     }

     /** @test */
     public function user_can_update_hobby(){
        $hobby = Hobby::create([
            'name' => "test1",
        ]);
        
        $hobby->update([
            'name' => "test2",
        ]);

        $this->assertInstanceOf(Hobby::class, $hobby);
        $this->assertEquals('test2', $hobby->name);
     }

     /** @test */
     public function user_can_show_detail_hobby(){
        $hobby = Hobby::create([
            'name' => 'test',
        ]);

        $detailHobby = Hobby::find($hobby->id);

        $this->assertInstanceOf(Hobby::class, $detailHobby);
        $this->assertEquals('test', $detailHobby->name);
     }

     /** @test */
     public function user_can_delete_hobby() {
        $hobby = Hobby::create([
            'name' => 'test',
        ]);
        $this->assertNotNull($hobby);
        $hobby->delete();
     }


}

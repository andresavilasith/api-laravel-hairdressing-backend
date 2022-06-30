<?php

namespace Tests\Feature;

use App\Models\Attention;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttentionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function default_data()
    {
        $this->withExceptionHandling();

        Attention::factory(10)->create();
    }

    /** @test */
    public function test_attention_index()
    {

        $this->default_data();

        $response = $this->getJson('/api/attention');

        $attentions = Attention::paginate(5);

        $response->assertOk();

        $response->assertJsonStructure(['attentions', 'status']);
    }

    /** @test */
    public function test_attention_show()
    {

        $this->default_data();

        $attention = Attention::first();

        $response = $this->getJson('/api/attention/' . $attention->id);

        $response->assertOk();

        $response->assertJsonStructure(['attention', 'status']);
    }

    /** @test */
    public function test_attention_create()
    {

        $this->default_data();

        $response = $this->getJson('/api/attention');

        $response->assertOk();

        $response->assertJsonStructure([
            'status'
        ])->assertStatus(200);
    }


    /** @test  */
    public function test_attention_store()
    {
        $this->default_data();

        $name = 'Corte de pelo';
        $tackled = 1;


        $response = $this->postJson('/api/attention', [
            'name' => $name,
            'tackled' => $tackled,
        ]);

        $response->assertOk();

        $this->assertCount(11, Attention::all());

        $attention = Attention::latest('id')->first();

        $this->assertEquals($attention->name, $name);
        $this->assertEquals($attention->tackled, $tackled);

        $response->assertJsonStructure([
            'attention',
            'status',
            'message'
        ])->assertStatus(200);
    }

    /** @test */
    public function test_attention_edit()
    {

        $this->default_data();


        $attention = Attention::first();

        $response = $this->getJson('/api/attention/' . $attention->id . '/edit');

        $response->assertOk();

        $response->assertJsonStructure(['attention', 'status'])->assertStatus(200);
    }

    /** @test */
    public function test_attention_update()
    {

        $this->default_data();

        $attention = Attention::first();

        $name = 'Manicure';
        $tackled = 0;

        $response = $this->putJson('/api/attention/' . $attention->id, [
            'name' => $name,
            'tackled' => $tackled,
        ]);

        $response->assertOk();

        $this->assertCount(10, Attention::all());

        $attention = $attention->fresh();

        $this->assertEquals($attention->name, $name);
        $this->assertEquals($attention->tackled, $tackled);

        $response->assertJsonStructure(['attention', 'status', 'message'])->assertStatus(200);
    }

    /** @test */
    public function test_attention_destroy()
    {

        $this->default_data();

        $attention = Attention::first();

        $response = $this->deleteJson('/api/attention/' . $attention->id);

        $response->assertOk();

        $this->assertCount(9, Attention::all());

        $response->assertJsonStructure(['status', 'message', 'attentions'])->assertStatus(200);
    }
}

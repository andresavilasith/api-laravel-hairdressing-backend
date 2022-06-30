<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Date;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DateControllerTest extends TestCase
{
    use RefreshDatabase;

    public function default_data()
    {
        $this->withExceptionHandling();
        
        Date::factory(10)->create();
        Client::factory(2)->create();
    }

    /** @test */
    public function test_date_index()
    {

        $this->default_data();

        $response = $this->getJson('/api/date');

        $dates = Date::paginate(5);

        $response->assertOk();

        $response->assertJsonStructure(['dates', 'status']);
    }

    /** @test */
    public function test_date_show()
    {

        $this->default_data();

        $date = Date::first();

        $response = $this->getJson('/api/date/' . $date->id);

        $response->assertOk();

        $response->assertJsonStructure(['date', 'status']);
    }

    /** @test */
    public function test_date_create()
    {

        $this->default_data();

        $response = $this->getJson('/api/date');

        $response->assertOk();

        $response->assertJsonStructure([
            'status'
        ])->assertStatus(200);
    }


    /** @test  */
    public function test_date_store()
    {

        $this->default_data();


        $client_id = Client::first()->id;
        $name = 'Arreglos varios';
        $reserved_date = '2022-07-15';
     


        $response = $this->postJson('/api/date', [
            'client_id' => $client_id,
            'name' => $name,
            'reserved_date' => $reserved_date,
        ]);

        $response->assertOk();

        $this->assertCount(11, Date::all());

        $date = Date::latest('id')->first();

        $this->assertEquals($date->client_id, $client_id);
        $this->assertEquals($date->name, $name);
        $this->assertEquals($date->reserved_date, $reserved_date);

        $response->assertJsonStructure([
            'date',
            'status',
            'message'
        ])->assertStatus(200);
    }

    /** @test */
    public function test_date_edit()
    {

        $this->default_data();


        $date = Date::first();

        $response = $this->getJson('/api/date/' . $date->id . '/edit');

        $response->assertOk();

        $response->assertJsonStructure(['date', 'status'])->assertStatus(200);
    }

    /** @test */
    public function test_date_update()
    {

        $this->default_data();

        $date = Date::first();

        $client_id = Client::first()->id;
        $name = 'Arreglos varios';
        $reserved_date = '2022-07-15';

        $response = $this->putJson('/api/date/' . $date->id, [
            'client_id' => $client_id,
            'name' => $name,
            'reserved_date' => $reserved_date,
        ]);

        $response->assertOk();

        $this->assertCount(10, Date::all());

        $date = $date->fresh();

        $this->assertEquals($date->client_id, $client_id);
        $this->assertEquals($date->name, $name);
        $this->assertEquals($date->reserved_date, $reserved_date);

        $response->assertJsonStructure(['date', 'status', 'message'])->assertStatus(200);
    }

    /** @test */
    public function test_date_destroy()
    {

        $this->default_data();


        $date = Date::first();

        $response = $this->deleteJson('/api/date/' . $date->id);

        $response->assertOk();

        $this->assertCount(9, Date::all());

        $response->assertJsonStructure(['status', 'message', 'dates'])->assertStatus(200);
    }
}

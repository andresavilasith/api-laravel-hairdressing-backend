<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;

    public function default_data()
    {
        $this->withExceptionHandling();
        
        Client::factory(10)->create();
    }

    /** @test */
    public function test_client_index()
    {

        $this->default_data();

        $response = $this->getJson('/api/client');

        $clients = Client::paginate(5);

        $response->assertOk();

        $response->assertJsonStructure(['clients', 'status']);
    }

    /** @test */
    public function test_client_show()
    {

        $this->default_data();

        $client = Client::first();

        $response = $this->getJson('/api/client/' . $client->id);

        $response->assertOk();

        $response->assertJsonStructure(['client', 'status']);
    }

    /** @test */
    public function test_client_create()
    {

        $this->default_data();

        $response = $this->getJson('/api/client');

        $response->assertOk();

        $response->assertJsonStructure([
            'status'
        ])->assertStatus(200);
    }


    /** @test  */
    public function test_client_store()
    {

        $this->default_data();


        $identification = '010425698';
        $name = 'Maria Brown';
        $phone = '099554265';
        $address = 'Sidcay';
        $email = 'maria@gmail.com';


        $response = $this->postJson('/api/client', [
            'identification' => $identification,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'email' => $email,
        ]);

        $response->assertOk();

        $this->assertCount(11, Client::all());

        $client = Client::latest('id')->first();

        $this->assertEquals($client->identification, $identification);
        $this->assertEquals($client->name, $name);
        $this->assertEquals($client->phone, $phone);
        $this->assertEquals($client->address, $address);
        $this->assertEquals($client->email, $email);

        $response->assertJsonStructure([
            'client',
            'status',
            'message'
        ])->assertStatus(200);
    }

    /** @test */
    public function test_client_edit()
    {

        $this->default_data();


        $client = Client::first();

        $response = $this->getJson('/api/client/' . $client->id . '/edit');

        $response->assertOk();

        $response->assertJsonStructure(['client', 'status'])->assertStatus(200);
    }

    /** @test */
    public function test_client_update()
    {

        $this->default_data();

        $client = Client::first();

        $identification = '010425698';
        $name = 'Diana Flores';
        $phone = '0995545465';
        $address = 'Av. Panamericana';
        $email = 'diana@gmail.com';

        $response = $this->putJson('/api/client/' . $client->id, [
            'identification' => $identification,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'email' => $email,
        ]);

        $response->assertOk();

        $this->assertCount(10, Client::all());

        $client = $client->fresh();

        $this->assertEquals($client->identification, $identification);
        $this->assertEquals($client->name, $name);
        $this->assertEquals($client->phone, $phone);
        $this->assertEquals($client->address, $address);
        $this->assertEquals($client->email, $email);

        $response->assertJsonStructure(['client', 'status', 'message'])->assertStatus(200);
    }

    /** @test */
    public function test_client_destroy()
    {

        $this->default_data();


        $client = Client::first();

        $response = $this->deleteJson('/api/client/' . $client->id);

        $response->assertOk();

        $this->assertCount(9, Client::all());

        $response->assertJsonStructure(['status', 'message', 'clients'])->assertStatus(200);
    }
}

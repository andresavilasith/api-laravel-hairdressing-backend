<?php

namespace Database\Seeders;

use App\Models\Attention;
use App\Models\Client;
use App\Models\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Desacticar todas las claves foraneas
        DB::statement('SET foreign_key_checks=0');
        //Truncar o vaciar las tablas
        DB::table('attention_date')->truncate();
        Client::truncate();
        Date::truncate();
        Attention::truncate();

        Client::create([
            'identification' => '0106585466',
            'name' => 'User One',
            'phone' => '092515875',
            'address' => 'Gral. Torres',
            'email' => 'user1@gmail.com'
        ]);

        Client::create([
            'identification' => '010255666',
            'name' => 'User Two',
            'phone' => '0925615875',
            'address' => 'Vega munoz',
            'email' => 'user2@gmail.com'
        ]);

        $date1 = Date::create([
            'client_id' => 1,
            'name' => 'Primera cita',
            'reserved_date' => '2022-06-15',
        ]);

        $date2 = Date::create([
            'client_id' => 2,
            'name' => 'Segunda cita',
            'reserved_date' => '2022-06-20',
        ]);

        $attention_all = [];
        $attention_all2 = [];

        $attention = Attention::create([
            'name' => 'Corte de pelo',
        ]);

        $attention_all[] = $attention->id;
        $attention_all2[] = $attention->id;

        $attention = Attention::create([
            'name' => 'Manicure',
        ]);
        $attention_all[] = $attention->id;

        $attention = Attention::create([
            'name' => 'Pedicuref',
        ]);



        $attention_all[] = $attention->id;


        $date1->attentions()->sync($attention_all);
        $date2->attentions()->sync($attention_all2);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\Bank;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
          'name'=>'client 1',
          'mobile'=>'01111111111',
          'email'=>'client1@client.com',
          'dateBirth'=>'dateBirth 1',
          'area'=>'area 1',
          'block'=>0,
          'active'=>0,
          'gender'=>'male',
        ]);
        Client::create([
          'name'=>'client 2',
          'mobile'=>'02222222222',
          'email'=>'client2@client.com',
          'dateBirth'=>'dateBirth 2',
          'area'=>'area 2',
          'block'=>0,
          'active'=>0,
          'gender'=>'male',
        ]);
        Client::create([
          'name'=>'client 3',
          'mobile'=>'03333333333',
          'email'=>'client3@client.com',
          'dateBirth'=>'dateBirth 3',
          'area'=>'area 3',
          'block'=>0,
          'active'=>0,
          'gender'=>'female',
        ]);
        Client::create([
          'name'=>'client 4',
          'mobile'=>'04444444444',
          'email'=>'client4@client.com',
          'dateBirth'=>'dateBirth 4',
          'area'=>'area 4',
          'block'=>0,
          'active'=>0,
          'gender'=>'female',
        ]);
        Client::create([
          'name'=>'client 5',
          'mobile'=>'05555555555',
          'email'=>'client5@client.com',
          'dateBirth'=>'dateBirth 5',
          'area'=>'area 5',
          'block'=>0,
          'active'=>0,
          'gender'=>'female',
        ]);

    }
}

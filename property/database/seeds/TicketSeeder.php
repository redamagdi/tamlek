<?php

use Illuminate\Database\Seeder;
use App\Ticket;
class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
          'client_id'=>1,
          'route_id'=>2,
        ]);
        Ticket::create([
          'client_id'=>2,
          'route_id'=>3,
        ]);
        Ticket::create([
          'client_id'=>2,
          'route_id'=>3,
        ]);
        Ticket::create([
          'client_id'=>4,
          'route_id'=>5,
        ]);
        Ticket::create([
          'client_id'=>1,
          'route_id'=>4,
        ]);
        Ticket::create([
          'client_id'=>3,
          'route_id'=>2,
        ]);
        Ticket::create([
          'client_id'=>1,
          'route_id'=>5,
        ]);
        Ticket::create([
          'client_id'=>4,
          'route_id'=>1,
        ]);
        Ticket::create([
          'client_id'=>5,
          'route_id'=>2,
        ]);
        Ticket::create([
          'client_id'=>1,
          'route_id'=>5,
        ]);
    }
}

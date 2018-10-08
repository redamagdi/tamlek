<?php

use Illuminate\Database\Seeder;
use App\Route;
class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Route::create([
          'source'=>'source 1',
          'destination'=>'destination 1',
          'driverName'=>'driverName 1',
          'date'=>'date 1',
          'startAt'=>'startAt 1',
          'endAt'=>'endAt 1'
        ]);
        Route::create([
          'source'=>'source 2',
          'destination'=>'destination 2',
          'driverName'=>'driverName 2',
          'date'=>'date 2',
          'startAt'=>'startAt 2',
          'endAt'=>'endAt 2'
        ]);
        Route::create([
          'source'=>'source 3',
          'destination'=>'destination 3',
          'driverName'=>'driverName 3',
          'date'=>'date 3',
          'startAt'=>'startAt 3',
          'endAt'=>'endAt 3'
        ]);
        Route::create([
          'source'=>'source 4',
          'destination'=>'destination 4',
          'driverName'=>'driverName 4',
          'date'=>'date 4',
          'startAt'=>'startAt 4',
          'endAt'=>'endAt 4'
        ]);
        Route::create([
          'source'=>'source 1',
          'destination'=>'destination 1',
          'driverName'=>'driverName 1',
          'date'=>'date 1',
          'startAt'=>'startAt 1',
          'endAt'=>'endAt 1'
        ]);
    }
}

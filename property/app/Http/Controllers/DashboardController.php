<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Client;
use Carbon;

class DashboardController extends Controller
{
    public function index()
    {
      $tickets=Ticket::all();
      $maleSolid=0;
      $femaleSolid=0;
      $cost=0;
      foreach($tickets as $ticket)
      {
        $cost=$cost+$ticket->cost;
        if($ticket->client->gender=="male")
        $maleSolid++;
        else
        $femaleSolid++;
      }
      $ticketsCount=$tickets->count();
      return view('admin.dashboard.index',compact('ticketsCount','maleSolid','femaleSolid','cost'));
    }
    public function getDashboard()
    {
      $time=$_GET['time'];
      $currentDate = Carbon::now();
      $week = $currentDate->subDays(7);
      $month=$currentDate->subDays(30);
      if($time=="today")
      {
        $tickets = Ticket::whereDate('created_at', Carbon::today())->get();
      }
      if($time=="lastWeek")
      {
        $tickets = Ticket::whereDate('created_at','<=',Carbon::today())->whereDate('created_at','>=',$week)->get();
      }
      if($time=="lastMonth")
      {
        $tickets = Ticket::whereDate('created_at','<=',Carbon::today())->whereDate('created_at','>=',$month)->get();
      }
      $ticketsCount=$tickets->count();
      $maleSolid=0;
      $femaleSolid=0;
      $cost=0;
      foreach($tickets as $ticket)
      {
        $cost=$cost+$ticket->cost;
        if($ticket->client->gender=="male")
        $maleSolid++;
        else
        $femaleSolid++;
      }
      $data=$ticketsCount."*".$maleSolid."*".$femaleSolid."*".$cost;
      return $data;
    }
    function getDashboardCustom()
    {
      $date=$_GET['date'];
      $dateArray=explode("*",$date);
      $from=$dateArray[0];
      $to=$dateArray[1];
      $tickets = Ticket::whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->get();
      $ticketsCount=$tickets->count();
      $maleSolid=0;
      $femaleSolid=0;
      $cost=0;
      foreach($tickets as $ticket)
      {
        $cost=$cost+$ticket->cost;
        if($ticket->client->gender=="male")
        $maleSolid++;
        else
        $femaleSolid++;
      }
      $data=$ticketsCount."*".$maleSolid."*".$femaleSolid."*".$cost;
      return $data;
    }
}

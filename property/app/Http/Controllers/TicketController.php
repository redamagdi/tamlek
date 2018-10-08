<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Client;
use App\Route;
use Validator;
class TicketController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $tickets=Ticket::paginate(10);
      return view('admin.tickets.index',compact('tickets'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.tickets.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'source' => 'required',
        'destination'=>'required',
        'date'=>'required',
        'startAt'=>'required',
        'endAt'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
    return redirect()->route('tickets.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $ticket=Ticket::find($id);
    $routes=Route::all();
    return view('admin.tickets.edit',compact('ticket','clients','routes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
        'route'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

      $ticket=Ticket::find($id);
      $ticket->route_id=$request->route;
      $ticket->save();
      return redirect()->route('tickets.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Ticket::find($id)->delete();
    return redirect()->back();
  }
  public function active($id,$active)
  {
    $ticket=Ticket::find($id);
    $ticket->active=$active;
    $ticket->save();
    return redirect()->back();
  }
}

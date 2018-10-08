<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use Validator;
class RouteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $routes=Route::paginate(10);
      return view('admin.routes.index',compact('routes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.routes.create');
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
        'name'=>'required',
        'source' => 'required',
        'destination'=>'required',
        'date'=>'required',
        'startAt'=>'required',
        'endAt'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
    Route::create([
      'name'=>$request->name,
      'source'=>$request->source,
      'destination'=>$request->destination,
      'date'=>$request->date,
      'startAt'=>$request->startAt,
      'endAt'=>$request->endAt,
      'driverName'=>$request->driverName,
    ]);
    return redirect()->route('routes.index');
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
    $route=Route::find($id);
    return view('admin.routes.edit',compact('route'));
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
        'name'=>'required',
        'source' => 'required',
        'destination'=>'required',
        'date'=>'required',
        'startAt'=>'required',
        'endAt'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

      $route=Route::find($id);
      $route->name=$request->name;
      $route->source=$request->source;
      $route->destination=$request->destination;
      $route->date=$request->date;
      $route->startAt=$request->startAt;
      $route->endAt=$request->endAt;
      $route->save();
      return redirect()->route('routes.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Route::find($id)->delete();
    return redirect()->back();
  }
}

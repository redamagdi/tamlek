<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use Validator;
class CityController extends Controller
{
  public function index()
  {
    $city=City::paginate(20);
    return view('admin.city.index',compact('city'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $state=Country::all();
    return view('admin.city.create',compact('state'));
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
        'state'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
      $city=City::create(
        [
          'name'=>$request->name,
          'country_id'=>$request->state,
        ]);
      return redirect()->route('city.index');
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
    $city=City::find($id);
    $state=Country::all();
    return view('admin.city.edit',compact('state','city'));
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
        'state'=>'required'
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
    $city=City::find($id);
    $city->name=$request->name;
    $city->country_id=$request->state;
    $city->save();
    return redirect()->route('city.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    User::find($id)->delete();
    return redirect()->route('users.index');
  }
}

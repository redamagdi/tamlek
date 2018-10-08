<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Validator;
use App\Region;

class RegionController extends Controller
{
  public function index()
  {
    $region=Region::paginate(20);
    return view('admin.region.index',compact('region'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $city=City::all();
    return view('admin.region.create',compact('city'));
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
        'city'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
      $region=Region::create(
        [
          'name'=>$request->name,
          'city_id'=>$request->city,
        ]);
      return redirect()->route('region.index');
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
    $region=Region::find($id);
    $city=City::all();
    return view('admin.region.edit',compact('region','city'));
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
        'city'=>'required'
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
    $region=Region::find($id);
    $region->name=$request->name;
    $region->city_id=$request->city;
    $region->save();
    return redirect()->route('region.index');
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

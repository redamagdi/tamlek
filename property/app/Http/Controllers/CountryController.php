<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Validator;
class CountryController extends Controller
{
  public function index()
  {
    $country=Country::paginate(20);
    return view('admin.Country.index',compact('country'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.country.create');
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
        'name'=>'required'
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
      $country=Country::create(
        [
          'name'=>$request->name,
        ]);
      return redirect()->route('country.index');
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
    $country=Country::find($id);
    return view('admin.country.edit',compact('country'));
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
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
    $country=Country::find($id);
    $country->name=$request->name;
    $country->save();
    return redirect()->route('country.index');
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
  public function activate($id,$active)
  {
    $user=User::find($id);
    $user->active=$active;
    $user->save();
    return redirect()->back();
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
use Validator;
class StateController extends Controller
{
  public function index()
  {
    $state=State::paginate(20);
    return view('admin.state.index',compact('state'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $country=Country::all();
    return view('admin.state.create',compact('country'));
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
        'country'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
      $state=State::create(
        [
          'name'=>$request->name,
          'country_id'=>$request->country,
        ]);
      return redirect()->route('state.index');
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
    $state=State::find($id);
    $country=Country::all();
    return view('admin.state.edit',compact('state','country'));
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
        'country'=>'required'
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
    $state=State::find($id);
    $state->name=$request->name;
    $state->country_id=$request->country;
    $state->save();
    return redirect()->route('state.index');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;
class PageController extends Controller
{
  public function index()
  {
    $page=Page::paginate(20);
    return view('admin.page.index',compact('page'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.page.create');
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
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
      $page=Page::create(
        [
          'name'=>$request->name,
        ]);
      return redirect()->route('page.index');
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
    $page=Page::find($id);
    return view('admin.page.edit',compact('page'));
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
    $page=Page::find($id);
    $page->name=$request->name;
    $page->save();
    return redirect()->route('page.index');
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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Ad;
use App\Page;
use Validator;

class AdController extends Controller
{
  public function index()
  {
    $ads=Ad::paginate(20);
    return view('admin.ads.index',compact('ads'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $page=Page::all();
    return view('admin.ads.create',compact('page'));
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
        'image'=>'required',
        'page'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
    $destinationPath = 'uploads';
    $file=$request->file('image');
    $ad=new Ad;
    $ad->header=$request->name;
    if($file != "")
    {
      $file->move($destinationPath,$file->getClientOriginalName());
      $ad->image=$destinationPath."/".$file->getClientOriginalName();
    }
    $ad->page_id=$request->page;
    $ad->save();
    return redirect()->route('ads.index');
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
    $ad=Ad::find($id);
    $page=Page::all();
    return view('admin.ads.edit',compact('ad','page'));
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
        'page'=>'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }
    $destinationPath = 'uploads';
    $file=$request->file('image');
    $ad=Ad::find($id);
    $ad->header=$request->name;
    if($file != "")
    {
      $file->move($destinationPath,$file->getClientOriginalName());
      $ad->image=$destinationPath."/".$file->getClientOriginalName();
    }
    $ad->page_id=$request->page;
    $ad->save();
    return redirect()->route('ads.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Ad::find($id)->delete();
    return redirect()->route('ads.index');
  }
}

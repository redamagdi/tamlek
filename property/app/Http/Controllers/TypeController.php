<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\TypeName;
use App\Http\Requests\TypeRequest;
class TypeController extends Controller
{
  public function index()
  {
    $types=Type::paginate(20);
    return view('admin.type.index',compact('types'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.type.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(TypeRequest $request)
  {
      $type=new Type;
      $type->save();
      $typeId=$type->id;
      $typeName=new TypeName;
      $typeName->name=$request->nameEn;
      $typeName->lang="en";
      $typeName->type_id=$typeId;
      $typeName->save();
      $typeName=new TypeName;
      $typeName->name=$request->nameAr;
      $typeName->lang="ar";
      $typeName->type_id=$typeId;
      $typeName->save();
      return redirect()->route('type.index');
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
    $type=Type::find($id);
    return view('admin.type.edit',compact('type'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(TypeRequest $request, $id)
  {
    TypeName::where('type_id',$id)->delete();
    $typeName=new TypeName;
    $typeName->name=$request->nameEn;
    $typeName->lang="en";
    $typeName->type_id=$id;
    $typeName->save();
    $typeName=new TypeName;
    $typeName->name=$request->nameAr;
    $typeName->lang="ar";
    $typeName->type_id=$id;
    $typeName->save();
    return redirect()->route('type.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Type::find($id)->delete();
    return redirect()->route('type.index');
  }

}

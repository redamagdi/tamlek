<?php

namespace App\Http\Controllers;
use App\Http\Requests\FatureRequest;
use Illuminate\Http\Request;
use App\Feature;
use App\FeatureName;
class FeatureController extends Controller
{
  public function index()
  {
    $features=Feature::paginate(20);
    return view('admin.feature.index',compact('features'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.feature.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(FatureRequest $request)
  {
      $feature=new Feature;
      $feature->save();
      $featureId=$feature->id;
      $featureName=new FeatureName;
      $featureName->name=$request->nameEn;
      $featureName->lang="en";
      $featureName->feature_id=$featureId;
      $featureName->save();
      $featureName=new FeatureName;
      $featureName->name=$request->nameAr;
      $featureName->lang="ar";
      $featureName->feature_id=$featureId;
      $featureName->save();
      return redirect()->route('feature.index');
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
    $feature=Feature::find($id);
    return view('admin.feature.edit',compact('feature'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(FatureRequest $request, $id)
  {
    FeatureName::where('feature_id',$id)->delete();
    $typeName=new FeatureName;
    $typeName->name=$request->nameEn;
    $typeName->lang="en";
    $typeName->feature_id=$id;
    $typeName->save();
    $typeName=new FeatureName;
    $typeName->name=$request->nameAr;
    $typeName->lang="ar";
    $typeName->feature_id=$id;
    $typeName->save();
    return redirect()->route('feature.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Feature::find($id)->delete();
    return redirect()->route('feature.index');
  }

}

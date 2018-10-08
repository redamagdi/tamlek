<?php

namespace App\Http\Controllers;
use App\Http\Requests\PropertyRequest;
use Illuminate\Http\Request;
use App\Property;
use App\Type;
use App\Region;
use App\Feature;
use Auth;
use App\PropertyDescription;
use App\PropertyHeader;
use App\PropertyLabel;
use Illuminate\Support\Facades\Input;
use App\PropertyImage;
class PropertyController extends Controller
{
  public function index()
  {
    $property=Property::paginate(20);
    return view('admin.property.index',compact('property'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $types=Type::all();
    $regions=Region::all();
    $feature=Feature::all();
    return view('admin.property.create',compact('types','regions','feature'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PropertyRequest $request)
  {
    $property=Property::create([
      'cost'=>$request->cost,
      'type_id'=>$request->type,
      'reference'=>$request->reference,
      'room'=>$request->room,
      'bathroom'=>$request->bathroom,
      'map'=>$request->map,
      'user_id'=>Auth::user()->id,
      'region_id'=>$request->region,
      'area'=>$request->area,
      'type'=>$request->display
    ]);
    $propertyId=$property->id;
    PropertyDescription::create([
        'name'=>$request->descEn,
        'lang'=>'en',
        'property_id'=>$propertyId
    ]);
    PropertyDescription::create([
        'name'=>$request->descAr,
        'lang'=>'ar',
        'property_id'=>$propertyId
    ]);
    PropertyHeader::create([
      'name'=>$request->headerEn,
      'lang'=>'en',
      'property_id'=>$propertyId
    ]);
    PropertyHeader::create([
      'name'=>$request->headerAr,
      'lang'=>'ar',
      'property_id'=>$propertyId
    ]);
    PropertyLabel::create([
      'name'=>$request->labelEn,
      'lang'=>'en',
      'property_id'=>$propertyId
    ]);
    PropertyLabel::create([
      'name'=>$request->labelAr,
      'lang'=>'ar',
      'property_id'=>$propertyId
    ]);
    $packages=Input::get('feature');
    $property->feature()->attach($packages);
    $destinationPath="uploads/";
    if($files=$request->file('Images'))
    {
    	foreach($files as $file)
      {
    	   $name=$file->getClientOriginalName();
    	   $file->move($destinationPath,$file->getClientOriginalName());
    	   $img=new PropertyImage;
    	   $img->property_id=$propertyId;
    	   $img->path=$destinationPath.$file->getClientOriginalName();
    	   $img->save();
    	}
    }

    return redirect()->route('property.index');
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
    $property=Property::find($id);

    $types=Type::all();
    $regions=Region::all();
    $feature=Feature::all();
    return view('admin.property.edit',compact('property','types','regions','feature'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(PropertyRequest $request, $id)
  {

    $property=Property::find($id);
    $property->cost=$request->cost;
    $property->type_id=$request->type;
    $property->reference=$request->reference;
    $property->room=$request->room;
    $property->bathroom=$request->bathroom;
    $property->map=$request->map;
    $property->user_id=Auth::user()->id;
    $property->region_id=$request->region;
    $property->area=$request->area;
    $property->type=$request->display;
    $property->save();
    PropertyDescription::where('property_id',$id)->delete();
    PropertyDescription::create([
        'name'=>$request->descEn,
        'lang'=>'en',
        'property_id'=>$id
    ]);
    PropertyDescription::create([
        'name'=>$request->descAr,
        'lang'=>'ar',
        'property_id'=>$id
    ]);
    PropertyHeader::where('property_id',$id)->delete();
    PropertyHeader::create([
      'name'=>$request->headerEn,
      'lang'=>'en',
      'property_id'=>$id
    ]);
    PropertyHeader::create([
      'name'=>$request->headerAr,
      'lang'=>'ar',
      'property_id'=>$id
    ]);
    PropertyLabel::where('property_id',$id)->delete();
    PropertyLabel::create([
      'name'=>$request->labelEn,
      'lang'=>'en',
      'property_id'=>$id
    ]);
    PropertyLabel::create([
      'name'=>$request->labelAr,
      'lang'=>'ar',
      'property_id'=>$id
    ]);
    $packages=Input::get('feature');
    $property->feature()->sync($packages);
    $destinationPath="uploads/";
    if($files=$request->file('Images'))
    {
    	foreach($files as $file)
      {
    	   $name=$file->getClientOriginalName();
    	   $file->move($destinationPath,$file->getClientOriginalName());
    	   $img=new PropertyImage;
    	   $img->property_id=$id;
    	   $img->path=$destinationPath.$file->getClientOriginalName();
    	   $img->save();
    	}
    }
    return redirect()->route('property.index');
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
  public function deleteImage()
  {
    $id=$_GET['data'];
    PropertyImage::find($id)->delete();
    return $id;
  }
  public function recommend($id,$state)
  {
    echo $id;
    $property=Property::find($id);
    $property->recommend=$state;
    $property->save();
    return redirect()->back();
  }
}

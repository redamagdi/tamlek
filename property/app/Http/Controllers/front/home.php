<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\City;
use App\Type;
use App\Property;
use App\PropertyDescription;
use DB;
class home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities              =  City::all();
        $propertytypes       =  Type::all();
        $regoinsearchinput[] = 0;
        $citysearchinput[]   = 0;
        $allinfo             = "";
        $maxmumbed   = Property::max('room');
        $minmumbed   = Property::min('room');
        $maxmumarea  = Property::max('area');
        $minmumarea  = Property::min('area');
        $maxmumprice = Property::max('cost');
        $minmumprice = Property::min('cost');
        
        return View('front.index',compact('cities','propertytypes','regoinsearchinput','citysearchinput','allinfo','maxmumbed','minmumbed','maxmumarea','minmumarea','maxmumprice','minmumprice'));
    }

    
    public function searchproperty()
    {
        
        $regoinsearchinput[] = 0;
        $citysearchinput[] = 0;
        
        $builder = Property::query();
        //$allinfo = $request->all();
        $allinfo['properitytype_id'] = Input::get('properitytype_id');

        $allinfo['citiesandregions'] = Input::get('citiesandregions');
        $allinfo['propertystat'] = Input::get('propertystat');
        $allinfo['minprice'] = Input::get('minprice');
        $allinfo['maxprice'] = Input::get('maxprice');
        $allinfo['minbed'] = Input::get('minbed');
        $allinfo['maxbed'] = Input::get('maxbed');
        $allinfo['maxarea'] = Input::get('maxarea');
        $allinfo['keyword'] = Input::get('keyword');

/**************** cites and regoins **********/ 
         $searchCities   = collect();
         $regoinflagtest = 0;
         $cityflagtest = 0;
        if(!empty($allinfo['citiesandregions'])){

            $regoinid[] = 0;
            $searchCities = collect();

            foreach($allinfo['citiesandregions'] as $result){
            $result_explode = explode('|', $result);
            if($result_explode[1] == 0 ){
                  // regoin
              $regoinid[]          = $result_explode[0];
              $regoinsearchinput[] = $result_explode[0];
              $regoinflagtest = 1;
            }
            if($result_explode[1] == 1 ){
                  // city
                $regoinflagtest = 2;
                $cityflagtest = 1;
                $city = City::find($result_explode[0]);
                // $searchCities->make($city);
                $searchCities->push($city);
                $citysearchinput[] = $result_explode[0];

                foreach($city->regions as $regoin){
                  $regoinid[] = $regoin['id'];
                }                
             }
            }

            $builder->whereIn('region_id',$regoinid);
             // search about cities and regions
        }

/**************** cites and regoins **********/        


        if(!empty($allinfo['properitytype_id'])){
            // search about property type
            $builder->where('type_id','=',$allinfo['properitytype_id']);
        }
         
        if(!empty($allinfo['propertystat'])){
            // search about property type
            $builder->where('propertystat','=',$allinfo['propertystat']);
        }

        if($allinfo['propertystat'] == 0 && ( $allinfo['propertystat'] != null )){
            // search about property type
            $builder->where('propertystat','=',$allinfo['propertystat']);
        }

           // search about cost max and min
        if(!empty($allinfo['minprice']) && !empty($allinfo['maxprice'])){
            $builder->where('cost','<=',$allinfo['maxprice'])
            ->where('cost','>=',$allinfo['minprice']);
        }else{

            if(!empty($allinfo['maxprice'])){

            $builder->where('cost','<=',$allinfo['maxprice']);
            

               }

            if(!empty($allinfo['minprice'])){
               $builder->where('cost','>=',$allinfo['minprice']);
               }   
         }

           // End of search about cost max and min

         // search about bed max and min
        if(!empty($allinfo['minbed']) && !empty($allinfo['maxbed'])){

            $builder->where('room','<=',$allinfo['maxbed'])
            ->where('room','>=',$allinfo['minbed']);
        }else{

            if(!empty($allinfo['maxbed'])){
            $builder->where('room','<=',$allinfo['maxbed']);
               }

            if(!empty($allinfo['minbed'])){
               $builder->where('room','>=',$allinfo['minbed']);
            }   
         }

           // End of search about cost max and min
       
       if(!empty($allinfo['maxarea'])){
            $builder->where('area','<=',$allinfo['maxarea']);
        }
        
        if(!empty($allinfo['keyword'])){
            $prodescions = PropertyDescription::where('name','like','%'.$allinfo['keyword'].'%')
                  ->get();
               
             $prodids[] = 0;     
             foreach($prodescions as $prodiscription){
                     $prodids[] = $prodiscription['property_id'];
                 }
                      
            $builder->whereIn('id',$prodids);
        }

     $properties    = $builder->orderBy('type', 'DESC')->paginate(10)->setpath('');
     $properties->appends($allinfo);
     $cities        =  City::all();
     $propertytypes =  Type::all();
     $vipproperty =  $builder->where('type','=','2')->paginate(2);

     $maxmumbed   = Property::max('room');
     $minmumbed   = Property::min('room');
     $maxmumarea  = Property::max('area');
     $minmumarea  = Property::min('area');
     $maxmumprice = Property::max('cost');
     $minmumprice = Property::min('cost');

     $typscounts = collect();
     if( ($regoinflagtest == 1) && ($cityflagtest != 1)){
       
       $typscounts = DB::table('properties')
                 ->select('type_id', DB::raw('count(*) as total'))
                 ->groupBy('type_id')
                 ->whereIn('region_id',$regoinid)
                 ->get();   
             
     }

        return View('front.searchresualt',compact('cities','propertytypes','properties','searchCities','vipproperty','regoinsearchinput','citysearchinput','allinfo','maxmumbed','minmumbed','maxmumarea','minmumarea','maxmumprice','minmumprice','allinfoencode','typscounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sortedby($flag)
    {

        $regoinsearchinput[] = 0;
        $citysearchinput[] = 0;
        
        
        $builder = Property::query();
        $allinfo['properitytype_id'] = Input::get('properitytype_id');

        $allinfo['citiesandregions'] = Input::get('citiesandregions');
        $allinfo['propertystat'] = Input::get('propertystat');
        $allinfo['minprice'] = Input::get('minprice');
        $allinfo['maxprice'] = Input::get('maxprice');
        $allinfo['minbed'] = Input::get('minbed');
        $allinfo['maxbed'] = Input::get('maxbed');
        $allinfo['maxarea'] = Input::get('maxarea');
        $allinfo['keyword'] = Input::get('keyword');
/**************** cites and regoins **********/ 
         $searchCities   = collect();
         $regoinflagtest = 0;
         $cityflagtest = 0;
        if(!empty($allinfo['citiesandregions'])){

            $regoinid[] = 0;
            $searchCities = collect();

            foreach($allinfo['citiesandregions'] as $result){
            $result_explode = explode('|', $result);
            if($result_explode[1] == 0 ){
                  // regoin
              $regoinid[]          = $result_explode[0];
              $regoinsearchinput[] = $result_explode[0];
              $regoinflagtest = 1;
            }
            if($result_explode[1] == 1 ){
                  // city
                $regoinflagtest = 2;
                $cityflagtest = 1;
                $city = City::find($result_explode[0]);
                // $searchCities->make($city);
                $searchCities->push($city);
                $citysearchinput[] = $result_explode[0];

                foreach($city->regions as $regoin){
                  $regoinid[] = $regoin['id'];
                }                
             }
            }

            $builder->whereIn('region_id',$regoinid);
             // search about cities and regions
        }

/**************** cites and regoins **********/        


        if(!empty($allinfo['properitytype_id'])){
            // search about property type
            $builder->where('type_id','=',$allinfo['properitytype_id']);
        }
         
        if(!empty($allinfo['propertystat'])){
            // search about property type
            $builder->where('propertystat','=',$allinfo['propertystat']);
        }

        if($allinfo['propertystat'] == 0 && ( $allinfo['propertystat'] != null )){
            // search about property type
            $builder->where('propertystat','=',$allinfo['propertystat']);
        }

           // search about cost max and min
        if(!empty($allinfo['minprice']) && !empty($allinfo['maxprice'])){
            $builder->where('cost','<=',$allinfo['maxprice'])
            ->where('cost','>=',$allinfo['minprice']);
        }else{

            if(!empty($allinfo['maxprice'])){

            $builder->where('cost','<=',$allinfo['maxprice']);
            

               }

            if(!empty($allinfo['minprice'])){
               $builder->where('cost','>=',$allinfo['minprice']);
               }   
         }

           // End of search about cost max and min

         // search about bed max and min
        if(!empty($allinfo['minbed']) && !empty($allinfo['maxbed'])){

            $builder->where('room','<=',$allinfo['maxbed'])
            ->where('room','>=',$allinfo['minbed']);
        }else{

            if(!empty($allinfo['maxbed'])){
            $builder->where('room','<=',$allinfo['maxbed']);
               }

            if(!empty($allinfo['minbed'])){
               $builder->where('room','>=',$allinfo['minbed']);
            }   
         }

           // End of search about cost max and min
       
       if(!empty($allinfo['maxarea'])){
            $builder->where('area','<=',$allinfo['maxarea']);
        }
        
        if(!empty($allinfo['keyword'])){
            $prodescions = PropertyDescription::where('name','like','%'.$allinfo['keyword'].'%')
                  ->get();
               
             $prodids[] = 0;     
             foreach($prodescions as $prodiscription){
                     $prodids[] = $prodiscription['property_id'];
                 }
                      
            $builder->whereIn('id',$prodids);
        }
     if($flag == 1){
      $builder->orderBy('recommend', 'DESC'); 
     }
     if($flag == 2){
      $builder->orderBy('id', 'DESC'); 
     }
     if($flag == 2){
      $builder->orderBy('id', 'DESC'); 
     }
     if($flag == 3){
      $builder->orderBy('cost', 'ASC'); 
     }
     if($flag == 4){
      $builder->orderBy('cost', 'DESC'); 
     }

     $properties    = $builder->orderBy('type', 'DESC')->paginate(10)->setpath('');
     $properties->appends($allinfo);;

     $cities        =  City::all();
     $propertytypes =  Type::all();
     $vipproperty =  $builder->where('type','=','2')->paginate(2);

     $maxmumbed   = Property::max('room');
     $minmumbed   = Property::min('room');
     $maxmumarea  = Property::max('area');
     $minmumarea  = Property::min('area');
     $maxmumprice = Property::max('cost');
     $minmumprice = Property::min('cost');

     $typscounts = collect();
     if( ($regoinflagtest == 1) && ($cityflagtest != 1)){
       
       $typscounts = DB::table('properties')
                 ->select('type_id', DB::raw('count(*) as total'))
                 ->groupBy('type_id')
                 ->whereIn('region_id',$regoinid)
                 ->get();   
             
     }

        return View('front.searchresualt',compact('cities','propertytypes','properties','searchCities','vipproperty','regoinsearchinput','citysearchinput','allinfo','maxmumbed','minmumbed','maxmumarea','minmumarea','maxmumprice','minmumprice','allinfoencode','typscounts'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function single(Property $proprity)
    {
        $cities              =  City::all();
        $propertytypes       =  Type::all();
        $regoinsearchinput[] = 0;
        $citysearchinput[]   = 0;
        $allinfo             = "";
        $maxmumbed   = Property::max('room');
        $minmumbed   = Property::min('room');
        $maxmumarea  = Property::max('area');
        $minmumarea  = Property::min('area');
        $maxmumprice = Property::max('cost');
        $minmumprice = Property::min('cost');
        

        $properitiesinthesamearea = Property::where('type_id','=',$proprity['type'])
        ->where('id','!=',$proprity['id'])
        ->where('region_id','=',$proprity['region_id'])  
        ->get();
        
        $extraproperinthesame = collect();
        if($properitiesinthesamearea->count() > 4){
            $paginationnum = 4 - $properitiesinthesamearea->count();
            $proids[] = "";
            foreach($properitiesinthesamearea as $proinsame){
              $proids[] =  $proinsame['id'];
            }
           $extraproperinthesame = Property::whereNotIn('id',$proids)
        ->where('id','!=',$proprity['id'])
        ->where('region_id','=',$proprity['region_id'])  
        ->paginate($paginationnum);          
        }

        $properitiesinthesamearearecomended = Property::where('type_id','=',$proprity['type'])
        ->where('id','!=',$proprity['id'])
        ->where('recommend','=',1)
        ->where('region_id','=',$proprity['region_id'])  
        ->get();
  

        return View('front.singleporperity',compact('cities','propertytypes','regoinsearchinput','citysearchinput','allinfo','maxmumbed','minmumbed','maxmumarea','minmumarea','maxmumprice','minmumprice','proprity','properitiesinthesamearearecomended','properitiesinthesamearea','extraproperinthesame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Type;
use App\Property;
use App\PropertyDescription;
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

    
    public function searchproperty(Request $request)
    {
        $regoinsearchinput[] = 0;
        $citysearchinput[] = 0;
        
        
        $builder = Property::query();
        $allinfo = $request->all();
/**************** cites and regoins **********/ 
         $searchCities = collect();
        if(!empty($allinfo['citiesandregions'])){

            $regoinid[] = 0;
            $searchCities = collect();

            foreach($allinfo['citiesandregions'] as $result){
            $result_explode = explode('|', $result);
            if($result_explode[1] == 0 ){
                  // regoin
              $regoinid[]          = $result_explode[0];
              $regoinsearchinput[] = $result_explode[0];

            }
            if($result_explode[1] == 1 ){
                  // city
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

     $properties    = $builder->paginate(20);
     $cities        =  City::all();
     $propertytypes =  Type::all();
     $vipproperty =  Property::where('type','=','2')->paginate(2);

     $maxmumbed   = Property::max('room');
     $minmumbed   = Property::min('room');
     $maxmumarea  = Property::max('area');
     $minmumarea  = Property::min('area');
     $maxmumprice = Property::max('cost');
     $minmumprice = Property::min('cost');
        return View('front.searchresualt',compact('cities','propertytypes','properties','searchCities','vipproperty','regoinsearchinput','citysearchinput','allinfo','maxmumbed','minmumbed','maxmumarea','minmumarea','maxmumprice','minmumprice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sortedby($flag , $allinfo)
    {
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

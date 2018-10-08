<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Bank;
use Validator;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::paginate(10);
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
      $client=Client::find($id);
      return view('admin.clients.edit',compact('client'));
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
          'email' => 'required',
          'name'=>'required',
          'mobile'=>'required',
          'gender'=>'required',
          'block'=>'required',
          'active'=>'required',
      ]);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator->errors());
      }

        $client=Client::find($id);
        $client->name=$request->name;
        $client->mobile=$request->mobile;
        $client->email=$request->email;
        $client->gender=$request->gender;
        $client->block=$request->block;
        $client->active=$request->active;
        $client->dateBirth=$request->dateBirth;
        $client->area=$request->area;
        if($request->password !="")
        {
          $client->password=bcrypt($request->password);
        }
        $client->save();
        Bank::where('client_id',$id)->delete();
        $bank=new Bank;
        $bank->number=$request->number;
        $bank->cvr=$request->cvr;
        $bank->date=$request->date;
        $bank->client_id=$request->id;
        $bank->save();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Bank::where('client_id',$id)->delete();
      Client::find($id)->delete();
      return redirect()->back();
    }
}

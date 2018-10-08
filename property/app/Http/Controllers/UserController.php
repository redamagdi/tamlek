<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Form;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users=User::paginate(20);
      return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user=User::create(
          [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'type'=>$request->type,
          ]);
        return redirect()->route('users.index');
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
      $user=User::find($id);
      return view('admin.users.edit',compact('user'));
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
          'type'=>'required'
      ]);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator->errors());
      }
      $user=User::find($id);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->type=$request->type;
      if($request->password !="")
      {
        $user->password=$request->password;
      }
      $user->save();
      return redirect()->route('users.index');
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

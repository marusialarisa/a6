<?php

namespace App\Http\Controllers;

use App\Property;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['auth','role:admin']);

    }
    public function index()
    {
        $user=auth()->user()->id;
        $admin= Property::all();
        $users=User::all();

        return view('properties.users_info',compact('admin','users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("properties.show");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $path=$request->file('photo')->store('photos','public');
        Property::create(['description'=>$request->description,
                          'price'=>$request->price,
                          'type'=>$request->type,
                          'user_id'=>$user_id,
                          'photo'=>$path
                        ]);
       return redirect()->route('properties.admin_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=auth()->user()->id;
        $property=Property::find($id);
        $properties= Property::all();
        $name=$property->user->name;
        $email=$property->user->email;
        return view('properties.properties_my',compact('properties','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=User::find($id);
        $user=User::all();
        return view('properties.admin_edit_user',compact('user','usuario'));
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
        $user=auth()->user()->id;
        $admin= Property::all();
        $users=User::all();
        $usuario = User::find($id);
        $usuario->update(['name' => $request->name,
                         'email' => $request->email,
        ]);
        return view('properties.users_info',compact('admin','users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        $admin= Property::all();
        $users=User::all();
        return view('properties.users_info',compact('admin','users'));
    }


    public static function  getUserName($id){
        $user=User::all()->where('id',$id)->first();
        return $user->name;
    }
    public static function  getUserEmail($id){
        $user=User::all()->where('id',$id)->first();
        return $user->email;
    }
}

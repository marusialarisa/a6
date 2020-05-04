<?php

namespace App\Http\Controllers;

use App\Property;
use App\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    function __construct()
    {
      //  $this->middleware(['auth','role:user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user=auth()->user()->id;
        $properties= Property::all();
       return view('properties.index',compact('properties','user'));
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
        $user=auth()->user()->id;
        $properties= Property::all();
        $user_id=auth()->user()->id;
        $user_info=User::find($user_id);
        $role=$user_info->hasRole("admin");
        if($role){
            $path=$request->file('photo')->store('photos','public');
            Property::create(['description'=>$request->description,
                              'price'=>$request->price,
                              'type'=>$request->type,
                              'user_id'=>$user_id,
                              'photo'=>$path
                            ]);
            return view('properties.admin_index',compact('properties','user'));
        }else{
            $path=$request->file('photo')->store('photos','public');
            Property::create(['description'=>$request->description,
                              'price'=>$request->price,
                              'type'=>$request->type,
                              'user_id'=>$user_id,
                              'photo'=>$path
                             ]);
        }
        return view('properties.index',compact('properties','user'));
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
        $properties= Property::all();
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
        $property=Property::find($id);
        $users=User::all();
        return view('properties.edit',compact('property','users'));
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
        $properties= Property::all();
        $user_info=User::find($user);
        $role=$user_info->hasRole("admin");
        if($role){
            $property=Property::find($id);
            $property->update(['description'=>$request->description,
                'price'=>$request->price
               // 'photo'=>$request->photo
            ]);
            return view('properties.admin_index',compact('properties','user'));

        }else {
            $property = Property::find($id);
            $property->update(['description' => $request->description,
                'price' => $request->price
                //'photo'=>$request->photo
            ]);
        }
            return redirect()->route('properties.index',compact('properties','user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
        $user=auth()->user()->id;
        $user_info=User::find($user);
        $role=$user_info->hasRole("admin");
        if($role){
            $property=Property::find($id);
            $property->delete();
            $user=auth()->user()->id;
            $properties= Property::all();
            return view('properties.admin_index',compact('properties','user'));

        }else{
            $property=Property::find($id);
            $property->delete();
            $user=auth()->user()->id;
            $properties= Property::all();
        }
        return view('properties.index',compact('properties','user'));
    }
}

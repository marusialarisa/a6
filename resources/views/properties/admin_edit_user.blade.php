@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-6">User edit</h1>
        <form class="form-edit-user" action="{{route('admin.update',$usuario->id)}}" method="POST">
            @csrf
            @method('PUT')
            Name
            <br/>
            <input class="edit-user" type="text" name="name" value="{{$usuario->name}}">
            <br/><br/>
            Email
            <br/>
            <input class="edit-user" type="text" name="email" value="{{$usuario->email}}">
            <br/><br/>

            @foreach($user as $users)
                <datalist id="user_id">
                    <option value="{{$users->id}}">{{$users->email}}</option>
                </datalist>
            @endforeach

            <br/>
            <input class="save-user" type="submit" class="btn btn-primary" value="Save" onclick="if(!confirm('Are you sure?')){return false;};">
            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection


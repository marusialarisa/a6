@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Property edit</h1>
        <form class="form-control" action="{{route('properties.update',$property->id)}}" method="POST">
            @csrf
            @method('PUT')
            Description
            <br/>
            <input class="text-info" type="text" name="description" value="{{$property->description}}">
            <br/> <br/>
            Price
            <br/>
            <input class="valid" type="number" name="price" value="{{$property->price}}" class="form form-control">
            <br/><br/>
            Photo
            <br/>
            <input class="valid-photo" type="file" name="photo" value="{{$property->photo}}" class="form form-control">
            <br/>

            @foreach($users as $user)
                <datalist id="user_id">
                    <option value="{{$user->id}}">{{$user->email}}</option>
                </datalist>
            @endforeach
            <br/>
            <input class="save" type="submit" class="btn btn-primary" value="Save" onclick="if(!confirm('Are you sure?')){return false;};">
            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection
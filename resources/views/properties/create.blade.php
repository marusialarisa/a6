@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">New Property</h1>
        <form action="{{route('properties.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            Description
            <br/>
            <textarea type="text" name="description" value="" class="form form-control"></textarea>

            <br/>
            Price
            <br/>
            <input type="text" name="price" value="" class="form form-control"/>
            <br/>
            <br/>
            Type: sale/rent
                <select class="form-control" name="type">
                    <option value="sale">Sale</option>
                    <option value="rent">Rent</option>
                </select>
             <br/>
             <br/>

                <input type="file" name="photo">
               <br/>

          User_id
            <br/>
            <input class="list-group " list="user_id" name="user_id">
            @foreach($users as $user)
                <datalist id="user_id">
                    <option value="{{$user->id}}">{{$user->email}}</option>
                </datalist>
            @endforeach
            <br/>
            <input type="submit" class="btn btn-primary" value="Save">
            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection

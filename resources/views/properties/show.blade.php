


@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">New Property</h1>
        <form class="form-propertie" action="{{route('properties.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            Description
            <br/>
            <textarea class="new-propertie" type="text" name="description"></textarea>
            <br/><br/>
            Price
            <br/>
            <input class="new-price" type="number" name="price">
            <br/><br/>
            <input class="new-photo" type="file" name="photo">
            <br/><br/>
            <input class="save-propertie" type="submit" class="btn btn-primary" value="Save">
            <br/>
        </form>
        <br/>
    </div>

    @endsection
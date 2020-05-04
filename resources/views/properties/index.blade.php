@extends('properties.app')

@section('content')
    <div class="col-lg-12">

        <p class="my-4">Properties</p>
        <ul class="properties">

            <button><a href="{{route('properties.create')}}">New property</a></button>
            <br/><br/>
            <li><a href="#">All properties</a></li>
            <li>
                @foreach($properties as $property)
                <a href="{{route('properties.show',$property->id)}}"@endforeach> My properties</a>
            </li>
            <li>
                <a href="{{route('user.index')}}">User Info</a>
            </li>
        </ul>

        <br/>
        <br/>
        <br/>
        <table class="table">
            <thead>

            @foreach($properties as $property)
                <tr>
                    <td><br/><br/>
                        @if($property->photo!=null)<img src="{{asset('storage/'.$property->photo)}}" width="250px" height="200px">@endif
                    </td>
                    <td class="description-property">{{$property->description}}
                        <br/>{{$property->price}} €
                        <br/>{{$property->type}}</td>
                </tr>
            @endforeach

            </thead>
        </table>
    </div>

@endsection

@extends('properties.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-5">My Properties</h1>
        <br/>
        <button class="btn-info"><a href="{{route('properties.create')}}">New property</a></button>
        <br/>
        <br/>
        <table class="table_my_properties">
            <thead>
            @foreach($properties as $property)
                @if($property->user_id == $user)
                  <tr>
                     <a class="btn btn-primary" href="{{route('properties.show',$property->id)}}">

                    <td>
                        @if($property->photo!=null)<img src="{{asset('storage/'.$property->photo)}}" width="150px">@endif
                    </td>
                    <td class="my-description"><strong>{{$property->description}}</strong><br/>
                    {{$property->type}} <br/>
                    {{$property->price}} €</td>

                    <td><button><a class="btn btn-primary" href="{{route('properties.edit',$property->id)}}">Edit</a></button></td>
                    <td>
                        <form action="{{route('properties.destroy',$property->id)}}" method="POST" style="">
                        @csrf
                        @method("DELETE")
                            <button  class="btn-delete" type="submit" onclick="if(!confirm('Are you sure?')){return false;};">Delete</button>

                        </form>
                    </td>
                </tr>

                @endif

            @endforeach

            </thead>
        </table>
    </div>

@endsection

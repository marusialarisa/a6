@extends('properties.app')

@section('content')
    <div class="col-lg-12">

        <p class="my-4">Properties</p>

        <ul class="properties">
            <li><a href="#">All properties</a></li>
            <li>
                @foreach($properties as $property)
                    <a href="{{route('admin.show',$property->id)}}" @endforeach>My properties</a>
            </li>
            <li>
                <a href="{{route('admin.index')}}">All users info</a>
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
                    <td class="description-property2">{{$property->description}}
                        <br/>{{$property->price}} €
                        <br/>{{$property->type}}
                     <br/>Owner: {{\App\Http\Controllers\AdminController::getUserName($property->user_id)}}
                        <br/>Email: {{\App\Http\Controllers\AdminController::getUserEmail($property->user_id)}}
                    </td>
                    <td><button><a class="btn btn-primary" href="{{route('properties.edit',$property->id)}}">Edit</a></button></td>
                    <td>
                        <form action="{{route('properties.destroy',$property->id)}}" method="POST" style="">
                            @csrf
                            @method("DELETE")
                            <button  class="btn-delete" type="submit" onclick="if(!confirm('Are you sure?')){return false;};">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

            </thead>
        </table>
    </div>

@endsection


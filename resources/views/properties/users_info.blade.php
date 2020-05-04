


@extends('layouts.app')

@section('content')
    <a class="col-lg-12">

        <h1 class="my-4">Users info</h1><br/>
        <a href="{{route('admin.index')}}"></a>
        @csrf
        <table class="table_info">
            <thead>
            @foreach($users as $property)
                    <tr>
                        <td> <br/> <p><strong>Name:  </strong>{{$property->name}}</p>
                            <p><strong>Email:   </strong>{{$property->email}}</p>
                           </td>
                        <td><button><a class="btn btn-primary" href="{{route('admin.edit',$property->id)}}">Edit</a></button></td>
                        <td>
                            <form action="{{route('admin.destroy',$property->id)}}" method="POST" style="">
                                @csrf
                                @method("DELETE")
                                <button  class="btn-delete" type="submit" onclick="if(!confirm('Are you sure?')){return false;};">Delete</button>

                                </form>
                    </tr>
            @endforeach
            </thead>
        </table>


        </div>

@endsection

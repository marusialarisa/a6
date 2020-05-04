


@extends('layouts.app')

@section('content')
    <a class="col-lg-12">

        <h1 class="my-4">User info</h1><br/>
        <a href="{{route('user.index')}}"></a>
            @csrf
            <table class="table_info">
                <thead>

            @foreach($user as $property)
                @if($property->id == $usuario)
                    <tr>
                    <td><strong>Name:  </strong>{{$property->name}}
                     <br/><br/><strong>Email:   </strong>{{$property->email}}
                    </td>
                    </tr>

                @endif
                @endforeach
                </thead>
            </table>
        <br/>
        <br/>
        <button  class="modify" type="submit"><a class="btn btn-primary" href="{{route('user.edit',$property->id)}}">Modify</a></button>
        <br/>
    </div>

@endsection

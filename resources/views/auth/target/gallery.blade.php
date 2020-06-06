@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('user.targetProfile',$user)}}">Back</a>


        <p class="align-content-center">{{$user->first_name}} gallery</p>
        <div class="row justify-content-center mt-5">
            @forelse($user->galleries as $picture)
                <div class="col-4 card-deck p-2">
                    <div class="card">
                        <a href="{{$picture->getPicture()}}"><img src="{{$picture->getPicture()}}" alt=""  style="height: 200px;object-fit: cover" class=" w-100 d-inline-block"></a>
                    </div>
                </div>
            @empty
                <div>
                    <h5>There are no pictures in {{$user->first_name}} gallery!!!</h5>
                </div>
            @endforelse
        </div>
    </div>
@endsection

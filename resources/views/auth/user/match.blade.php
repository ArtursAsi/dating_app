@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('user.profile')}}">Back</a>

        <div class="row justify-content-center">
            @forelse($users as $user)
                <div class="col-4 card-deck p-2">
                    <div class="card">
                        <a href="{{route('user.targetProfile',$user)}}"><img src="{{$user->getPicture()}}" alt=""
                                                                             style="height: 200px;object-fit: cover"
                                                                             class=" w-100 d-inline-block"></a>
                        <div class="card-body">
                            <h5 class="card-title">{{$user->first_name}} {{$user->last_name}} ({{$user->age}})</h5>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    Currently there are no matches for you!
                </div>
            @endforelse
        </div>
    </div>
@endsection

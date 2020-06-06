
@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('user.dates')}}">Back</a>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$user->first_name}} Profile
                        <a href="{{route('gallery.target',$user)}}">Gallery</a>


                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">

                                <a href="{{$user->getPicture()}}"><img class="w-75" src="{{$user->getPicture()}}"
                                                                       alt=""></a>

                            </div>
                                <div class="col-6">
                                    <h5 class="d-inline">Gender: </h5><h6>{{$user->gender}}</h6>
                                    <h5 class="d-inline">First name: </h5><h6>{{$user->first_name}}</h6>
                                    <h5 class="d-inline">Last name: </h5><h6>{{$user->last_name}}</h6>
                                    <h5 class="d-inline">Age: </h5><h6>{{$user->age}}</h6>
                                    <h5 class="d-inline">Location: </h5><h6>{{$user->location}}</h6>
                                    <h5 class="d-inline">Email address: </h5><h6>{{$user->email}}</h6>
                                    <h5 class="d-inline">Bio: </h5><h6>{{$user->bio}}</h6>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Profile <span><a href="{{route('user.edit',$user)}}">Edit</a></span>
                        <a href="{{route('gallery.index',$user)}}">Gallery</a>
                        <a href="{{route('user.match',$user)}}">Match</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">


                                    <a href="{{$user->getPicture()}}"><img class="w-75" src="{{$user->getPicture()}}"
                                                                                          alt=""></a>


                                <div class="mt-2">
                                    <form action="{{route('user.updatePicture',$user)}}" enctype="multipart/form-data"
                                          method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="file" name="profile_picture">
                                        <button class="btn btn-outline-primary">Upload</button>
                                    </form>
                                </div>
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

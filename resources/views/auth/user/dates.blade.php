@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            @if($user)
                <div class="align-self-center">
                    <form action="{{route('user.dislike',$user)}}" method="post">
                        @csrf
                        <button onclick="this.disabled=true;this.form.submit();" name="dislike" type="submit" class="btn btn-outline-primary"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="col-4 card-deck p-2">
                    <div class="card">

                        <a href="{{route('user.targetProfile',$user)}}"> <img src="{{$user->getPicture()}}" alt=""
                                                                              style="height: 200px;object-fit: cover"
                                                                              class=" w-100 d-inline-block"></a>
                        <div class="card-body">
                            <h6 class="card-title d-inline">{{$user->first_name}}, {{$user->age}} <span
                                    style="font-size: 10px" class="text-right d-block">{{$user->location}}</span></h6>

                            <h5 class="pt-5">Bio</h5><span>{{$user->bio}}</span>

                        </div>

                    </div>
                </div>

                <div class="align-self-center">
                    <form action="{{route('user.like',$user)}}" method="post">
                        @csrf
                        <button onclick="this.disabled=true;this.form.submit();" name="like" type="submit" class=" btn btn-outline-danger" ><i class="fa fa-heart" aria-hidden="true"></i></button>
                    </form>
                </div>
            @else
                <div>
                    <h5>Currently there are no users available</h5>
                </div>
            @endif
        </div>
    </div>

@endsection

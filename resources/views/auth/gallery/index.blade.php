@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('user.profile')}}">Back</a>
        <div class="row">
            <div class="mt-2">
                <form action="{{route('gallery.store',$user)}}" enctype="multipart/form-data"
                      method="post">
                    @csrf
                    <input type="file" name="picture[]" multiple>
                    <button class="btn btn-outline-primary">Upload</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            @forelse($user->galleries as $picture)

                <div class="col-4 card-deck p-2">
                    <div class="card">
                        <a href="{{$picture->getPicture()}}"><img src="{{$picture->getPicture()}}" alt="" style="height: 200px;object-fit: cover" class=" w-100 d-inline-block"></a>
                        <div class="card-body">
                            <form action="{{route('gallery.destroy',$picture->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <h5>There are no pictures in your gallery!!!</h5>
                </div>
            @endforelse
        </div>
    </div>
@endsection

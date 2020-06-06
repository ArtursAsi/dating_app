<div class="container">
    @if($errors->has('profile_picture') )
        <div class="alert alert-danger">
            {{ $errors->first('profile_picture') }}
        </div>

    @elseif($errors->has('picture'))
        <div class="alert alert-danger">
            {{ $errors->first('picture') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @elseif (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @elseif (session('profile_pic'))
        <div class="alert alert-success" role="alert">
            {{ session('profile_pic') }}
        </div>
    @elseif (session('gallery'))
        <div class="alert alert-success" role="alert">
            {{ session('gallery') }}
        </div>
    @elseif (session('password'))
        <div class="alert alert-success" role="alert">
            {{ session('password') }}
        </div>
    @endif
</div>

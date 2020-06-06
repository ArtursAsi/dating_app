@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('user.profile')}}">Back</a>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('user.update',$user) }}">
                            @csrf
                            @Method('PATCH')

                            <div class="form-group row">
                                <label for="looking_for"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Looking for') }}</label>

                                <div class="col-md-6">
                                    <select id="looking_for" name="looking_for" autofocus>
                                        <option
                                            value="male" {{ old('looking_for',$user->looking_for) == 'male' ? 'selected' : ''}}>
                                            Male
                                        </option>
                                        <option
                                            value="female" {{ old('looking_for',$user->looking_for) == 'female' ? 'selected' : ''}}>
                                            Female
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="min_age" class="col-md-4 col-form-label text-md-right">Age from</label>
                                <input name="min_age" id="min_age" type="range" min="18" max="100"
                                       value="{{ old('min_age',$user->min_age) ?? 18}}">
                                <span id="ageMin"></span><span>-y.o</span>
                            </div>


                            <div class="form-group row">
                                <label for="max_age" class="col-md-4 col-form-label text-md-right">Age to</label>
                                <input name="max_age" id="max_age" type="range" min="18" max="100"
                                       value="{{ old('max_age',$user->max_age) ?? 100}}">
                                <span id="ageMax"></span> <span>-y.o</span>
                            </div>

                            <hr/>

                            <div class="form-group row">
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Gender') }} </label>

                                <div class="col-md-6">
                                    <select id="gender" name="gender" autofocus>
                                        <option
                                            value="male" {{ old('gender',$user->gender) == 'male' ? 'selected' : ''}}>
                                            Male
                                        </option>
                                        <option
                                            value="female" {{ old('gender',$user->gender) == 'female' ? 'selected' : ''}}>
                                            Female
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name" value="{{ old('first_name',$user->first_name) }}"
                                           autocomplete="first_name"
                                           autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" value="{{ old('last_name',$user->last_name) }}"
                                           autocomplete="last_name"
                                           autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bio"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                                <div class="col-md-6">
                                    <textarea id="bio" type="text"
                                              class="form-control @error('bio') is-invalid @enderror"
                                              name="bio" required
                                              autocomplete="bio" autofocus>{{ old('bio',$user->bio) }}</textarea>
                                    @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="location"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text"
                                           class="form-control @error('location') is-invalid @enderror"
                                           name="location" value="{{ old('location',$user->location) }}"
                                           autocomplete="location"
                                           autofocus placeholder="Country">

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="update" >
                                        {{ __('Update') }}
                                    </button>
                                    <a href="{{route('user.password',$user)}}">Change password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


        const min = document.getElementById("min_age");
        const minAge = document.getElementById("ageMin");

        minAge.innerHTML = min.value;
        min.oninput = function () {
            minAge.innerHTML = this.value;
        }

        const max = document.getElementById("max_age");
        const maxAge = document.getElementById("ageMax");
        maxAge.innerHTML = max.value;
        max.oninput = function () {
            maxAge.innerHTML = this.value;
        }




    </script>
@endsection

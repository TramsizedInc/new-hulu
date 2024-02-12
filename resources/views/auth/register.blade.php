@extends('layouts.app')

@section('content')
<img id="regFormPicture" src="../storage/pictures/home.jpg" alt="background" title="background">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light">
                <div class="card-header text-light" id="RegFormTittle">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="fullname" class="col-md-4 col-form-label text-md-end">{{ __('Fullname') }}</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input onkeyup="isUsed(this.value);" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row content-justify-center">
                            <div class="col-4">

                            </div>
                            <div class="col-4 text-center">
                                <button id="logButton" type="submit" class="btn btn-outline-success registerButton">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col-4">

                            </div>
                        </div>
                        <div class="row content-justify-center">
                            <div class="col-4">

                            </div>
                            <div class="col-4 text-center">

                                    <a href="{{ route('login') }}">I have account? Log in!</a>
                            </div>
                            <div class="col-4">

                            </div>
                        </div>
                        <div class="row content-justify-center">
                            <div class="col-4">

                            </div>
                            <div class="col-4 text-center">

                                    <small class="text-info"><span id="responseText"></span></small>
                            </div>
                            <div class="col-4">

                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function isUsed(inputData) {
    $.ajax({
        type: 'POST',
        url: '/isUsedResponse',
        data: {
            '_token' : '<?php echo csrf_token() ?>',
            'inputValue' : inputData
        },
        success: function(data) {
            if (data.status == 'failed') {
                $('#responseText').html('Username is taken ');
                
            } else {
                $('#responseText').html('Username is avaliable ');
            }
        }
    });
}
</script>
@endsection
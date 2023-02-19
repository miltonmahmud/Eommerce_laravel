{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


 <x-guest-layout>

    <style>

        body {
    background: #ffffff none repeat scroll 0 0;
    color: #687188;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
}
        .btn {
    border-width: 1px;
    cursor: pointer;
    line-height: normal;
    padding: 15px 35px;
    text-transform: capitalize;
    transition: all 0.3s ease-in-out;
}

.bg-white {
    color: white;
    margin: 2px;
    background-color: #fff !important;
    font-family: 'Poppins', sans-serif;
}

/*.btn-fill-out {
    background-color: #FF324D;
    border: 1px solid #FF324D;
    color: #fff;
    position: relative;
    overflow: hidden;
    z-index: 1;
}*/

span, a, .form-control {
    font-size: 16px;
}

.text-center {
    text-align: center!important;
}

    </style>

       <div class="main_content section">

<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                        <x-jet-validation-errors class="mb-4" />
                            <h3>Login</h3>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="email" placeholder="Your Email" type="email" :value="old('email')" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                    </div>
                                </div>
                                <a href="{{route('password.request')}}">Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                            </div>
                        </form>
                        <div class="form-note text-center" style="color: #333 !important; font-size: 16px !important;">Don't Have an Account? <a href="{{route('register')}}">Sign up now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

</div>

 </x-guest-layout>
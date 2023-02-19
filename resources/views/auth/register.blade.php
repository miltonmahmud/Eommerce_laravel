{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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
            
            .bg-white {
            color: white;
            margin: 2px;
             background-color: #fff !important; 
            font: 14px bold, "ARIAL";
        }

        .btn {
            border-width: 1px;
            cursor: pointer;
            line-height: normal;
            padding: 15px 35px;
            text-transform: capitalize;
            transition: all 0.3s ease-in-out;
        }

        .section {
    padding: 100px;
    position: relative;
}

span, a, .form-control {
    font-size: 16px;
}

.text-center {
    text-align: center!important;
}
    </style>
    
    <div class="main_content section">

<!-- START LOGIN SECTION -->
<div class="login_register_wrap ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">

                        <x-jet-validation-errors class="mb-4" />

                        <div class="heading_s1">
                            <h3>Create an Account</h3>
                        </div>
                        <form method="post" action="{{ route('register') }}">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" :value="old('email')" required placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" class="form-control" required="" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="register">Register</button>
                            </div>
                        </form>
                        <div class="form-note text-center" style="color: #687188; font-size: 16px !important; font-family: 'Poppins', sans-serif;">Already have an account? <a href="{{route('login')}}">Log in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

</div>

</x-guest-layout>


 
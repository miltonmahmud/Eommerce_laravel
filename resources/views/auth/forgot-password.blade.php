{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
 --}}

{{--  <x-guest-layout>

    <style>
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

span, a, .form-control {
    font-size: 16px;
}

.text-center {
    text-align: center!important;
}

 .section {
    padding: 100px;
    position: relative;
}

.btn-fill-out {
    background-color: #FF324D;
    border: 1px solid #FF324D;
    color: #fff;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.btn:hover {
    color: #fff;
}

.btn-fill-out:hover {
    color: #FF324D !important;
    background-color: #fff;
}


    </style>
    </style>

        <main id="main" class="login_register_wrap section">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">                      
                            <div class="login-form form-item form-stl">
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <x-jet-validation-errors class="mb-4" />
                                <form name="frm-login" method="POST" action="{{route('password.email')}}">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Forgot Password</h3>                                      
                                    </fieldset>
                                    <div class="form-group">
                                        <label class="form-label" for="frm-login-uname">Email Address:</label>
                                        <input class="form-control" type="email" id="frm-login-uname" name="email" placeholder="Type your email address" :value="old(email)" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-fill-out btn-block" value="Email Password Reset Link" name="submit">
                                    </div>
                                </form>
                            </div>                                              
                        </div>
                    </div><!--end main products area-->     
                </div>
            </div><!--end row-->

        </div><!--end container-->

    </main>

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
                            <h3 class="form-title">Forgot Password</h3>
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="email" id="frm-login-uname" name="email" placeholder="Type your email address" :value="old(email)" required autofocus>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="submit">Email Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

</div>

 </x-guest-layout>
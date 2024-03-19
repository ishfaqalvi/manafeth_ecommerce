@extends('web.layout.app')

@section('title')
    Manafeth | Login
@endsection

@section('content')
<section class="bg-gray account-all-pages d-flex flex-column align-items-center">
    <div class="sm-container mx-auto my-md-5 my-3 w-100 px-md-0 px-3">
        <h2 class="account-main-title text-center">Welcome</h2>
        <p class="text-center">Login To Continue</p>
        <form action="#" method="post" class="w-100 my-acount-detail-form d-flex flex-column border-all-form-outline bg-white">
            <div class="w-100 d-flex flex-column gap-2">
                <div class="position-relative">
                    <input type="email" class="form-control border-all-form-outline" id="last_name" name="last_name"
                    placeholder="Email" required>
                    <i class="fa fa-at position-absolute top-0 end-0 m-3"></i>
                </div>
            </div>
            <div class="w-100 d-flex flex-column gap-2">
                <div class="position-relative">
                <input type="password" class="form-control border-all-form-outline" id="phone" name="phone"
                    placeholder="Password" required>
                    <i class="fa fa-lock position-absolute top-0 end-0 m-3"></i>
                </div>
            </div>
            <a href="http://" class="text-end forgot-password">Forgot Password?</a>
            <button type="submit" class="button" name="sign-in">Sign In</button>
            <a href="http://" class="text-center or d-flex align-items-center justify-content-center gap-2 mx-auto">OR</a>
            <button type="submit" class="button btn-tertiary" name="continue-as-guest">Continue as Guest</button>
            <a href="{{ route('web.showRegisterForm') }}" class="button btn-tertiary">Create Account</a>
        </form>
    </div>
</section>
@endsection
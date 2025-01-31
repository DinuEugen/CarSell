<x-guest-layout title="Login" bodyClass="page-login" :socialAuth="false">
    <h1 class="auth-page-title">Request Password Reset</h1>

    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="form-group" @error('email') has-error @enderror>
            <input type="email" placeholder="Your Email" name="email" value="{{ old('email') }}" />
            <div class="error-message">
                {{ $errors->first('email') }}
            </div>


        </div>
        <button class="btn btn-primary btn-login w-full">
            Request password reset
        </button>

        <div class="login-text-dont-have-account">
            Already have an account? -
            <a href="{{ route('login') }}"> Click here to login </a>
        </div>

    </form>


</x-guest-layout>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamNetmate | Connexion</title>
</head>

<body>
    <div class="container">
        <div class="cover">
            <div class="front">
                <video autoplay muted loop>
                    <source src="{{ asset('assets/auth/video/bkSport.mp4') }}" type="video/mp4">
                </video>
                <div class="text">
                    <span class="text-1">Merci d'être de retour !</span>
                    <span class="text-2">StreamNetmate</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="signup-form">
                    <div class="signup-form"
                        style="display: flex; flex-direction: row; justify-content: space-between; gap: 5px;">
                        <a href="{{ route('home') }}" style="align-self: center; color:#5b13b9;">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <div class="title">{{ __('Connexion') }}</div>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-boxes">

                            <div class="input-box">
                                <div style="display: flex; flex-direction: column; flex-grow: 1;">
                                    <div>
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" id="email" placeholder="Email"
                                            class="@error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>

                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback" role="alert alert-warning">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="input-box">
                                <div style="display: flex; flex-direction: column; flex-grow: 1;">
                                    <div>

                                    <i class="fas fa-lock"></i>
                                    <input id="password" type="password" placeholder="Mot de passe"
                                        class="@error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password">
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="text">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Connexion">
                            </div>
                            <div class="text sign-up-text">Pas encore de compte ? <a
                                    href="{{ route('register') }}">S'inscrire</a>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="text sign-up-text">
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

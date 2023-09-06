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
    <title>StreamNetmate | Inscription</title>
</head>

<body>
    <div class="container">

        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <video autoplay muted loop>
                    <source src="{{ asset('assets/auth/video/bkSport.mp4') }}" type="video/mp4">
                </video>
                <div class="text">
                    <span class="text-1">Merci de nous rejoindre !</span>
                    <span class="text-2">StreamNetmate</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div>
                    <div class="signup-form"
                        style="display: flex; flex-direction: row; justify-content: space-between; gap: 5px;">
                        <a href="{{ route('home') }}" style="align-self: center; color:#5b13b9;">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <div class="title">{{ __('Inscription') }}</div>
                    </div>



                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-boxes">

                            <div class="input-box">
                                <div style="display: flex; flex-direction: column; flex-grow: 1;">
                                    <div>

                                        <i class="fas fa-user"></i>
                                        <input id="name" type="text" placeholder="Username" required
                                            class="@error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autofocus>
                                    </div>

                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback" role="alert alert-warning">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="input-box">
                                <div style="display: flex; flex-direction: column; flex-grow: 1;">
                                    <div>

                                        <i class="fas fa-envelope"></i>
                                        <input type="email" id="email"
                                            class="@error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="Email" required
                                            autocomplete="email">
                                    </div>

                                    @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="input-box">
                                <div style="display: flex; flex-direction: column; flex-grow: 1;">
                                    <div>

                                        <i class="fas fa-lock"></i>
                                        <input id="password" type="password" placeholder="Mot de passe"
                                            class="@error('password') is-invalid @enderror" name="password" required
                                            autocomplete="new-password">
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-box">
                                <div style="display: flex; flex-direction: column; flex-grow: 1;">
                                    <div>

                                        <i class="fas fa-lock"></i>

                                        <input id="password-confirm" type="password"
                                            placeholder="Confirmez le mot de passe" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                </div>

                            </div>

                            <div class="button input-box">
                                <input type="submit" value="S'inscrire">
                            </div>
                            <div class="text sign-up-text">Vous avez déjà un compte ? <a href="{{ route('login') }}">Se
                                    Connecter</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

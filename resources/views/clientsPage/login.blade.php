<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign</title>
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/login.css') }}">

</head>

<body>
    <div class="frm" action="">
        <div class="container">
            <form action="{{ url('http://127.0.0.1:8000/client/login') }}" id="signInForm" method="POST"
                class="container__signIn active">
                @csrf
                <div class="container__signIn-tittle">Sign In</div>
                <div class="container__signIn-input">
                    <div class="input-group">
                        <input placeholder="" type="text" name="user_name" autocomplete="off" class="input">
                        <label class="user-label">Username</label>
                        <small>
                            @error('user_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="input-group">
                        <input placeholder="" type="password" name="password" autocomplete="off" class="input">
                        <label class="user-label">Password</label>
                        <small>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="container__signIn-button">
                    <button id="" type="submit">Sign in</button>
                </div>
                <div class="container__signIn-forget"><a href="">Forgotten password?</a></div>
                <div class="container__signIn-change">
                    <button id="toRegister">Register</button>
                </div>
            </form>
            <form action="{{ url('http://127.0.0.1:8000/client/register') }}" method="POST" id="registerForm"
                class="container__signIn ">
                @csrf
                <div class="container__signIn-tittle">Register</div>
                <div class="container__signIn-input">
                    <div class="input-group">
                        <input placeholder="" type="text" name="first_name" autocomplete="off" class="input">
                        <label class="user-label">Firstname</label>
                        <small>
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="input-group">
                        <input placeholder="" type="text" name="last_name" autocomplete="off" class="input">
                        <label class="user-label">Lastname</label>
                        <small>
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="input-group">
                        <input placeholder="" type="text" name="mail" autocomplete="off" class="input">
                        <label class="user-label">Email</label>
                        <small>
                            @error('mail')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="input-group">
                        <input placeholder="" type="text" name="user_name" autocomplete="off" class="input">
                        <label class="user-label">Username</label>
                        <small>
                            @error('user_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="input-group">
                        <input placeholder="" type="password" name="password" autocomplete="off" class="input">
                        <label class="user-label">Password</label>
                        <small>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="input-group">
                        <input placeholder="" type="password" name="c_password" autocomplete="off" class="input">
                        <label class="user-label">Confirm Password</label>
                        <small>
                            @error('c_password')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="container__signIn-button">
                    <button type="submit">Sign up</button>
                </div>
                <div class="container__signIn-change">
                    <button id="toSignIn">Sign in</button>
                </div>
            </form>
        </div>
        <div id="abc" class="slideShow">
            <div id="formImage" class="slideShow-image show"
                style="background-image: url(./chanel/Bag-Chanel-Summer-Trends-2020.jpg);"></div>
            <div id="formImage" class="slideShow-image show"
                style="background-image: url(./gucci/63aeece630d8df78acf77978c2161515.jpg);"></div>
            <div id="formImage" class="slideShow-image show"
                style="background-image: url(./LV/W_Fa_Wild_at_Heart_V2.png); background-size: 140%;"></div>
            <div id="formImage" class="slideShow-image show"
                style="background-image: url(./dior/Dior-Fall-2020-Runway-Bag-Collection-5.jpg);"></div>
        </div>
    </div>
</body>
<script src="{{ asset('javascript/client/loginNew.js') }}"></script>

</html>

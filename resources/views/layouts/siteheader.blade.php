
<header id="header_part" class="fullwidth" style="margin-bottom: 15px">
    <div id="header">
        <div class="container" style="
    display: flex;
    justify-content: space-between;
    align-items: center;
">
            <div class="utf_left_side">
                <div id="logo"><a href="/"><img src="/images/logo.png" alt=""></a></div>

                <nav id="navigation" class="style_one">
                    <ul id="responsive">
                        <li><a class="{{ (request()-> is('/')) ? 'current' : '' }}"
                               href="/">{{ getNT('site.home') }}</a></li>
                        <li><a class="{{ (request()-> is('listings')) ? 'current' : '' }}"
                               href="/listings" id="idForListings">{{ getNT('site.listings') }}</a></li>
                        <li><a class="{{ (request()-> is('blog')) ? 'current' : '' }}"
                               href="/blog">{{ getNT('site.blog') }}</a></li>
                        <li><a class="{{ (request()-> is('foods')) ? 'current' : '' }}"
                               href="/foods">{{ getNT('site.foods') }}</a></li>
                        <li><a href="#">{{ getNT('site.pages') }}</a>
                            <ul>
                                <li><a class="{{ (request()-> is('about')) ? 'current' : '' }}"
                                       href="/about">{{ getNT('site.about') }}</a></li>
                                <li><a class="{{ (request()-> is('faq')) ? 'current' : '' }}"
                                       href="/faq">{{ getNT('site.faq') }}</a></li>
                                <li><a class="{{ (request()-> is('contact')) ? 'current' : '' }}"
                                       href="/contact">{{ getNT('site.contacts') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="utf_right_side">
                <div class="header_widget">
                    <a href="/change_lang/en">
                        <img src="/images/flag-en.png" height="24px" alt="Flag en">
                    </a>
                    <a href="/change_lang/uz">
                        <img src="/images/flag-uz.png" height="24px" alt="Flag uz">
                    </a>
                    <a href="/change_lang/ru">
                        <img src="/images/flag-ru.png" height="24px" alt="Flag ru">
                    </a>
                    @guest
                        <a href="#dialog_signin_part"
                           style="width: 50px!important; min-width: auto; border-radius: 50px;"
                           class="button border sign-in popup-with-zoom-anim"><i class="fa fa-sign-in"></i></a>
                    @endguest

                    @auth
                        <a href="/dashboard" style="width: 50px!important; min-width: auto;"
                           class="button border with-icon"><i class="sl sl-icon-user"></i></a>
                    @endauth

                </div>
            </div>
            @guest
            <meta name="csrf-token" content="{{ csrf_token() }}">
                <div id="dialog_signin_part" class="zoom-anim-dialog mfp-hide">
                    <div class="small_dialog_header">
                        <h3>Sign In</h3>
                    </div>
                    <div class="utf_signin_form style_one">
                        <ul class="utf_tabs_nav">
                            <li class=""><a href="#tab1">Log In</a></li>
                            <li><a href="#tab2">Register</a></li>
                        </ul>
                        <div class="tab_container alt">
                            <div class="tab_content" id="tab1" style="display:none;">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')"/>

                                <form method="POST" action="{{ route('myCaptcha.post') }}">
                                    @if($errors->first())
                                    <script>
                                        Swal.fire({
                                          title: "Error",
                                          text: "{{ $errors->first() }}",
                                          icon: "error"
                                        });
                                    </script>

                                    @endif

                                    @csrf

                                    <!-- Email Address -->
                                    <p class="utf_row_form utf_form_wide_block">
                                        <label for="login">
                                            <input type="text" class="input-text" name="login" id="login"
                                                   value="" placeholder="Login">
                                        </label>
                                    </p>

                                    <!-- Password -->
                                    <p class="utf_row_form utf_form_wide_block">
                                        <label for="password">
                                            <input class="input-text" type="password" name="password" id="password"
                                                   placeholder="Password">
                                        </label>
                                    </p>

                                    <!-- Remember Me -->

                                    <div class="utf_row_form utf_form_wide_block form_forgot_part">
                                        @if (Route::has('password.request'))
                                            <span class="lost_password fl_left">
                                                <a href="{{ route('password.request') }}">
                                                    {{ getNT('Forgot your password?') }}
                                                </a>
                                            </span>
                                        @endif

                                        <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                            <label for="captcha" class="col-md-4 control-label">Captcha</label>
                                            <div class="col-md-12">
                                                <div class="captcha" style="display:flex">
                                                    <span>{!! captcha_img() !!}</span>
                                                    <button type="button" class="button btn-refresh" style="width: 100px"><i
                                                            class="fa fa-refresh"></i></button>
                                                </div>
                                                <input id="captcha" type="text" class="form-control"
                                                       placeholder="Enter Captcha" name="captcha">
                                                @if ($errors->has('captcha'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('captcha') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="checkboxes fl_right">
                                            <input id="remember-me" type="checkbox" name="remember">
                                            <label for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <x-primary-button class="button border margin-top-5">
                                        {{ getNT('Log in') }}
                                    </x-primary-button>

                                    <div class="utf-login_with my-3">
                                        <span class="txt">Or Login in With</span>
                                    </div>
                                        <div class="row">
                                            {{--                                        <div class="col-md-6 col-6">--}}
                                            {{--                                            <a href="/auth/facebook/redirect" class="social_bt facebook_btn mb-0"><i--}}
                                            {{--                                                    class="fa fa-facebook"></i> Facebook</a>--}}
                                            {{--                                        </div>--}}
                                            <div class="col-md-12 col-12">
                                                <a href="/auth/google/redirect" class="social_bt google_btn mb-0"><i
                                                        class="fa fa-google"></i> Google</a>
                                            </div>
                                        </div>
                                </form>
                            </div>

                            <div class="tab_content" id="tab2" style="display:none;">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <p class="utf_row_form utf_form_wide_block">
                                        <label for="username2">
                                            <input type="text" class="input-text" name="login" id="username2"
                                                   value="" placeholder="Username">
                                        </label>
                                        <p id="passInfo" style="color: red"></p>
                                    </p>

                                    <!-- Email Address -->
                                    <p class="utf_row_form utf_form_wide_block">
                                        <label for="email3">
                                            <input type="text" class="input-text" name="email" id="email3"
                                                   value="" placeholder="Email">
                                        </label>
                                    </p>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-text-input id="password2" class="block mt-1 w-full" type="password"
                                                      name="password" required autocomplete="new-password" minlength="8"
                                                      placeholder="Password"/>

                                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-text-input id="password_confirmation" class="block mt-1 w-full" minlength="8"
                                                      type="password" name="password_confirmation" required
                                                      autocomplete="new-password" placeholder="Confirm Password"/>

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>

                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                           href="{{ route('login') }}">
                                            {{ getNT('Already registered?') }}
                                        </a>
                                        <label style=""><input style="width:20px;" id="offcheckbox" type="checkbox">See
                                            this <a href="/oferta">{{getNT('Oferta')}}</a></label>
                                        <x-primary-button id="btnreg" disabled class="button border fw margin-top-10">
                                            {{ getNT('Register') }}
                                        </x-primary-button>
                                        <div class="utf-login_with my-3">
                                            <span class="txt">Or Login in With</span>
                                        </div>
                                        <div class="row">
                                            {{--                                            <div class="col-md-6 col-6">--}}
                                            {{--                                                <a href="/auth/facebook/redirect" class="social_bt facebook_btn mb-0"><i--}}
                                            {{--                                                        class="fa fa-facebook"></i> Facebook</a>--}}
                                            {{--                                            </div>--}}
                                            <div class="col-md-12 col-12">
                                                <a href="/auth/google/redirect" class="social_bt google_btn mb-0"><i
                                                        class="fa fa-google"></i> Google</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.querySelector('#offcheckbox').addEventListener('change', (e) => {
                        document.querySelector('#btnreg').disabled = !e.currentTarget.checked;

                    });
                </script>
            @endguest
            <div class="mmenu-trigger">
                <button class="hamburger utfbutton_collapse" type="button">
                        <span class="utf_inner_button_box">
                            <span class="utf_inner_section"></span>
                        </span>
                </button>
            </div>
        </div>
    </div>
</header>



<div class="mobilenav">
    <ul>
        <li>
            <a class="{{ (request()-> is('/')) ? 'current' : '' }}" href="/">
                <img src="/icons/window-alt.svg" alt="">
            </a>
        </li>
        <li><a class="{{ (request()-> is('blog')) ? 'current' : '' }}"
               href="/blog">
                <img src="/icons/newspaper.svg" alt="">
            </a></li>
        <li><a class="{{ (request()-> is('listings')) ? 'current' : '' }}"
               href="/listings" id="idForListings">
                <img src="/icons/home-location-alt.svg" alt="">
            </a></li>
        <li><a class="{{ (request()-> is('foods')) ? 'current' : '' }}"
               href="/foods">
                <img src="/icons/soup.svg" alt="">
            </a></li>
        @guest()
        <li><a href="#dialog_signin_part"
               class="sign-in popup-with-zoom-anim">
                <img src="/icons/sign-in-alt.svg" alt="">
            </a></li>
        @endguest

        @auth()
        <li><a class="{{ (request()-> is('dashboard')) ? 'current' : '' }}"
               href="/dashboard">
                <img src="/icons/mode-portrait.svg" alt="">
            </a></li>
        @endauth
    </ul>
</div>

<script type="text/javascript">
    $(".btn-refresh").click(function(){
        $.ajax({
            type:'GET',
            url:'/refresh_captcha',
            success:function(data){
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
<script>

@guest()

    let pswr = document.querySelector('#username2')
    pswr.addEventListener('input', () => {
        if(pswr.value.length > 4)
        {
            document.querySelector('#passInfo').innerText = "";
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/check-login/'+pswr.value,
                success:function(data){
                    if(data['status']=='True'){
                         document.querySelector('#btnreg').disabled = false;
                    }else{
                        document.querySelector('#passInfo').innerText = "This login is available in the system";
                         document.querySelector('#btnreg').disabled = true;
                    }


                }
            });

        }
        else{
            document.querySelector('#passInfo').innerText = "Login min lenth 4";
                     document.querySelector('#btnreg').disabled = true;
        }
    })


@endguest

    function getCoords(){
        let coords = {};
        function showPosition(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;
            localStorage.setItem('latitude',latitude);
            localStorage.setItem('longitude',longitude);

            const listSelect = document.querySelector('#idForListings');
            let firstUrl = listSelect.href;
            firstUrl+= '?lat='+latitude +'&lng='+longitude;
            // console.log(firstUrl)
            listSelect.href = firstUrl;
        }
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    getCoords()
    // document.addEventListener("deviceready", getCoords, false);

    // console.log(coords.latitude,coords.longitude)
</script>

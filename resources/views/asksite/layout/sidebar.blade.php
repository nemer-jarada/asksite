<div class="col s12 m4 l4">

    <div class="sidebar-subscribe w100dt mb-30">
        <div class="sidebar-title center-align">

            <div class="subscribe">
                @if (Auth::guest())
                    <h2>تسجيل الدخول</h2>
                    <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input name="email" type="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <small class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="password" type="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                id="exampleInputPassword" placeholder="Password" autocomplete="current-password">
                            @error('password')
                                <small class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                    Me</label>
                            </div>
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                    </form>
                @elseif (Auth::check())
                    Welcome : {{ Auth::user()->name }}
                    <br>
                    <a class="dropdown-item btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('site.Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                @endif
            </div>




        </div>
        <!-- /.sidebar-title -->


        <!-- /.subscribe -->

    </div>
    <!-- /.sidebar-subscribe -->





    <div class="featured-posts w100dt mb-30">
        <div class="sidebar-title center-align">
            <h2>آخر المقالات</h2>
        </div>
        <!-- /.sidebar-title -->

        <div class="sidebar-posts">
            @foreach ($articals as $artical)
                <div class="card">
                    <div class="card-image mb-10">
                        <img src="{{ asset('uploads/images/articals/' . $artical->image) }}" alt="Image">
                        <span class="effect"></span>
                    </div>
                    <!-- /.card-image -->
                    <div class="card-content w100dt">
                        <h4>
                            <a href="{{ route('oneartical', $artical->id) }}"
                                class="tag left w100dt l-blue mb-10">{{ $artical->title }}</a>
                        </h4>
                        <p class="card-title">
                            {{-- هنا --}}
                            {{ Str::words($artical->artical, '15') }}
                            {{-- {{ $artical->artical }} --}}
                        </p>
                        <ul class="post-mate-time left">
                            <li>
                                <p class="hero left">
                                    By - <a href="#" class="l-blue">{{ $artical->user->name }}</a>
                                </p>
                            </li>
                        </ul>

                        <ul class="post-mate right">
                            <li class="comment">
                                <a href="#">
                                    <i class="icofont icofont-comment"></i>
                                    {{ $artical->comment->count() }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-content -->
                </div>
                <!-- /.card -->
            @endforeach


        </div>
        <!-- /.sidebar-posts -->

    </div>
    <!-- /.featured-posts -->


    <div class="sidebar-followme w100dt mb-30">
        <div class="sidebar-title center-align">
            <h2>Follow Us</h2>
        </div>
        <!-- /.sidebar-title -->

        <ul class="followme-links w100dt">
            <li class="mrb15">
                <a href="#" class="facebook">
                    <i class="icofont icofont-social-facebook"></i>
                    <small class="Followers white-text">105 Likes</small>
                </a>
            </li>
            <li class="mrb15">
                <a href="#" class="twitter">
                    <i class="icofont icofont-social-twitter"></i>
                    <small class="Followers white-text">50 Follows</small>
                </a>
            </li>
            <li>
                <a href="#" class="google-plus">
                    <i class="icofont icofont-social-google-plus"></i>
                    <small class="Followers white-text">39 Follows</small>
                </a>
            </li>

            <li class="mrb15">
                <a href="#" class="linkedin">
                    <i class="icofont icofont-brand-linkedin"></i>
                    <small class="Followers white-text">50 Follows</small>
                </a>
            </li>
            <li class="mrb15">
                <a href="#" class="pinterest">
                    <i class="icofont icofont-social-pinterest"></i>
                    <small class="Followers white-text">50 Follows</small>
                </a>
            </li>
            <li>
                <a href="#" class="instagram">
                    <i class="icofont icofont-social-instagram"></i>
                    <small class="Followers white-text">39 Likes</small>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.sidebar-followme -->

</div>

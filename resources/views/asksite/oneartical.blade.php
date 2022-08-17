@extends('asksite.layout.master')
@section('content')




    <!-- ==================== header-section Start ====================-->
    <section id="breadcrumb-section" class="breadcrumb-section w100dt mb-30">
        <div class="container">

            <nav class="breadcrumb-nav w100dt">
                <div class="page-name hide-on-small-only left">
                    <h4>SINGLE BLOG</h4>
                </div>
                <div class="nav-wrapper right">
                    <a href="index.html" class="breadcrumb">Home</a>
                    <a href="single-blog.html" class="breadcrumb active">Blog Single</a>
                </div>
                <!-- /.nav-wrapper -->
            </nav>
            <!-- /.breadcrumb-nav -->

        </div>
        <!-- container -->
    </section>
    <!-- /.breadcrumb-section -->
    <!-- ==================== header-section End ====================-->





    <!-- ==================== single-blog-section start ====================-->
    <section id="single-blog-section" class="single-blog-section w100dt mb-50">
        <div class="container">
            <div class="row">

                <div class="col m12 s12">

                    <div class="blogs mb-30">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ $articals->image }}" alt="Image">
                            </div>
                            <!-- /.card-image -->
                            <div class="card-content w100dt">
                                <p>
                                    <a href="#" class="tag left w100dt l-blue mb-30">Lifestyle</a>
                                </p>
                                <a href="#" class="card-title mb-30">
                                    {{ $articals->title }}
                                </a>

                                <ul class="post-mate-time left mb-30">
                                    <li>
                                        <p class="hero left">
                                            By - <a href="#" class="l-blue">{{ $articals->user->name }}</a>
                                        </p>
                                    </li>
                                    <li>
                                        <i class="icofont icofont-ui-calendar"></i>
                                        {{ $articals->created_at->format('d/F/Y') }}
                                    </li>
                                </ul>

                                <ul class="post-mate right mb-30">
                                    <li class="comment">
                                        <a href="#">
                                            <i class="icofont icofont-comment"></i> {{ $articals->comment->count() }}
                                        </a>
                                    </li>
                                </ul>

                                <p class="w100dt mb-10">
                                    {{ $articals->artical }}
                                </p>



                                <ul class="share-links right">
                                    <li><a href="#" class="facebook"><i
                                                class="icofont icofont-social-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="icofont icofont-social-twitter"></i></a>
                                    </li>
                                    <li><a href="#" class="google-plus"><i
                                                class="icofont icofont-social-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin"><i
                                                class="icofont icofont-brand-linkedin"></i></a></li>
                                    <li><a href="#" class="pinterest"><i
                                                class="icofont icofont-social-pinterest"></i></a></li>
                                    <li><a href="#" class="instagram"><i
                                                class="icofont icofont-social-instagram"></i></a></li>
                                </ul>

                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.blogs -->

                    <div class="prv-nxt-post w100dt mb-30">
                        <div class="row">
                            @if ($prev)
                                <div class="col m6 s12">
                                    <div class="sb-prv-post">
                                        <div class="pn-img left">
                                            <img src="{{ $articals->image }} " alt="Image">
                                        </div>
                                        <div class="pn-text left-align">
                                            <p class="title-name mb-10">Lorem ipsum dolor sit amet
                                                consectetur</p>
                                            <a href="{{ route('oneartical', $prev->id) }}" class="prv-nxt-btn l-blue"><i
                                                    class="icofont icofont-caret-left"></i> السابق</a>
                                        </div>
                                    </div>
                                    <!-- /.sb-prv-post -->
                                </div>
                                <!-- colm6 -->
                            @endif
                            @if ($next)
                            <div class="col m6 s12">
                                <div class="sb-nxt-post">
                                    <div class="pn-img right">
                                        <img src="{{ $articals->image }}" alt="Image">
                                    </div>
                                    <div class="pn-text right-align">
                                        <p class="title-name mb-10">Lorem ipsum dolor sit amet
                                            consectetur</p>

                                            <a href="{{ route('oneartical', $next->id) }}" class="prv-nxt-btn l-blue">التالي<i
                                                    class="icofont icofont-caret-right"></i></a>
                                    </div>
                                </div>
                                <!-- /.sb-nxt-post -->
                            </div>
                            <!-- colm6 -->
                            @endif
                        </div>
                        <!-- row -->
                    </div>

                    <div class="peoples-comments w100dt mb-30">
                        <div class="sidebar-title center-align">
                            <h2>{{ $articals->comment->count() }} Comments</h2>
                        </div>

                        <div class="comment-area w100dt">
                            @foreach ($articals->comment as $comment)
                                <div class="comment w100dt mb-30">
                                    <div class="ppic left">
                                        <img src="" alt="Image">
                                    </div>
                                    <!-- /.ppic -->
                                    <div class="pname">
                                        <h4 class="mb-10">
                                            <a href="#" class="card-title l-blue">
                                                {{ $comment->user->name }}
                                            </a>
                                        </h4>
                                        <p class="comment-text mb-10">
                                            {{ $comment->comment }}
                                        </p>

                                        <ul class="post-mate-time left">
                                            <li>
                                                <i class="icofont icofont-ui-calendar"></i>
                                                {{ $comment->created_at->format('d/M/Y') }}
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- /.pname -->
                                </div>
                                <!-- /.comment -->
                            @endforeach



                        </div>
                        <!-- /.comment-area -->
                    </div>
                    <!-- /.peoples-comments -->

                    <div class="leave-comment">

                        <div class="sidebar-title center-align">
                            <h2>اترك تعليقك</h2>
                        </div>

                        <form class="comment-area w100dt" action="#">
                            <div class="row">

                                <div class="col s12">
                                    <div class="form-item">
                                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                                        <label for="textarea1">اكتب تعليقك هنا</label>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->
                            <button type="button" class="custom-btn waves-effect waves-light right">تقديم</button>
                        </form>
                        <!-- /.comment-area -->
                    </div>
                    <!-- /.leave-comment -->

                </div>
                <!-- colm8 -->


            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- /#single-blog-section -->
    <!-- ==================== single-blog-section end ====================-->
@stop

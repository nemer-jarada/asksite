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
                    <a href="{{ route('index') }}" class="breadcrumb">Home</a>
                    <a href="{{ route('index') }}" class="breadcrumb active">Blog Single</a>
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

                <div class="col m8 s12">

                    <div class="blogs mb-30">
                        <div class="card">
                            <div class="card-content w100dt">
                                <p>
                                    <a href="#"
                                        class="tag left w100dt l-blue mb-30 tiger">{{ $question->category->name }}</a>
                                </p>
                                <a href="#" class="card-title mb-30">
                                    {{ $question->question }}
                                </a>
                                <p class="mb-30">
                                    {{ $question->more_detail }}
                                </p>
                                <ul class="post-mate-time left mb-30">
                                    <li>
                                        <p class="hero left">
                                            By - <a href="#" class="l-blue">{{ $question->user->name }}</a>
                                        </p>
                                    </li>
                                    <li>
                                        <i
                                            class="icofont icofont-ui-calendar"></i>{{ $question->created_at->format('d/F/Y') }}
                                    </li>
                                </ul>

                                <ul class="post-mate right mb-30">
                                    <li class="like">
                                        <a href="#">
                                            <i class="icofont icofont-heart-alt"></i> 55
                                        </a>
                                    </li>
                                    <li class="comment">
                                        <a href="#">
                                            <i class="icofont icofont-comment"></i> {{ $question->answer->count() }}
                                        </a>
                                    </li>
                                </ul>





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

                            <div class="col m6 s12">
                                <div class="sb-prv-post">
                                    <div class="pn-text left-align">

                                        <p class="title-name mb-10">{{ Str::words($prev_qu->question, '12') }}</p>
                                        <a href="{{ route('single', $prev_qu->id) }}" class="prv-nxt-btn l-blue"><i
                                                class="icofont icofont-caret-left"></i>السؤال السابق</a>
                                    </div>
                                </div>
                                <!-- /.sb-prv-post -->
                            </div>
                            <!-- colm6 -->

                            <div class="col m6 s12">
                                <div class="sb-nxt-post">
                                    <div class="pn-text right-align">
                                        <p class="title-name mb-10">{{ Str::words($next_qu->question, '12') }}</p>
                                        <a href="{{ route('single', $next_qu->id) }}" class="prv-nxt-btn l-blue">السؤال
                                            التالي <i class="icofont icofont-caret-right"></i></a>
                                    </div>
                                </div>
                                <!-- /.sb-nxt-post -->
                            </div>
                            <!-- colm6 -->

                        </div>
                        <!-- row -->
                    </div>

                    <div class="peoples-comments w100dt mb-30">
                        <div class="sidebar-title center-align">
                            <h2>{{ $question->answer->count() }} الإجابات</h2>
                        </div>

                        <div class="comment-area w100dt">

                            @foreach ($answers as $answer)
                                <div class="comment w100dt border-b">
                                    <div class="ppic left">
                                        <img src="{{ $answer->user->image }}" alt="Image">
                                    </div>
                                    <!-- /.ppic -->
                                    <div class="pname">
                                        <h4 class="mb-10">
                                            <a href="#" class="card-title l-blue">
                                                {{ $answer->user->name }}
                                            </a>
                                        </h4>
                                        <p class="comment-text mb-10">
                                            {{ $answer->answer }}
                                        </p>

                                        <ul class="post-mate-time left">
                                            <li class="like">
                                                <a href="#">
                                                    <i class="icofont icofont-heart-alt"></i> 55
                                                </a>
                                            </li>

                                            <li>
                                                <i class="icofont icofont-ui-calendar"></i>
                                                {{ $answer->created_at->format('d/F/Y') }}
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- /.pname -->
                                </div>
                                <!-- /.comment -->
                            @endforeach


                        </div>
                        <!-- /.comment-area -->
                        {{ $answers->links() }}
                    </div>

                    <!-- /.peoples-comments -->

                    <div class="leave-comment">

                        <div class="sidebar-title center-align">
                            <h2>اترك إجابتك</h2>
                        </div>

                        <form class="comment-area w100dt" action="#">
                            <div class="row">
                                <div class="col s12">
                                    <div class="form-item">
                                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                                        <label for="textarea1">Textarea</label>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->
                            <button type="button" class="custom-btn waves-effect waves-light right">تقديم الإجابة</button>
                        </form>
                        <!-- /.comment-area -->
                    </div>
                    <!-- /.leave-comment -->

                </div>
                <!-- colm8 -->




                @include('asksite.layout.sidebar')

            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- /#single-blog-section -->
    <!-- ==================== single-blog-section end ====================-->






@stop

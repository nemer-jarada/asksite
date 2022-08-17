@extends('asksite.layout.master')
@section('content')

<!-- ==================== blog-slider-section start ==================== -->
<section id="blog-slider-section" class="blog-slider-section w100dt mb-50">
    <div class="container">

        <div class="slider">
            <ul class="slides">
                @foreach ($quotes as $quote)
                    <li class="slider-item">
                        <img src="{{ asset('assetsweb/img/background.jpg') }}" alt="Image">
                        <div class="caption center-align">
                            <a href="#" class="tag l-blue w100dt mb-30">اقتباسات</a>
                            <p>
                                {{ $quote->quote }}
                            </p>
                            <a href="single-blog.html"
                                class="custom-btn waves-effect waves-light">{{ $quote->who_said }}</a>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>

    </div>
    <!-- container -->
</section>
<!-- /#blog-slider-section -->
<!-- ==================== blog-slider-section end ==================== -->




<!-- ==================== daily-lifestyle-section Start ==================== -->
<section id="daily-lifestyle-section" class="daily-lifestyle-section mb-50">
    <div class="container">

        <div class="owl-carousel small-carousel owl-theme">
            @foreach ($categories as $category)
                <div class="item">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="{{ asset('assetsweb/img/img1.jpg') }}" alt="Image">
                            <span class="effect"></span>
                        </div>
                        <!-- /.card-image -->
                        <div class="card-stacked">
                            <div class="card-content">
                                <a href="{{ route('category', $category->name) }}" class="tag left l-blue mb-10">{{ $category->name }}</a>
                                <a href="{{ route('category', $category->name) }}" class="sm-name">Trud Exercitation EllaMcop
                                    Saboris</a>
                            </div>
                            <!-- /.card-content -->
                            <div class="card-action">
                                <p class="hero left">
                                    <a href="{{ route('category', $category->name) }}" class="l-blue">عدد الأسئلة</a>
                                </p>
                                <ul class="post-mate right">
                                    <li>
                                        <a href="#" class="m-0"><i class="icofont icofont-comment"></i>

                                            {{ $category->questions->count() }}</a>
                                    </li>
                                </ul>
                                <!-- /.post-mate -->
                            </div>
                            <!-- /.card-action -->
                        </div>
                        <!-- /.card-stacked -->
                    </div>
                    <!-- /.card -->
                </div>
            @endforeach

            <!-- /.item -->
        </div>
        <!-- /.small-carousel -->
    </div>
    <!-- container -->
</section>
<!-- /#daily-lifestyle-section -->
<!-- ==================== daily-lifestyle-section End ==================== -->





<!-- ==================== blog-section start ==================== -->
<section id="blog-section" class="blog-section w100dt mb-50">
    <div class="container">

        <div class="row">




            <div class="col s12 m8 l8">

                @foreach ($questions as $question)
                    <div class="blogs mb-30">
                        <div class="card">
                            <div class="card-content w100dt">
                                <p>
                                    <a href="#"
                                        class="tag left w100dt l-blue mb-30 tiger">{{ $question->category->name }}
                                    </a>
                                </p>
                                <a href="{{ route('single', $question->id) }}" class="card-title">
                                    {{ $question->question }}
                                </a>
                                <p class="mb-30">
                                    {{ Str::words($question->more_detail, '30') }}
                                </p>
                                <ul class="post-mate-time left">
                                    <li>
                                        <p class="hero left">
                                            By - <a href="#" class="l-blue">{{ $question->user->name }}</a>
                                        </p>
                                    </li>
                                    <li>
                                        <i class="icofont icofont-ui-calendar"></i>
                                        {{ $question->created_at->format('d/M/Y') }}
                                    </li>
                                </ul>


                                @php
                                $like_count = 0;
                                @endphp
                                @foreach ($question->like as $like)
                                    @php
                                        if($like->likes == 1) {
                                            $like_count++;
                                        }
                                    @endphp
                                @endforeach


                                <ul class="post-mate right">
                                    <li class="like">
                                        <a href="#">
                                            <i class="icofont icofont-heart-alt"></i> {{ $like_count }}
                                        </a>
                                    </li>
                                    <li class="comment">
                                        <a href="#">
                                            <i class="icofont icofont-comment"></i>
                                            {{ $question->answer->count() }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.card -->
                    </div>
                @endforeach

                <!-- /.blogs -->


                {{ $questions->links() }}

            </div>



            {{-- من هنا السايدبار يبدأ --}}
            @include('asksite.layout.sidebar')
            {{-- هنا السايدبار ينتهي --}}




        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- /#blog-section -->
<!-- ==================== blog-section end ==================== -->


@stop

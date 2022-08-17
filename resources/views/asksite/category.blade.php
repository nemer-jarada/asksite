@extends('asksite.layout.master')
@section('content')





    <!-- ==================== header-section Start ==================== -->
    <section id="breadcrumb-section" class="breadcrumb-section w100dt mb-30">
        <div class="container">

            <nav class="breadcrumb-nav w100dt">
                <div class="page-name hide-on-small-only left">
                    <h3>نفس النوع</h3>
                </div>
                <div class="nav-wrapper right">
                    <a href="{{ route('index') }}" class="breadcrumb">الرئيسية</a>
                    <a class="breadcrumb active">نفس النوع</a>
                </div>
                <!-- /.nav-wrapper -->
            </nav>
            <!-- /.breadcrumb-nav -->

        </div>
        <!-- container -->
    </section>
    <!-- /.breadcrumb-section -->
    <!-- ==================== header-section End ==================== -->


<!-- ==================== blog-section start ==================== -->
<section id="blog-section" class="blog-section w100dt mb-50">
    <div class="container">

        <div class="row">




                @foreach ($questions as $question)
                <div class="col s12 m8 l6">
                    <div class="blogs mb-30">
                        <div class="card">
                            <div class="card-content w100dt min-heigh2">
                                <p>
                                    <p href="#"
                                        class="tag left w100dt l-blue mb-30 tiger">{{ $question->category->name }}
                                    </p>
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
                    </div>
                @endforeach

                <!-- /.blogs -->


                {{-- {{ $questions->links() }} --}}





        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- /#blog-section -->
<!-- ==================== blog-section end ==================== -->


@stop

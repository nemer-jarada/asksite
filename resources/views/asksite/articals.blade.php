@extends('asksite.layout.master')
@section('content')

    <!-- ==================== header-section Start ==================== -->
    <section id="breadcrumb-section" class="breadcrumb-section w100dt mb-30">
        <div class="container">

            <nav class="breadcrumb-nav w100dt">
                <div class="page-name hide-on-small-only left">
                    <h3>المقالات</h3>
                </div>
                <div class="nav-wrapper right">
                    <a href="{{ route('index') }}" class="breadcrumb">الرئيسية</a>
                    <a class="breadcrumb active">المقالات</a>
                </div>
                <!-- /.nav-wrapper -->
            </nav>
            <!-- /.breadcrumb-nav -->

        </div>
        <!-- container -->
    </section>
    <!-- /.breadcrumb-section -->
    <!-- ==================== header-section End ==================== -->



    <!-- ==================== cateogry-section start ==================== -->
    <section id="cateogry-section" class="cateogry-section w100dt mb-50">
        <div class="container">
            <div class="row">

                <div class="col s12 m12 l12">



                    <div class="row">


                        @foreach ($articals as $artical)

                            <div class="col m4 s12">
                                <div class="blogs mb-30 hieght-tiger">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="{{ $artical->image }}" alt="Image">

                                        </div>
                                        <!-- /.card-image -->
                                        <div class="card-content w100dt min-heigh">
                                            <p>
                                                <a href="#" class="tag left w100dt l-blue mb-25">{{ $artical->catartical->name }}</a>
                                            </p>
                                            <a href="{{ route('oneartical', $artical->id) }}" class="card-title font-tiger">
                                                {{ Str::words($artical->title, 9, '...') }}
                                            </a>
                                            <p class="mb-30">
                                                {{ Str::words($artical->artical, 25,'...') }}
                                            </p>
                                            <ul class="post-mate-time left">
                                                <li>
                                                    <p class="hero left">
                                                        By - <a href="#" class="l-blue">{{ $artical->user->name }}</a>
                                                    </p>
                                                </li>
                                                <li>
                                                    <i class="icofont icofont-ui-calendar"></i>
                                                    {{ $artical->created_at->format('M/Y') }}
                                                </li>
                                            </ul>

                                            <ul class="post-mate right">
                                                <li class="comment">
                                                    <a href="#">
                                                        <i class="icofont icofont-comment"></i> {{ $artical->comment->count() }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.card-content -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.blogs -->
                            </div>
                            <!-- colm6 -->
                        @endforeach




                    </div>
                    <!-- row -->
                    {{ $articals->links() }}

                </div>
                <!-- colm8 -->


            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- /#cateogry-section -->
    <!-- ==================== cateogry-section end ==================== -->
@stop

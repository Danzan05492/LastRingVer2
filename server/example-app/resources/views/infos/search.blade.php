@extends('layouts.front.layout')
@section('title','Результаты поиска')

@section('content')
<div class="page-wrapper">
                <div class="blog-custom-build">
                    @if ($posts->count())
                     @foreach ($posts as $post)
                        <div class="blog-box wow fadeIn">
                            <div class="post-media">
                                <a href="{{route('article.single',['slug'=>$post->slug])}}" title="">
                                            <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>


                                            <!-- end hover -->
                                        </a>
                                    </div>
                                    <!-- end media -->

                                    <div class="blog-meta big-meta text-center">
                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                        <h4><a href="{{route('article.single',['slug'=>$post->slug])}}" title="">{{ $post->title }}</a></h4>
                                        <p>{!! $post->content !!}</p>

                                <small>{{$post->getInfoDate()}}</small>
                                <small><i class="fa fa-eye"></i> {{$post->views}}</small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
                   @endforeach
                   @else
                        По вашему запросу ничего не найдено
                   @endif
            </div>
    </div>

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">                               
                                    {{$posts->links('vendor.pagination.default')}}
                            </div><!-- end col -->
                        </div><!-- end row -->
@endsection
@extends('layouts.front.category_layout')
@section('title',"Котегория: ".$category->title)
@section('page-title')
<div class="page-title db">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2> {{$category->title}} <small class="hidden-xs-down hidden-sm-down"> описание категории. </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">{{$category->title}}</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
@endsection

@section('content')
<div class="page-wrapper">
                <div class="blog-custom-build">
                     @foreach ($posts as $post)
                        <div class="blog-box wow fadeIn">
                            <div class="post-media">
                                <a href="{{route('article.single',['slug'=>$post->slug])}}" title="">
                                            <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div>
                                    

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
            </div>
    </div>

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                               
                                    {{$posts->links('vendor.pagination.default')}}
                 
                               
                            </div><!-- end col -->
                        </div><!-- end row -->
@endsection
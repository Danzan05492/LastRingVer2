<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Топовые Посты</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    <!--Переменная определена в AppServiceProvider-->
                    @foreach($popular_posts as $post)
                    <a href="{{route('article.single',['slug'=>$post->slug])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset($post->getImage())}}" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">{{$post->title}}</h5>
                            <small>{{$post->getInfoDate()}}</small>
                            <small>| <i class="fa fa-eye"></i> {{$post->views}}</small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div><!-- end blog-list -->
    </div>                           

    <div class="widget">
        <h2 class="widget-title">Категории</h2>
            <div class="link-widget">
                <ul>
                    @foreach($popular_cats as $category)
                    <li><a href="{{route('categories.single',['slug'=>$category->slug])}}">{{$category->title}} <span>({{$category->posts_count}})</span></a></li>
                    @endforeach
                </ul>
            </div>
    </div>
</div>
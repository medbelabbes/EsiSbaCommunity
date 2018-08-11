@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default col-lg-offset-2 col-md-8">
            <div class="panel-heading">
                <h3 class="panel-title">Publications</h3>
            </div>
            <div class="panel-body">
                @if(count($posts)>0)
                    @foreach($posts as $post)

                    <div class="col-md-2">
                        <img src="/images/{{ $post->user->photo }}" class="img-circle img-thumbnail comment-img"/>
                        <small> {{ $post->user->nom }}
                            </small>
                        <small>
                            {{ $post->user->prenom }}</small>
                </div>
                <div class="col-md-10">


                                <div class="profile-post">
                                    <p style="text-decoration: none">  <a href="{{ url('/profile/'.$post->user_id.'/publications/'.$post->id) }}"> {{$post->content}}</a>
                                    </p>

                                    <small><i class="fas fa-comments"></i> {{count($post->comments)}} <i class="fas fa-arrow-alt-circle-up" style="color: #2ab27b"></i> {{count2_up($post->id)}} <i class="fas fa-arrow-alt-circle-down" style="color: #bf5329"></i> {{count2_down($post->id)}}</small>
                                    <small class="pull-right">Publié le : {{ date('d F Y', strtotime($post->created_at)) }}</small>
                                </div>
                                </a>


                </div>
                    @endforeach
                @endif
            </div>

        </div>
        <div class="panel panel-default col-lg-offset-2 col-md-8">
            <div class="panel-heading">
                <h3 class="panel-title">Blog</h3>
            </div>
            <div class="panel-body">
                @if(count($articles)>0)
                    @foreach($articles as $article)

                        <div class="col-md-2">
                            <img src="/images/{{ $article->user->photo }}" class="img-circle img-thumbnail comment-img"/>
                            <small> {{ $article->user->nom }}
                            </small>
                            <small>
                                {{ $article->user->prenom }}</small>
                        </div>
                        <div class="col-md-10">

                             <div class="blog-articles">

                                    <h3>{{$article->titre}}</h3>

                                    <p> {{ substr(strip_tags($article->content), 0, 100) }}{{ strlen(strip_tags($article->content)) > 100 ? '...' : "" }}
                                        <a href="{{ url('/profile/'.$article->user->id.'/blog/'.$article->id) }}">
                                            Lire la suite
                                        </a>
                                    </p>

                                    <small><i class="fas fa-comments"></i> {{count($article->comments)}} <i class="fas fa-arrow-alt-circle-up" style="color: #2ab27b"></i> {{count_up($article->id)}} <i class="fas fa-arrow-alt-circle-down" style="color: #bf5329"></i> {{count_down($article->id)}}</small>
                                    <small class="pull-right">Publié le : {{ date('d F Y', strtotime($article->created_at)) }}</small>

                                </div>


                        </div>
                    @endforeach
                @endif
            </div>
            <div class="panel-footer">
                {{ $articles->links() }}
            </div>

        </div>

    </div>
</div>
@endsection

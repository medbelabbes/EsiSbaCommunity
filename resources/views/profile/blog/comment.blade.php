<div class="panel-footer">

<div class="comment">
    <div class="comment-img">
        <img src="/images/{{ $user->photo }}" class="img-circle img-thumbnail"/>
    </div>

    <div class="comment-block">
        <form action="{{ url('/profile/'.$user->id.'/blog/'.$article->id.'/comment') }}" method="POST">
            {{ csrf_field() }}

            <input type="hidden" value="{{ $article->id }}" name="commentable_id">
            <input type="hidden" value="{{ 'App\Article' }}" name="commentable_type">

            <input type="text" name="content" id="content" class="form-control" placeholder="Entrer votre commentaire" required>

            <div class="vote radio-inline">
                <input id="up" type="radio" name="vote" value="up" />
                <label class="choice up" for="up"></label>
                <input id="down" type="radio" name="vote" value="down" />
                <label class="choice down"for="down"></label>
            </div>

            <button type="submit" class="btn btn-primary pull-right">Commenter</button>

        </form>
    </div>

</div>

</div>



@foreach($comments as $comment)


    <div class="comments">

    <div class="comment-img">
        <img src="/images/{{ $comment->user->photo }}" class="img-circle img-thumbnail"/>
    </div>
    <div class="well " style="{{$comment->vote == 'up' ?
                                'background-color : #2ab27b; color: #fff; ' : ($comment->vote == 'down' ?
                                'background-color : #bf5329; color: #fff' : '')}}">
        <a href="{{ url('/profile/'.$comment->user->id) }}" style="color: #333333">
            <b>{{ $comment->user->prenom }}</b>
        </a>

         {{$comment->content}}
        <div class="pull-right">
            <small>{{ date('d F Y à H:i', strtotime($comment->created_at)) }} </small><br/>
        </div>
    </div>

    <div class="delete">
        @if($comment->user_id == Auth::User()->id || $comment->commentable->user_id == Auth::User()->id )
            <form action="{{ url('/'.$comment->id.'/destroy') }}" method="post">
                <input type="hidden" name="_method" value="delete" />
                {!! csrf_field() !!}
                <button type="submit" style="background-color: transparent; border: transparent"><i class="fas fa-times" style="color: red"></i></button>
            </form>

        @endif
    </div>

</div>

@endforeach

<div class="text-center">
    {{$comments->links()}}
</div>






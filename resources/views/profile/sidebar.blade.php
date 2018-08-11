<div class="panel-body">

<img src="/images/{{ $user->photo }}" class="profile-img img-circle img-thumbnail"/>

    <div class="profile-name">
        {{ $user->prenom }} {{ $user->nom }}
    </div>

    @if(Auth::User()->id != $user->id)
    <div class="profile-button">

                    <button type="submit" class="btn btn-success btn-sm">Ajouter</button>


            <a href="{{route('conversations.show',$user->id)}}"><button type="button" class="btn btn-danger btn-sm">Contacter</button></a>

    </div>
     @endif



</div>



<nav>
    <ul class="nav navbar-default text-left">
        <li><a href="{{ url('/profile/'.$user->id) }}"> Information</a></li>
        <li><a href="{{ url('/profile/'.$user->id.'/blog/') }}"> Blog</a></li>
        <li><a href="{{ url('/profile/'.$user->id.'/publications/') }}"> Publications</a></li>

    </ul>
</nav>
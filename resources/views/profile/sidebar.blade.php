<div class="panel-body">

<img src="/images/{{ $user->photo }}" class="profile-img img-circle img-thumbnail"/>

    <div class="profile-name">
        {{ $user->prenom }} {{ $user->nom }}
    </div>


    <div class="profile-button">
        <button type="button" class="btn btn-success btn-sm">Ajouter</button>
        <button type="button" class="btn btn-danger btn-sm">Contacter</button>
    </div>



</div>



<nav>
    <ul class="nav navbar-default text-left">
        <li><a href="{{ url('/profile/'.$user->id) }}"> Information</a></li>
        <li><a href="{{ url('/profile/'.$user->id.'/blog/') }}"> Blog</a></li>
        <li><a href="{{ url('/profile/'.$user->id.'/publications/') }}"> Publications</a></li>

    </ul>
</nav>
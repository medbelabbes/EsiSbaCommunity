<div class="panel-body">

<img src="/images/{{ $user->photo }}" class="profile-img img-circle img-thumbnail"/>

    <div class="profile-name">
        {{ $user->prenom }} {{ $user->nom }}
    </div>

    <div class="profile-etat">
                             <span class="label label-success">
                                 En ligne
                             </span>
    </div>

    <div class="profile-button">
        <button type="button" class="btn btn-success btn-sm">Ajouter</button>
        <button type="button" class="btn btn-danger btn-sm">Contacter</button>
    </div>



</div>

<div class="text-left">
    <blockquote>
        <b >Bio</b>
        <p>{{ $user->apropos }}</p>
    </blockquote>

</div>

<nav>
    <ul class="nav navbar-default text-left">
        <li><a href="{{ url('/profile/'.$user->id) }}"><i class="fas fa-times"></i> Acceuil</a></li>
        <li><a href="{{ url('/profile/'.$user->id.'/blog/') }}"><i class="fas fa-times"></i> Blog</a></li>
    </ul>
</nav>
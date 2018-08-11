
@extends('profile.index')

@section('profile-content')


                    <div class="panel-heading">
                        <h3 class="panel-title">Information personnelle</h3>
                    </div>
                    <div class="panel-body">

                        <div class="col-md-6" style="font-size: 22px">
                            <i class="fas fa-user"></i> {{ $user->nom }} {{ $user->prenom }}
                        </div>
                        @if($user->date_n == null  || $user->lieu_n == null || $user->sexe == null || $user->apropos == null)
                            <div class="col-md-12 alert-warning" style="margin:  20px auto; padding: 15px;">
                                    Completer votre<a href="{{url('/profile/parametres/')}}"> profile</a>
                            </div>
                        @else
                            <div class="col-md-6" style="font-size: 22px">
                                <i class="fas fa-birthday-cake"></i> {{ date('d F Y', strtotime($user->date_n)) }}
                            </div>
                            <div class="col-md-6" style="font-size: 22px">
                                <i class="fas fa-map-marker"></i> {{ $user->lieu_n }}
                            </div>
                            <div class="col-md-6" style="font-size: 22px">
                                <i class="fas fa-transgender"></i> {{ $user->sexe }}
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <blockquote>
                                    <b >Bio</b>
                                    <p>{{ $user->apropos }}</p>
                                </blockquote>

                            </div>
                        @endif




                    </div>
                    <div class="panel-footer">

                    </div>



@endsection
@section('scripts')

@stop
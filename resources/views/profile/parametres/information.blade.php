
<div role="tabpanel" class="tab-pane active" id="Information">

    <div class="panel-heading">
        <h3 class="panel-title">Information personnelle</h3>
    </div>

    <form class="form" method="POST" action="{{ url('/profile/update') }}">
        {{ csrf_field() }}

        <div class="panel-body">
            <div class="col-md-12 ">


                <div class="row">

                    <div class="col-xs-6">
                        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="nom" class="control-label">Nom</label>
                                <input id="nom" type="text" class="form-control" name="nom" value="{{ Auth::user()->nom }}"  autofocus>
                                @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="email" class="control-label">Email</label>
                                <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"  disabled>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="prenom" class="control-label">Prénom</label>
                                <input id="prenom" type="text" class="form-control" name="prenom" value="{{ Auth::user()->prenom }}"  autofocus>
                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                                            <strong>{{ $errors->first('prenom') }}</strong>
                                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>


            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="date_n" class="control-label">Date de naissance</label>
                                <input type="date" id="date_n" class="form-control" name="date_n" value="{{ Auth::user()->date_n }}" >
                            </div>
                        </div>



                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="lieu_n"  class="control-label">Lieu de naissance</label>
                                <input type="text" id="lieu_n" class="form-control" name="lieu_n" value="{{ Auth::user()->lieu_n }}" >
                            </div>
                        </div>



                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <div class="col-md-12">

                                <label for="sexe"  class="control-label">Sexe</label>
                                <select id="sexe" name="sexe" class="form-control">
                                    <option value="Homme" {{ Auth::user()->sexe == 'Homme' ? 'selected' : '' }}>Homme</option>
                                    <option value="Femme" {{ Auth::user()->sexe == 'Femme' ? 'selected' : '' }}>Femme</option>
                                </select>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="col-md-12">
             <div class="form-group{{ $errors->has('apropos') ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <label for="apropos">Bio</label>
                        <textarea class="form-control" id="apropos" name="apropos" rows="3">{{ Auth::user()->apropos }}</textarea>
                        @if ($errors->has('apropos'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('apropos') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>




        <div class="panel-footer">
            <button type="submit" class="btn btn-primary  text-right">Sauvegarder</button>
        </div>

    </form>
</div>

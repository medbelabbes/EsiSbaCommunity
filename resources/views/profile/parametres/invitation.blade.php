<div role="tabpanel" class="tab-pane" id="invitationmails">

    <div class="panel-heading">
        <h3 class="panel-title">Invitation par email</h3>
    </div>

    <div class="col-md-12 panel-body">
        <form class="form-inline" method="POST" action="{{ url('/profile/mail/send') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Envoyer une invitation pour rejoindre EsiSbaCommunity</label>
                <input type="email" class="form-control" name="email" id="email" size="45" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-default">Envoyer</button>
        </form>
<br/>
        <div class="col-md-12 text-center">
            @foreach(Auth::User()->invitationmail as $invitation)
                <div class="well">
                    {{ $invitation->email }}
                </div>
            @endforeach
        </div>


    </div>




</div>

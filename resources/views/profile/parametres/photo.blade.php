<div role="tabpanel" class="tab-pane text-center" id="photo">

    <div class="panel-heading">
        <h3 class="panel-title">Photo de profile</h3>
    </div>

<div class="panel-body">
    <div class="col-lg-offset-4 col-md-4 ">
        <img src="/images/{{ Auth::user()->photo }}" class="img-circle img-thumbnail "/>

        <form class="form"  method="POST" action="{{ url('/profile/update_img') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="InputImg">Selectioner votre image</label>
                <input type="file" name="InputImg" id="InputImg">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <button type="submit" class="btn btn-default">Modifier</button>
        </form>
    </div>
</div>


</div>

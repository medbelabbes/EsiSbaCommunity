@extends('profile.index')

@section('profile-content')

                 <div class="panel-heading">

                     <form action="{{ url('/profile/'.$user->id.'/blog/'.$article->id.'/destroy') }}" method="post">
                         <input type="hidden" name="_method" value="delete" />
                         {!! csrf_field() !!}
                         <button type="submit" class="pull-right btn btn-warning btn-sm"><i class="fas fa-times"></i> Supprimer l'article</button>

                     </form>
                     <button type="button" class="pull-right btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-pencil-alt"></i> Modifier l'article</button>

                     <h3 class="panel-title">{{$article->titre}}</h3>
                  </div>

                    <div class="panel-body">
                        {!! $article->content !!}
                    </div>

                    <div class="panel-footer">
                        <div class="comment">
                            <div class="comment-img">
                                <img src="/images/{{ $user->photo }}" class="img-circle img-thumbnail"/>
                            </div>
                            <div class="comment-block">
                                <form action="">
                                    <input type="text" class="form-control" placeholder="Entrer votre commentaire">
                                </form>
                            </div>
                            <div class="comment-button">
                                <button type="submit" class="btn btn-primary">Commenter</button>
                            </div>
                         </div>
                    </div>

                 <!-- Modifier Article -->
                 @include('profile/blog/edit')


@endsection
@section('scripts')

    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>

    <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic  | alignleft aligncenter alignright alignjustify | bullist numlist ',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css']
        });

        // Prevent bootstrap dialog from blocking focusin
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });


    </script>
@stop

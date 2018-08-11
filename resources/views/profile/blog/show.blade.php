@extends('profile.index')

@section('profile-content')

                 <div class="panel-heading">
                     @if($user->id == Auth::User()->id )

                     <form action="{{ url('/profile/'.$user->id.'/blog/'.$article->id.'/destroy') }}" method="post">
                         <input type="hidden" name="_method" value="delete" />
                         {!! csrf_field() !!}
                         <button type="submit" class="pull-right btn btn-danger btn-sm"><i class="fas fa-times"></i> Supprimer l'article</button>

                     </form>
                     <button type="button" class="pull-right btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-pencil-alt"></i> Modifier l'article</button>
                        @endif
                     <h3 class="panel-title">{{$article->titre}}</h3>
                         <small >Publié le : {{ date('d F Y', strtotime($article->created_at)) }}</small>

                 </div>

                    <div class="panel-body">
                        {!! $article->content !!}
                    </div>


                        <!-- Commentaires -->
                        @include('profile/blog/comment')


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

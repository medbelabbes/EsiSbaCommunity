
@extends('profile.index')

@section('profile-content')


                    <div class="panel-heading">
                        @if($user->id == Auth::User()->id )
                        <button type="button" class="pull-right btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-pencil-alt"></i> Ajouter un article</button>
                        @endif

                            <h3 class="panel-title">Blog</h3>
                    </div>
                    <div class="panel-body">
                        @if(count($articles)>0)
                            @foreach($articles as $article)
                            <div class="col-md-6">
                            <div class="blog-articles">

                                <h3>{{$article->titre}}</h3>

                                <p> {{ substr(strip_tags($article->content), 0, 200) }}{{ strlen(strip_tags($article->content)) > 250 ? '...' : "" }}
                                    <a href="{{ url('/profile/'.$user->id.'/blog/'.$article->id) }}">
                                        Lire la suite
                                    </a>
                                </p>

                                <small><i class="fas fa-comments"></i> {{count($article->comments)}} <i class="fas fa-arrow-alt-circle-up" style="color: #2ab27b"></i> {{count_up($article->id)}} <i class="fas fa-arrow-alt-circle-down" style="color: #bf5329"></i> {{count_down($article->id)}}</small>
                                <small class="pull-right">Publié le : {{ date('d F Y', strtotime($article->created_at)) }}</small>

                            </div>
                        </div>
                             @endforeach
                        @endif
                    </div>
                    <div class="panel-footer">
                        {{$articles->links()}}
                    </div>

                    <!-- Ajouter Article -->
                    @include('profile/blog/create')


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
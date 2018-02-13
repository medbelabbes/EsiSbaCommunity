
@extends('profile.index')

@section('profile-content')


                    <div class="panel-heading">
                        <button type="button" class="pull-right btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-pencil-alt"></i> Ajouter un status</button>
                        <h3 class="panel-title">Status</h3>
                    </div>
                    <div class="panel-body">
                            <div class="col-md-12">
                                @if(count($posts)>0)
                                    @foreach($posts as $post)
                                        <a href="{{ url('/profile/'.$user->id.'/publications/'.$post->id) }}">
                                            <div class="profile-post well">
                                                {{$post->content}}
                                            </div>
                                        </a>
                                    @endforeach
                                    @endif
                        </div>
                    </div>
                    <div class="panel-footer">

                    </div>

                    <!-- Ajouter Article -->
                    @include('profile/post/create')


@endsection
@section('scripts')

    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>




@stop

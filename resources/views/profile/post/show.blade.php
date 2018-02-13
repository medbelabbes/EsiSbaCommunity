@extends('profile.index')

@section('profile-content')

                 <div class="panel-heading">

                     <form action="{{ url('/profile/'.$user->id.'/publications/'.$post->id.'/destroy') }}" method="post">
                         <input type="hidden" name="_method" value="delete" />
                         {!! csrf_field() !!}
                         <button type="submit" class="pull-right btn btn-warning btn-sm"><i class="fas fa-times"></i> Supprimer l'article</button>

                     </form>
                     <button type="button" class="pull-right btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-pencil-alt"></i> Modifier l'article</button>
                  </div>

                    <div class="panel-body">
                        {!! $post->content !!}
                    </div>

                    <div class="panel-footer">
                    </div>

                 <!-- Modifier Article -->
                 @include('profile/post/edit')


@endsection
@section('scripts')

    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>


@stop

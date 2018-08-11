
@extends('profile.index')

@section('profile-content')


                    <div class="panel-heading">
                        @if($user->id == Auth::User()->id )

                        <button type="button" class="pull-right btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-pencil-alt"></i> Ajouter un status</button>
                       @endif
                            <h3 class="panel-title">Status</h3>
                    </div>
                    <div class="panel-body">
                            <div class="col-md-12">
                                @if(count($posts)>0)
                                    @foreach($posts as $post)

                                        <div class="col-md-12">

                                               <div class="profile-post">
                                                   <p style="text-decoration: none">  <a href="{{ url('/profile/'.$user->id.'/publications/'.$post->id) }}"> {{$post->content}}</a>
                                                   </p>

                                                   <small><i class="fas fa-comments"></i> {{count($post->comments)}} <i class="fas fa-arrow-alt-circle-up" style="color: #2ab27b"></i> {{count2_up($post->id)}} <i class="fas fa-arrow-alt-circle-down" style="color: #bf5329"></i> {{count2_down($post->id)}}</small>
                                                       <small class="pull-right">Publié le : {{ date('d F Y', strtotime($post->created_at)) }}</small>
                                               </div>
                                           </a>

                                        </div>

                                    @endforeach
                                    @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        {{$posts->links()}}

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

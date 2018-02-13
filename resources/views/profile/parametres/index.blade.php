
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('profile/parametres/sidebar')

            <div class="col-md-9">

                <div class="row">
                    <div class="profile-content tab-content">
                        <!-- Information général -->
                        @include('profile/parametres/information')
                    <!-- Information général -->
                        @include('profile/parametres/photo')




                        <div role="tabpanel" class="tab-pane" id="mdp">...</div>

                        <!-- Information général -->
                        @include('profile/parametres/invitation')






                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
@section('scripts')
    <script type="text/javascript">
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })


    </script>
@stop

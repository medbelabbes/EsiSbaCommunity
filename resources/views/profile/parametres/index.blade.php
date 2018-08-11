
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('profile/parametres/sidebar')

            <div class="col-md-9">

                <div class="row">
                    <div class="panel tab-content">
                        <!-- Information général -->
                        @include('profile/parametres/information')
                    <!-- Modifier photo -->
                        @include('profile/parametres/photo')

                    <!-- Password -->
                    @include('profile/parametres/password')

                        <!-- Invitation Mail -->
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

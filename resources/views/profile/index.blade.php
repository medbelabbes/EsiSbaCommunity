
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                <!-- Navigation -->
                <div class="panel panel-default">

                @include('profile/sidebar')

                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>
@endsection


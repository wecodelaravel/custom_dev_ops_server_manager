<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')

    @stack('pagestyle')

    @yield('top-script')
</head>


<body class="hold-transition skin-blue sidebar">

<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </section>
    </div>
@include('partials.footer')
        {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
            {{-- @include('partials.control_sidebar') --}}
        {{-- </aside> --}}
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        {{-- <div class="control-sidebar-bg"></div> --}}
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

@include('partials.javascripts')

</body>
</html>

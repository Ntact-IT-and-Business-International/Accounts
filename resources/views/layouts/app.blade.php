<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @include('layouts.css')
</head>

<body class="skin-blue fixed-layout">
    @include('layouts.preloader')
    <div id="main-wrapper">
        <header class="topbar">
            @include('layouts.navbar')
        </header>
        @include('layouts.sidebar')
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="container-fluid">
                @include('layouts.breadcrumb')
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            @include('layouts.message')
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .right-sidebar -->
                @include('layouts.right-modal')
            </div>
        </div>
        @include('layouts.footer')
    </div>
    @include('layouts.javascript')
</body>
</html>


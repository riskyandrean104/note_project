<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICS-Notes</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ 'AdminLte/plugins/fontawesome-free/css/all.min.css' }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ 'AdminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ 'AdminLte/dist/css/adminlte.min.css' }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ 'AdminLte/plugins/summernote/summernote-bs4.min.css' }}">
    <!-- include libraries(jQuery, bootstrap) -->
    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script type="text/javascript" src="cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- include summernote css/js-->
    <link href="summernote-bs5.css" rel="stylesheet">
    <script src="summernote-bs5.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('partial.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            @yield('container')
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.1
            </div>
            <strong>Copyright &copy; 2023 IT-Admin ICS | Risky </strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ 'AdminLte/plugins/jquery/jquery.min.js' }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ 'AdminLte/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ 'AdminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ 'AdminLte/dist/js/adminlte.min.js' }}"></script>
    <!-- Summernote -->
    <script src="{{ 'AdminLte/plugins/summernote/summernote-bs4.min.js' }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
</body>

</html>

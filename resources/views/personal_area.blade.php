<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Рабочее пространство</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('new/vendor1/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('new/vendor1/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{ asset('new/vendor1/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('new/css/sb-admin.css')}}" rel="stylesheet">
    <link href="{{ asset('new/css/Students.css')}}" rel="stylesheet">
    <script src="{{asset('new/vendor1/jquery/jquery.min.js') }}"></script>
    <script src="{{asset("js/ajaxes.js")}}"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top menu_top" id="mainNav">
    <a class="navbar-brand" href="">Рабочее пространство</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav menu_top" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Расписание">
                <a class="nav-link" href="{{route("timetable")}}">
                    <i class="fa fa-table"></i>
                    <span class="nav-link-text">Расписание групп</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Расписание">
                <a class="nav-link" href="{{route("timetableTeacher")}}">
                    <i class="fa fa-table"></i>
                    <span class="nav-link-text">Расписание преподавателей</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Посещаемость и оценки" id="visit_mark">
                <a class="nav-link" id="journalStud" href="{{route("journalStudent")}}" >
                    <i class="fa fa-graduation-cap"></i>
                    <span class="nav-link-text">Посещаемость и оценки</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler menu_top">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link  mr-lg-2" href="{{route("cabinet")}}" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle"></i>
            </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{route("logout")}}">
                    <i class="fa fa-fw fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Личный кабинет</a>
        </li>
        <li class="breadcrumb-item active" id="fio_group"></li>
    </ol>

    <div class="container-fluid mb-2" style="position: relative">

        <div class="row">
            <div class="col-md-4">
                {{--<input type="file" name="photo" id="file-select" class="img_red" accept="image/*" onclick="getImage()">--}}
                {{--<img src="" id="img_click" style="width: 100%">--}}
            </div>
            <div class="col-md-6 offset-md-2" id="user_info">
                {{csrf_field()}}
            </div>

        </div>
    </div>
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Рабочее пространство 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->

    <script src="{{asset('new/vendor1/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('new/vendor1/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('new/vendor1/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('new/vendor1/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('new/vendor1/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('new/js/sb-admin.min.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{asset('new/js/sb-admin-datatables.min.js')}}"></script>
    <script src="{{asset('new/js/sb-admin-charts.min.js')}}"></script>
    <script src="{{asset('new/js/main.js')}}"></script>
</div>
</body>

</html>

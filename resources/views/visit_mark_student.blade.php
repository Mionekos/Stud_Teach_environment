<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Рабочее пространство</title>
    <!-- Bootstrap core CSS-->
    <script src="{{ asset("new/vendor1/jquery/jquery.js")}}"></script>
    <link href="{{ asset("new/vendor1/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset("new/vendor1/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{ asset("new/vendor1/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />--}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet">--}}
<!-- Custom styles for this template-->
    <link href="{{ asset("new/css/sb-admin.css")}}" rel="stylesheet">
    <link href="{{ asset("new/css/Students.css")}}" rel="stylesheet">
    <script src="{{ asset("js/visitMarkForStudents.js")}}"></script>



    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css"/>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">--}}

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
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Посещаемость и оценки">
                <a class="nav-link" href="http://localhost:8080/Students/public/visit_mark_student">
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

            <li class="nav-item ">
                <a class="nav-link mr-lg-2" id="messagesDropdown" href="{{route("cabinet")}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle"></i>

            </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route("logout")}}">
                    <i class="fa fa-fw fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Посещаемость и оценки</a>
        </li>
        <li class="breadcrumb-item active">Студент</li>
    </ol>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <label>Выбрать период дат:</label>
                        <input type="text" id="daterange" class="form-control search_group" name="daterange" value="" />
                    </div>
                    <div class="col-md-2">
                        <label>Предмет:</label>
                        <select id="subject" name="subject" class="form-control" >
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="button" id="btn_visit_mark" class="btn btn-secondary btn_save_visit_mark btn_save_visit_mark_st" style="float: left">Применить</button>
                    </div>
                    <div class="col-md-5"></div>
                </div>

            </div>
        </div>
<br>

<div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Номер пары</th>
            <th>Предмет</th>
            <th>Посещаемость</th>
            <th>Оценка</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Дата</th>
            <th>Номер пары</th>
            <th>Предмет</th>
            <th>Посещаемость</th>
            <th>Оценка</th>
        </tr>
        </tfoot>
      </table>

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

    <script src="{{ asset("new/vendor1/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset("new/vendor1/jquery-easing/jquery.easing.min.js")}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset("new/vendor1/chart.js/Chart.min.js")}}"></script>
    <script src="{{ asset("new/vendor1/datatables/jquery.dataTables.js")}}"></script>
    <script src="{{ asset("new/vendor1/datatables/dataTables.bootstrap4.js")}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset("new/js/sb-admin.min.js")}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{ asset("new/js/sb-admin-datatables.min.js")}}"></script>
    <script src="{{ asset("new/js/timetable.js")}}"></script>
    <script src="{{ asset("new/js/sb-admin-charts.min.js")}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}
    <script src="{{ asset("new/js/bootstrap-multiselect.js")}}"></script>
    <script src="{{ asset("new/js/visit_mark_student.js")}}"></script>

    <script type="text/javascript">
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY'
                },
                applyClass:'apply_but'
        })

        });

    </script>
</div>
</body>

</html>

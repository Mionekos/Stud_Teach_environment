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
    <script src="{{ asset("new/vendor1/jquery/jquery.min.js")}}"></script>
    <script src="{{ asset("new/js/visit_mark.js")}}"></script>


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
                <a class="nav-link" href="http://localhost:8080/Students/public/visit_mark_teacher">
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
                <a class="nav-link  mr-lg-2" id="messagesDropdown" href="{{route("cabinet")}}"  aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle"></i>
            </span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8080/Students/public/start_page">
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
        <li class="breadcrumb-item active">Преподаватель</li>
    </ol>
    {{--<div class="container-fluid">--}}
        <!-- Breadcrumbs-->

        <!-- Icon Cards-->

        <div class="container-fluid">
            <div class="container">
                {{--<div class="row" >--}}
                    {{--<div class="col-md-9" style="margin-left: 65%">--}}
                        {{--<input type="text" style="border:none; height:0; width: 0 !important; float:right;" id="schedule-date" name="schedule-date" value="" class="form-control">--}}
                    {{--<button for="schedule-date" class="btn btn-secondary btn_calendar">--}}
                            {{--<i class="fa fa-calendar"></i>--}}
                            {{--<span>Расписание по дате</span>--}}
                    {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="row">

                    <div class="col-md-3">
                        <label>Выбрать период дат:</label>
                        <input type="text" id="daterange" class="form-control search_group" name="daterange" value="" />
                    </div>
                    <div class="col-md-1">
                        <label>Курс:</label>
                        {{--<input type="text" name="course"  class="form-control tables_box" placeholder="Курс..." aria-label="Курс..." aria-describedby="basic-addon" >--}}
                        <select id="number_course" class="form-control select_course">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Группа:</label>
                        {{--<input type="text" id="number_group" name="number_group"  class="form-control tables_box" placeholder="Номер группы..." aria-label="Номер группы..." aria-describedby="basic-addon" >--}}
                        <select id="number_group" class="form-control select_course">
                            <option value="Т-350915 ПИ">Т-350915 ПИ</option>
                        </select>
                    </div>
                    <div class="col-md-2" >
                        <label>Предмет:</label>
                        <select class="form-control" id="subject" name="subject" >
                            <option value="Компьютерные сети">Компьютерные сети</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <button type="button" onclick="getDataForTeacherTable()" id="btn_visit_mark" class="btn btn-secondary btn_save_visit_mark" style="float: left">Применить</button>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="col-md-7"></div>--}}
                    {{--<div class="col-md-2">--}}
                        {{--<button type="button" id="btn_visit_mark" class="btn btn-secondary btn_save_visit_mark">Применить</button>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3"></div>--}}
                {{--</div>--}}
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
            <th>Студент</th>
            <th>Посещаемость</th>
            <th>Оценка</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Дата</th>
            <th>Номер пары</th>
            <th>Предмет</th>
            <th>Студент</th>
            <th>Посещаемость</th>
            <th>Оценка</th>
        </tr>
        </tfoot>
      </table>

</div>


    <div class="modal fade" id="modal_redaction_visit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup" style=" background-color: rgba(0, 46, 102, 0.8)">
                <a href="#"><i class="fa fa-times a_close" id="close_modal_redaction_visit"></i></a>
                <form  id="form_recovery" action="" method="post" >
                    <div class="container">
                        <div class="row registr_visit_mark">
                            <h3>Редактирование</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label class="label_reg">Выберите вид посещаемости:</label>
                               <select id="id_visit" name="visit" class="form-control reg_right">
                                    <option value="1">Присутствовал</option>
                                    <option value="2">Отсутствовал</option>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <button type="button" class="btn btn-secondary btn_loginInputs btn_red_visit" data-toggle="modal"
                                        id="btn_redaction_visit">Сохранить
                                </button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_redaction_mark" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup" style=" background-color: rgba(0, 46, 102, 0.8)">
                <a href="#"><i class="fa fa-times a_close" id="close_modal_redaction_mark"></i></a>
                <form  id="form_recovery" action="" method="post" >
                    <div class="container">
                        <div class="row registr_visit_mark">
                            <h3>Редактирование</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label class="label_reg">Выберите вид посещаемости:</label>
                                <select id="id_visit" name="visit" class="form-control reg_right">
                                    <option value="1">5</option>
                                    <option value="2">4</option>
                                    <option value="3">3</option>
                                    <option value="4">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <button type="button" class="btn btn-secondary btn_loginInputs btn_red_visit" data-toggle="modal"
                                        id="btn_redaction_visit">Сохранить
                                </button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </form>
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
    <script src="{{ asset("new/js/sb-admin-charts.min.js")}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}


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

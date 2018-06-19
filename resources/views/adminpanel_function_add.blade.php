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
    <script src="{{ asset("new/vendor1/jquery/jquery.min.js")}}"></script>
    <script src="{{ asset("js/adminAjaxes.js")}}"></script>
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
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Добавление данных">
                <a class="nav-link" href="{{route('add')}}">
                    <i class="fa fa-plus"></i>
                    <span class="nav-link-text">Добавление данных</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Удаление данных">
                <a class="nav-link" href="{{route('delete')}}">
                    <i class="fa fa-trash-o"></i>
                    <span class="nav-link-text">Удаление данных</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Добавление расписания">
                <a class="nav-link" href="{{route('addTimetable')}}">
                    <i class="fa fa-calendar"></i>
                    <span class="nav-link-text">Добавление расписания</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Регистрация преподавателя">
                <a class="nav-link" href="{{route('regTeachers')}}">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="nav-link-text">Регистрация преподавателя</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Удаление пользователя">
                <a class="nav-link" href="{{route('deleteUser')}}">
                    <i class="fa fa-ban"></i>
                    <span class="nav-link-text">Удаление пользователя</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Редактирование данных преподавателя">
                <a class="nav-link" href="{{route('editTeachers')}}">
                    <i class="fa fa-pencil-square-o"></i>
                    <span class="nav-link-text">Редактирование данных преподавателя</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Редактирование данных студента">
                <a class="nav-link" href="{{route('editStudents')}}">
                    <i class="fa fa-pencil-square-o"></i>
                    <span class="nav-link-text">Редактирование данных студента</span>
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
                <a class="nav-link" href="{{route('logout')}}">
                    <i class="fa fa-fw fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Добавление данных</a>
        </li>
        <li class="breadcrumb-item active">Администратор</li>
    </ol>

    <div class="container">
        <div class="row">
                <div class="col-md-5">
                    <label class="text_label">Добавление роли</label>
                    <input type="text" name="add_role"  class="form-control input_add_data" placeholder="Введите роль...">
                    <button type="button" id="role" class="btn btn-secondary btn_save_data" onclick="roleAdd()">Сохранить</button>
                </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <label class="text_label">Добавление должности</label>
                <input type="text" name="add_post"  class="form-control input_add_data" placeholder="Введите должность...">
                <button type="button" id="post" class="btn btn-secondary btn_save_data" onclick="postAdd()">Сохранить</button>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-5">
                    <label class="text_label">Добавление предмета</label>
                    <input type="text" name="add_subject"  class="form-control input_add_data" placeholder="Введите название предмета...">
                    <button type="button" id="subject" class="btn btn-secondary btn_save_data" onclick="subjectAdd()">Сохранить</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                    <label class="text_label">Добавление вида пары</label>
                    <input type="text" name="add_lectpract"  class="form-control input_add_data" placeholder="Введите вид пары...">
                    <button type="button" id="lectpract" class="btn btn-secondary btn_save_data" onclick="lectPractAdd()">Сохранить</button>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">

            <div class="col-md-5">
                    <label class="text_label">Добавление группы</label>
                    <input type="text" name="add_group"  class="form-control input_add_data" placeholder="Введите название группы...">
                    <input type="text" name="add_course"  class="form-control input_add_data" placeholder="Введите номер курса...">
                    <button type="button" id="group" class="btn btn-secondary btn_save_data" onclick="groupAdd()">Сохранить</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                    <label class="text_label">Добавление кабинета</label>
                     <input type="text" name="add_cabinets"  class="form-control input_add_data" placeholder="Введите номер кабинета...">
                    <button type="button" id="cabinets" class="btn btn-secondary btn_save_data" onclick="cabinetAdd()">Сохранить</button>
            </div>
            <div class="col-md-1"></div>
        </div>


        <div class="row">

            <div class="col-md-5">

                    {{--добавление пар--}}
                    <label class="text_label">Добавление пары</label>
                    <select name="pairs_subject" id="pairs_subject"  class="form-control select_course"></select>
                    <select name="pairs_teacher" id="pairs_teacher"  class="form-control select_course"></select>
                    <select name="pairs_group" id="pairs_group" class="form-control select_course"></select>
                    <button type="button" id="pairs" class="btn btn-secondary btn_save_data" onclick="addPairs()">Сохранить</button>
            </div>


            <div class="col-md-1"></div>
            <div class="col-md-5">
                    <label class="text_label">Добавление времени пар</label>
                    <input type="text" name="add_time_begin"  id="time_start" class="form-control input_add_data" placeholder="Введите время начала пары...">
                    <input type="text" name="add_time_finish"  id="time_end" class="form-control input_add_data" placeholder="Введите время конца пары...">
                    <button type="button" id="time" class="btn btn-secondary btn_save_data" onclick="timeAdd()">Сохранить</button>
            </div>
            <div class="col-md-1"></div>
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

    <div class="modal fade" id="modal_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup" style=" background-color: rgba(0, 46, 102, 0.8)">
                <a href="#"><i class="fa fa-times a_close" id="close_modal1"></i></a>
                <form  id="form_recovery" action="" method="post" >

                    <div class="container">
                        <div class="row registr_h">
                            <h3>Данные сохранены</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-secondary btn_recovery" data-toggle="modal"
                                        id="ok_btn">ОК
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="{{ asset("new/vendor1/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset("new/vendor1/jquery-easing/jquery.easing.min.js")}}"></script>
    <!-- Page level plugin JavaScript-->
    {{--<script src="new/vendor1/chart.js/Chart.min.js"></script>--}}
    {{--<script src="new/vendor1/datatables/jquery.dataTables.js"></script>--}}
    {{--<script src="new/vendor1/datatables/dataTables.bootstrap4.js"></script>--}}
    <!-- Custom scripts for all pages-->
    <script src="{{ asset("new/js/sb-admin.min.js")}}"></script>

    {{--<script src="new/js/bootstrap-datetimepicker.min.js"></script>--}}

    {{--<!-- Custom scripts for this page-->--}}
    {{--<script src="new/js/sb-admin-datatables.min.js"></script>--}}
    {{--<script src="new/js/sb-admin-charts.min.js"></script>--}}
    <script src="{{ asset("new/js/admin_panel.js")}}"></script>
    <script src="{{ asset("new/js/jquery.maskedinput.js")}}"></script>
    <script>
        jQuery(function($){
            $("#time_start").mask("99:99");
            $("#time_end").mask("99:99");

        });
    </script>
</div>
</body>

</html>

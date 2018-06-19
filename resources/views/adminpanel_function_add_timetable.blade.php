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
    <!-- Custom styles for this template-->
    <link href="{{ asset('new/css/sb-admin.css')}}" rel="stylesheet">
    <link href="{{ asset('new/css/Students.css')}}" rel="stylesheet">
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
                <a class="nav-link" href="http://localhost:8080/Students/public/adminpanel_function_add">
                    <i class="fa fa-plus"></i>
                    <span class="nav-link-text">Добавление данных</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Удаление данных">
                <a class="nav-link" href="http://localhost:8080/Students/public/adminpanel_function_delete">
                    <i class="fa fa-trash-o"></i>
                    <span class="nav-link-text">Удаление данных</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Добавление расписания">
                <a class="nav-link" href="http://localhost:8080/Students/public/adminpanel_function_add_timetable">
                    <i class="fa fa-calendar"></i>
                    <span class="nav-link-text">Добавление расписания</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Регистрация преподавателя">
                <a class="nav-link" href="http://localhost:8080/Students/public/adminpanel_function_register_teacher">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="nav-link-text">Регистрация преподавателя</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Удаление пользователя">
                <a class="nav-link" href="http://localhost:8080/Students/public/adminpanel_function_delete_user">
                    <i class="fa fa-ban"></i>
                    <span class="nav-link-text">Удаление пользователя</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Редактирование данных преподавателя">
                <a class="nav-link" href="http://localhost:8080/Students/public/adminpanel_function_redaction_teacher">
                    <i class="fa fa-pencil-square-o"></i>
                    <span class="nav-link-text">Редактирование данных преподавателя</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Редактирование данных студента">
                <a class="nav-link" href="http://localhost:8080/Students/public/adminpanel_function_redaction_students">
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
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Поиск...">
                        <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link"  href="http://localhost:8080/Students/public/start_page_admin">
                    <i class="fa fa-fw fa-sign-out"></i></a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Добавление расписания</a>
        </li>
        <li class="breadcrumb-item active">Администратор</li>
    </ol>

    <form method="post">
    <div class="container">
        <div class="row">
                <div class="col-md-5">
                    <label class="text_label">Выберите день недели</label>
                    <select id="id_day_of_week" name="day_of_week" class="form-control select_course sel_delete">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    {{--<input type="text" name="lastname_teacher"  class="form-control input_add_data" placeholder="Введите фамилию...">--}}
                </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <label class="text_label">Выберите время пары</label>
                <select id="id_time_subject" name="time_subject" class="form-control select_course sel_delete">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                {{--<input type="text" name="post_teacher"  class="form-control input_add_data" placeholder="Введите должность...">--}}
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label class="text_label">Выберите название предмета</label>
                <select id="id_name_subject" name="name_subject" class="form-control select_course sel_delete">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                {{--<input type="text" name="name_teacher"  class="form-control input_add_data" placeholder="Введите имя...">--}}
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <label class="text_label">Выберите вид пары</label>
                <select id="id_subject_lect_pract" name="subject_lect_pract" class="form-control select_course sel_delete">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                    {{--<input type="text" name="email_teacher"  class="form-control input_add_data" placeholder="Введите e-mail...">--}}
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label class="text_label">Выберите кабинет</label>
                <select id="id_cabinet" name="cabinet" class="form-control select_course sel_delete">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                    {{--<input type="text" name="patronymic_teacher"  class="form-control input_add_data" placeholder="Введите отчество...">--}}
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <label class="text_label">Выберите преподавателя</label>
                <select id="id_teacher" name="name_teacher" class="form-control select_course sel_delete">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <button type="submit" id="reg_techer" class="btn btn-secondary btn_save_data">Сохранить</button>
                {{--<input type="text" name="login_teacher"  class="form-control input_add_data" placeholder="Введите логин...">--}}
            </div>
            <div class="col-md-1"></div>
        </div>


    </div>
    </form>



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
    <script src="{{ asset("new/vendor1/jquery/jquery.min.js")}}"></script>
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
</div>

</body>

</html>

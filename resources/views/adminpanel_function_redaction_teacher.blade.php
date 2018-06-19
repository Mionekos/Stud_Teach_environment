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
            <a href="#">Редактирование данных преподавателя</a>
        </li>
        <li class="breadcrumb-item active">Администратор</li>
    </ol>

    <form method="post">
        <form method="post">
        <div class="container search_user">
            <div class="row">

                <div class="col-md-5">

                        <label class="text_label">Введите данные преподавателя</label>
                    <select id="id_search_teacher" name="search_teacher" class="form-control select_course sel_delete">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" id="role" class="btn btn-secondary btn_search_data">Найти</button>
                </div>
                <div class="col-md-5"></div>



            </div>
        </div>
        </form>
        <div class="container-fluid" style="position: relative">
            <div class="col-md-4"><img src="new/img/img_1.jpg" style="width: 100%">
                <form action="">
                    <input type="file" name="photo" accept="image/*" >
                    <input type="submit" value="Принять">
                </form>
            </div>

            <div class="container" style="position: absolute; top: 0px;">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="text" name="lastname"  class="form-control tables_box" placeholder="Фамилия">
                    </div>
                    <div class="col-md-1"></div>

                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="text" name="name"  class="form-control tables_box" placeholder="Имя">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="text"  name="patronymic"  class="form-control tables_box" placeholder="Отчество">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="text" name="gender"  class="form-control tables_box" placeholder="Пол">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="text" name="birthday"  class="form-control tables_box" placeholder="Дата рождения">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="text" name="post"  class="form-control tables_box" placeholder="Должность">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="text" name="login"  class="form-control tables_box" placeholder="Логин">
                    </div>
                    <div class="col-md-1"></div>

                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="email" name="email"  class="form-control tables_box" placeholder="E-mail">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="password"  name="password"  class="form-control tables_box" placeholder="Пароль">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <input type="password" name="password_confirm"  class="form-control tables_box" placeholder="Подтверждение пароля" >
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-secondary btn_loginInputs" style="margin-left: 75%">Сохранить</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

            {{--<div class="tables_box">--}}
            {{--hello--}}
            {{--</div>--}}

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

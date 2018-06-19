<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Рабочее пространство</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('new/vendor1/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet">
    <link href="{{ asset('new/vendor1/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{ asset('new/vendor1/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset("new/css/coming-soon.min.css")}}" rel="stylesheet">
    <link href="{{ asset("new/css/Students.css")}}" rel="stylesheet">
    <style>
        .daterangepicker {
            z-index: 9999;
            cursor: pointer;
        }
    </style>
    <!-- Bootstrap core JavaScript -->
    <script src={{asset("new/vendor/jquery/jquery.min.js")}}></script>
    <script src={{asset("new/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <!-- Plugin JavaScript -->
    <script src={{asset("new/vendor/vide/jquery.vide.min.js")}}></script>
    <script src="{{asset("js/ajaxes.js")}}"></script>


</head>

<body>
<div class="overlay"></div>

<div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="masthead-content text-white py-5 py-md-0">
                    <h1 class="mb-3">Рабочее пространство</h1>
                    <p class="mb-5">Открытое информационное пространство для преподавателей и студентов</p>
                    <form action="{{route("login")}}" method="post" id="login_form" >
                        {{csrf_field()}}
                        <div class="input-group input-group-newsletter">
                            <input type="text" id="input_login_auth" name="login_auth" class="form-control pointer" placeholder="Логин">
                        </div>
                        <br>
                        <div class="input-group input-group-newsletter">
                            <input type="password"  name="password_auth" class="form-control pointer" placeholder="Пароль">
                        </div>
                        <br>
                        <button class="btn btn-secondary" type="submit" id="btn_auth" onclick="getUserInfo()">Войти</button>
                        <button class="btn btn-secondary" type="button" data-toggle="modal" id="btn_register" style="margin-right: 2%" onclick="getGroup()">Регистрация
                        </button>
                    </form>
                    <a href="#" title="Восстановить пароль" class="a_password" data-toggle="modal"
                       data-target="#modal_password">Восстановить пароль</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup" style=" background-color: rgba(0, 46, 102, 0.8)">
            <a href="#"><i class="fa fa-times a_close" id="close_modal3"></i></a>
            <form action="{{route('registration')}}" method="post" id="form_register" >
                    {{csrf_field()}}
                <div class="container">
                    <div class="row registr_h">
                        <h3>Регистрация</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="lastname" class="form-control reg_left" placeholder="Фамилия...">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="birthday" class="form-control reg_right"
                                   placeholder="День рождения...">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control reg_left_top" placeholder="Имя...">
                        </div>
                        <div class="col-md-6">
                            <label class="label_reg">Пол:</label>
                            <select id="id_gender" name="gender" class="form-control reg_right">
                                <option value="1">Женский</option>
                                <option value="2">Мужской</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="patronymic" class="form-control reg_left_top"
                                   placeholder="Отчество...">
                        </div>
                        <div class="col-md-6">
                            <label class="label_reg">Группа:</label>
                            <select id="number_group" name="group_name" class="form-control reg_right" >
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="login_reg" class="form-control reg_left" placeholder="Логин...">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email_reg" class="form-control reg_right" placeholder="E-mail...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" name="password_reg" class="form-control reg_left"
                                   placeholder="Пароль...">
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password_confirm_reg" class="form-control reg_right"
                                   placeholder="Подтверждение пароля...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-secondary btn_loginInputs" id="registration_send">Регистрация</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup" style=" background-color: rgba(0, 46, 102, 0.8)">
            <a href="#"><i class="fa fa-times a_close" id="close_modal1"></i></a>
            <form  id="form_recovery" action="" method="post" >

                <div class="container">
                    <div class="row registr_h">
                        <h3>Восстановление пароля</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <input type="email" name="email_recovery" class="form-control password_restoring"
                                   placeholder="Введите e-mail...">
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary btn_recovery" data-toggle="modal"
                                    id="confirm_recovery">Подтвердить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_password2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup" style=" background-color: rgba(0, 46, 102, 0.8)">
            <a href="#"><i class="fa fa-times a_close" id="close_modal4"></i></a>
            <form id="form_code_recovery" action=class="popup-form">

                <div class="container">
                    <div class="row registr_h">
                        <h3>Восстановление пароля</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <input name="code_recovery" type="text" class="form-control password_restoring"
                                   placeholder="Введите код восстановления..." >
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <input name="password_new" type="password" class="form-control password_restoring"
                                   placeholder="Введите новый пароль...">
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <input name="password_confirm_new" type="password" class="form-control password_restoring"
                                   placeholder="Подтверждение нового пароля...">
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary btn_recovery" data-toggle="modal"
                                    id="confirm_code_recovery">Подтвердить
                            </button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>


<div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
            <a href="#">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        <li class="list-unstyled-item">
            <a href="#">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <li class="list-unstyled-item">
            <a href="#">
                <i class="fa fa-instagram"></i>
            </a>
        </li>
    </ul>
</div>

<!-- Custom scripts for this template -->
<script src="{{asset("new/js/coming-soon.min.js")}}"></script>
<script src="{{asset("new/js/jquery.validate.min.js")}}"></script>
<script src="{{asset("new/js/messages_ru.min.js")}}"></script>

<script src="{{asset("new/js/main.js")}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('input[name="birthday"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD-MM-YYYY',
                    separator: " - ",
                    daysOfWeek: [
                        "Вс",
                        "Пн",
                        "Вт",
                        "Ср",
                        "Чт",
                        "Пт",
                        "Сб"
                    ],
                    monthNames: [
                        "Январь",
                        "Февраль",
                        "Март",
                        "Апрель",
                        "Май",
                        "Июнь",
                        "Июль",
                        "Август",
                        "Сентябрь",
                        "Октябрь",
                        "Ноябрь",
                        "Декабрь"
                    ],
                    firstDay: 1
                },
            })
        });
    })
</script>
</body>
</html>

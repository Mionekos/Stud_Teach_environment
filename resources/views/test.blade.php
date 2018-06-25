<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
        <script src="{{asset("js/test.js")}}"></script>
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
        <!-- Styles -->

    </head>
    <body>
    <div class="">
        <table id="example" class="display" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Пара</th>
                <th>Предмет</th>
                <th>Фамилия</th>
                <th>Имя</th>

            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Пара</th>
                <th>Предмет</th>
                <th>Фамилия</th>
                <th>Имя</th>

            </tr>
            </tfoot>
        </table>
    </div>
    </body>
</html>

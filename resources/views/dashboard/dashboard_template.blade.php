<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.13/datatables.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    {!! Html::style('css/dashboard-template.css') !!}

    <title>@yield('titre')-Dashboard</title>
</head>
<body>

    <div class="modal fade" id="success_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetAndRefresh()"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Success</h4>
            </div>
            <div class="modal-body">
                <p>Operation Succeeded</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <div class="container-fluid">
        <div class="navbar-left dashboard">
            <div id="dashboard-title">
                <h2>Dashboard</h2>
            </div>
            <div id="dashboard-menu">
                @yield("buttons")
            </div>
            <div class="account-info">
                <div class="header">
                    <span>
                        <?php
                            $employee= Session::get('employee');
                            $login_time= Session::get('login_time');
                            echo(ucfirst($employee->prenom).' '.ucfirst($employee->nom));
                        ?></span><img class="down" src="images/icons/drop_down_arrow.png" alt=""><br>
                    <span><b>
                            <?php
                                $i=$employee->type;
                                $p="";
                                switch ($i){
                                    case 1:
                                        $p="Receptionist";
                                        break;
                                    case 2:
                                        $p="Worker";
                                        break;
                                    case 3:
                                        $p="Accountant";
                                        break;
                                    case 4:
                                        $p="Manager";
                                        break;
                                }
                                echo($p);
                            ?></b></span>
                </div>
                <div class="hidden-content">
                    <div class="middle">
                        <div>
                            <span style="display: none" id="login_time"><?php echo($login_time); ?></span>
                            <span><?php echo($employee->email); ?></span><br>
                            <span><b>Work Time: </b></span><span id="timer">0:00:00</span>
                        </div>
                    </div>
                    <div class="footer">
                        <form action="logout" method="POST" class="logout-form">
                            {{ csrf_field() }}
                            <input type="submit" value="Logout" class="btn btn-danger"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
        </div>
    </div>

    {{--@if($errors->any())
        <script type="text/javascript">

            alert($(".menu"));
        </script>
    --}}


    <script type="text/javascript" src="js/jquery.js"></script>
    {{--<script type="text/javascript" src="js/bootstrap.min.js"></script>--}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.13/datatables.min.js"></script>
    @yield("imports")
    <script type="text/javascript" src="js/dashboard-template.js"></script>
    @if($errors->any())
        <script type="text/javascript">
            var x= "{{ $errors->first('page') }}";
            var menu=$(".menu li:nth-child("+x+")")[0];
            var selected=$(".selected")[0];
            selected.removeAttribute("class");
            selected.setAttribute("class", "menu-item");
            menu.setAttribute("class", "menu-item selected");

            var open= "{{ $errors->first('show_success_modal') }}";
            if(open){
                $('#success_modal').modal('show');
            }
        </script>
    @endif
</body>
</html>

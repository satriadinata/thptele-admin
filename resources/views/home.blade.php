<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tele Bot</title>
    <link rel="stylesheet" href="{{asset('ehe/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!--
    Product Admin CSS Template
    https://templatemo.com/tm-524-product-admin
-->

</head>

<body id="reportsPage">
    <div class="" id="home">
      @guest
      @else
      <nav class="navbar navbar-expand-xl" style="position: fixed; right: 0; left: 0; z-index: 2; box-shadow: 0px 0px 8px 4px rgba(0,0,0,.1);" >
        <div class="container h-100">
            <a class="navbar-brand" href="{{route('home')}}">
                <h1 class="tm-site-title mb-0" style="align-items: center; display: flex;" > <img src="{{asset('img/logo.png')}}" style="width: 90px; margin-right: 10px; " > Tele Bot</h1>
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a class="nav-link" id="dashboard" href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="key" href="{{route('keyset')}}">
                        <i class="fas fa-cog"></i>
                        Key Setting
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sent" href="{{route('sentbox')}}">
                        <i class="fas fa-file-alt"></i>
                        Sent Box
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                        <!-- <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Reports <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Daily Report</a>
                                <a class="dropdown-item" href="#">Weekly Report</a>
                                <a class="dropdown-item" href="#">Yearly Report</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.html">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="accounts.html">
                                <i class="far fa-user"></i>
                                Accounts
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{Auth::user()->username}}, <b>Logout</b>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    @endguest
    <div class="container" style="padding-top: 100px;" >
        <div class="row">
            <div class="col">
                <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
            </div>
        </div>
        <!-- row -->
        <h2 class="tm-block-title">Income Message List</h2>
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="form-group mb-3">
                <form method="post" action="{{route('srcmsg')}}" >
                    @csrf
                    <label for="key">Search </label>
                    <input id="key" name="key" type="text" class="form-control validate" placeholder="search anythings" required >
                    <input type="submit" style="display: none;">
                </form>
            </div>
        </div>
        <div class="col" style="margin-bottom: -30px;" >
            <p class="text-white mt-5 mb-5">
                <a  id="hpsall" style="padding: 10px; font-size: 12px; margin: 3px; "  class="btn btn-danger" >Delete</a><a id="checkall" style="padding: 10px; font-size: 12px; margin: 3px; " class="btn btn-success" >Select All</a> <a id="uncheckall" style="padding: 10px; font-size: 12px; margin: 3px; " class="btn btn-success" >Unselect All</a>
            </p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="display: flex;" ></th>
                    <th scope="col">NO</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">NAME</th>
                    <th scope="col">CHAT ID</th>
                    <th scope="col">DATE</th>
                    <th scope="col">MESSAGE</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody id="data" >
            </tbody>
        </table>
    </div>
</div>
<footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2019</b> All rights reserved. 
            
            Night to remember <a rel="nofollow noopener" href="" class="tm-footer-link">satriadinata</a>
        </p>
    </div>
</footer>
<script async>
    var time=5000;
    setInterval(function(){
        $.ajax({
            method:'get',
            url:'<?php echo url('msg') ?>',
            success:function(data){
                $('#data').html(data);
            }
        })
    },time);
</script>
<script>
    function hapus(id)
    {
        var confirm=window.confirm("Sure ?");
        if (confirm) {
            $.ajax({
                method:'get',
                url:'<?php echo url('delpsn') ?>'+'/'+id,
                success:function(data){
                    window.location.reload();
                }
            });
        }
    }
    $("#hpsall").on('click', function(e){
        var all=[];
        $('.chck:checked').each(function(e){
            all.push($(this).attr('data-id'));
        });
        console.log(all);
        if (all.length<1) {
            alert('Select First');
        }else{
            all.forEach((value)=>{
                $.ajax({
                    method:'get',
                    url:'<?php echo url('hapuspesan') ?>'+'/'+value,
                    success:function(data){
                        console.log(data.id);
                        console.log(all[all.length-1]);
                        if (data.id==all[all.length-1]) {
                            setInterval(window.location.reload(),500);
                        }
                    }
                });
            });
        }
        // window.location.reload();
    });
    $("#checkall").on('click', function(e){
        $(':checkbox').each(function(){
            this.checked=true;
        });
    });
    $("#uncheckall").on('click', function(e){
        $(':checkbox').each(function(){
            this.checked=false;
        });
    });
</script>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{asset('js/moment.min.js')}}"></script>
<!-- https://momentjs.com/ -->
<script src="{{asset('js/Chart.min.js')}}"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script src="{{asset('js/tooplate-scripts.js')}}"></script>
<script>
    Chart.defaults.global.defaultFontColor = 'white';
    let ctxLine,
    ctxBar,
    ctxPie,
    optionsLine,
    optionsBar,
    optionsPie,
    configLine,
    configBar,
    configPie,
    lineChart;
    barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
    @guest
    @else
    <script>
        document.ready=act();
        function act(){
            var now='<?php echo $now?>';
            var p=document.getElementById(now);
            p.classList.add("active");
        }
    </script>
    @endguest
</body>

</html> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>E-Book Mumen</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
{{--noty--}}
<link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/plugins/noty/noty.css')}}">
<script src="{{asset('dashboard_files/plugins/noty/noty.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@stack('styles')
<style>
    label{
        font-weight: bold;
    }
</style>
<body class="app sidebar-mini">
<!-- Navbar-->
@include('layouts.dashboard._header')
<!-- Sidebar menu-->
@include('layouts.dashboard._aside')
<main class="app-content">

   @yield('content')
    @include('dashboard.partials._session')

</main>
<!-- Essential javascripts for application to work-->
<script src="{{asset('dashboard_files/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/popper.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/main.js')}}"></script>
<script src="{{asset('dashboard_files/js/custom/movie.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard_files/js/plugins/bootstrap-datepicker.min.js')}}"></script>
<!--select2-->
<script src="{{asset('dashboard_files/js/plugins/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard_files/js/plugins/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','.delete',function (e) {
            e.preventDefault();
            var that =$(this)
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                timer: 5000,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    that.closest('form').submit()

                }

            })

        })
    })

    $('.select2').select2({
        width:'100%',

    });
    $('.select2').on('select2:opening select2:closing', function( event ) {
        var $searchfield = $(this).parent().find('.select2-search__field');
        $searchfield.prop('disabled', true);
    });
    $('#demoDate').datepicker({
        format: "mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });

</script>
<!-- The javascript plugin to display page loading on top
<script src="js/plugins/pace.min.js"></script>
 Page specific javascripts
<script type="text/javascript" src="js/plugins/chart.js"></script>
<script type="text/javascript">
    var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86]
            }
        ]
    };
    var pdata = [
        {
            value: 300,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Complete"
        },
        {
            value: 50,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "In-Progress"
        }
    ]

    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);
</script>
 Google analytics script
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>-->
</body>
</html>
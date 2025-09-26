<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home | Mantis Bootstrap 5 Admin Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">


    <link rel="icon" href="./img/LOGO35 pix.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/fonts/tabler-icons.min.css" >
    <link rel="stylesheet" href="./assets/fonts/feather.css" >
    <link rel="stylesheet" href="./assets/fonts/fontawesome.css" >
    <link rel="stylesheet" href="./assets/fonts/material.css" >
    <link rel="stylesheet" href="./assets/css/style.css" id="main-style-link" >
    <link rel="stylesheet" href="./assets/css/style-preset.css" >
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

    @include('layouts.menu')

    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/chart')}}">Chart</a></li>
                                <li class="breadcrumb-item" aria-current="page">Chart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Last 7 days Sale</h5>
                        </div>
                        <div class="card-body">
                            <div id="bar-chart-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     

    @include('layouts.footer')
    
    <script src="./assets/js/plugins/popper.min.js"></script>
    <script src="./assets/js/plugins/simplebar.min.js"></script>
    <script src="./assets/js/plugins/bootstrap.min.js"></script>
    <script src="./assets/js/fonts/custom-font.js"></script>
    <script src="./assets/js/pcoded.js"></script>
    <script src="./assets/js/plugins/feather.min.js"></script>
    
    <script>
        var categories = @json($dates);
        var salesData = @json($sales);
        var dueData = @json($dues);
        var diesData = @json($dies);

        var options_bar_chart_1 = {
            chart: {
                height: 350,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: true
            },
            colors: ['#2fcc49ff','#fd562cff','#2cfdfdff'],
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [
                {
                    name: 'Sales',
                    data: salesData
                },
                {
                    name: 'Due',
                    data: dueData
                },
                {
                    name: 'Discount',
                    data: diesData
                }
            ],
            xaxis: {
                categories: categories
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return '৳ ' + val.toLocaleString() + ' taka';
                    }
                }
            }
        };

        var chart_bar_chart_1 = new ApexCharts(document.querySelector('#bar-chart-1'), options_bar_chart_1);
        chart_bar_chart_1.render();
    </script>

</body>
</html>
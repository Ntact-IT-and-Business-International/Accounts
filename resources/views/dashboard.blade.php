<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @include('layouts.css')
</head>

<body class="skin-blue fixed-layout">
    @include('layouts.preloader')
    <div id="main-wrapper">
        <header class="topbar">
            @include('layouts.navbar')
        </header>
        @include('layouts.sidebar')
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="container-fluid">
                @include('layouts.breadcrumb')
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            @include('layouts.message')
                                @livewire('cards')
                                @livewire('graphs')
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .right-sidebar -->
                @include('layouts.right-modal')
            </div>
        </div>
        @include('layouts.footer')
    </div>
    @include('layouts.javascript')
    <script src="{{asset('graphs/chartjs.js')}}"></script>
    <script>
        $(function() {
        // Wrap charts
        $('.chartjs-demo').each(function() {
            $(this).wrap($('<div style="height:' + this.getAttribute('height') + 'px"></div>'));
        });


        var graphChart = new Chart(document.getElementById('chart-graph').getContext("2d"), {
            type: 'line',
            data: {
            labels: ['2022', '2023', '2024', '2025', '2026', '2027', '2028'],
            datasets: [{
                label:           'Income',
                data:            [43000, 91000, 89000, 16000, 21000, 79000, 28000],
                borderWidth:     1,
                backgroundColor: 'rgba(113, 106, 202, 0.3)',
                borderColor:     '#ff4a00',
                borderDash:      [5, 5],
                fill: false
            }, {
                label:           'Expenditures',
                data:            [24000, 63000, 29000, 75000, 28000, 54000, 38000],
                borderWidth:     1,
                backgroundColor: 'rgba(40, 208, 148, 0.3)',
                borderColor:     '#62d493',
            }],
            },

            // Demo
            options: {
            responsive: false,
            maintainAspectRatio: false
            }
        });

        var barsChart = new Chart(document.getElementById('chart-bars').getContext("2d"), {
            type: 'bar',
            data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Income',
                data: [53000, 99000, 14000, 10000, 43000, 27000,53000, 99000, 14000, 10000, 43000, 27000],
                borderWidth: 1,
                backgroundColor: 'rgba(255, 73, 97, 0.3)',
                borderColor: '#FF4961'
            }, {
                label: 'Expenditures',
                data: [55000, 74000, 20000, 90000, 67000, 97000,55000, 74000, 20000, 90000, 67000, 97000],
                borderWidth: 1,
                backgroundColor: 'rgba(255, 145, 73, 0.3)',
                borderColor: '#f4ab55'
            }]
            },

            // Demo
            options: {
            responsive: false,
            maintainAspectRatio: false
            }
        });

        // Resizing charts

        function resizeCharts() {
            graphChart.resize();
            barsChart.resize();
            radarChart.resize();
            polarAreaChart.resize();
            pieChart.resize();
            doughnutChart.resize();
        }

        // Initial resize
        resizeCharts();

        // For performance reasons resize charts on delayed resize event
        window.layoutHelpers.on('resize.charts-demo', resizeCharts);
        });

    </script>
</body>
</html>


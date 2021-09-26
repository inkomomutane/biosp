@extends('layouts.backend.dashboard')

@section('sessions')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                <strong>{{ session('error') }}</strong>
            </div>
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>×</span></button>
                @error('name')
                    <strong>{{ $message }}</strong><br>
                @enderror

                @error('password')
                    <strong>{{ $message }}</strong><br>
                @enderror
                @error('email')
                    <strong>{{ $message }}</strong><br>
                @enderror
            </div>
        </div>
    @endif
@endsection

@section('content')
    <div class="row">

    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header row">
                    <a href="javascript:;" class="btn btn-primary daterange-btn icon-left btn-icon col-sm-12">
                        <i class="fas fa-calendar"></i>
                        Filtrar resumo por datas
                    </a>
                </div>
                <div class="card-body" id="card_bairros">

                    @foreach ($bairros as $key => $value)
                        <div class="mb-4">
                            <div class="text-small float-right font-weight-bold text-muted">{{ $value }}</div>
                            <div class="font-weight-bold mb-1">{{ $key }}</div>
                            <div class="progress" data-height="3" style="height: 3px;">
                                <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-12">
                        <h4 class="float-left">Gráfico Resumo.</h4>
                        <a href="" class="btn btn-primary float-right">
                            <i class="fa fa-filter" aria-hidden="true"></i>
                            Usar filtro avançado
                        </a>
                    </div>

                </div>
                <div class="card-body">
                    <canvas id="myChart" height="158"></canvas>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush
@push('cssLibs')
    <link rel="stylesheet" href="{{ asset('backend/prism/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

@endpush
@push('jsLibs')
    <script src="{{ asset('backend/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/prism/prism.js') }}"></script>
    <script src="{{ asset('backend/cropper/cropper.js') }}"></script>
    <script src="{{ asset('backend/chart/chart.min.js') }}"></script>
    <script src="{{ asset('backend/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
@endpush

@push('js')
    <script>
        "use strict";
        chart([],[]);

        $('.daterange-cus').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            drops: 'down',
            opens: 'right'
        });
        $('.daterange-btn').daterangepicker({
            ranges: {
                'Hoje': [moment(), moment()],
                'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                'Este Mês': [moment().startOf('month'), moment().endOf('month')],
                'Mês Passado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        }, function(start, end) {
            $.ajax({
                type: "get",
                url: "{{ url('/filtered_data') }}/" + start.format('DD-MM-Y') + "/" + end.format('DD-MM-Y'),
                data: "data",
                dataType: "json",
                success: function(response) {
                    chart(response.keys,response.values)
                    const object = response.data;
                    var cardData = '';
                    for (const key in object ) {
                        if (Object.hasOwnProperty.call(object, key)) {
                            const element = object[key];
                          cardData +='<div class="mb-4">'+
                            '<div class="text-small float-right font-weight-bold text-muted">' + element + '</div>' +
                            '<div class="font-weight-bold mb-1">'+ key + '</div>'+
                            '<div class="progress" data-height="3" style="height: 3px;">'+
                            '<div class="progress-bar" role="progressbar" data-width="80%"'+
                            'aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">'+
                            '</div></div></div>';
                        }
                    }

                    $('#card_bairros').empty();
                    $(cardData).appendTo('#card_bairros');
                    console.log(cardData);
                    console.log(myChart);
                },
                error: function(err) {
                    console.log(err);
                }
            });

            console.log(start.format('DD-MM-Y') + ";" + end.format('DD-MM-Y'));
            $('.daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        });

        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });


        function chart(keys,values) {
            var ctx = document.getElementById("myChart").getContext('2d');
        var bairros = keys ;
        var bairrosData = values;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: bairros,
                datasets: [{
                        label: 'Benificiarios atendidos',
                        data: bairrosData,
                        borderWidth: 2,
                        backgroundColor: 'rgba(254,86,83,.7)',
                        borderWidth: 0,
                        borderColor: 'transparent',
                        pointBorderWidth: 0,
                        pointRadius: 3.5,
                        pointBackgroundColor: 'transparent',
                        pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
                    },

                ]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 50,
                            callback: function(value, index, values) {
                                return '' + value;
                            }
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: true,
                            tickMarkLength: 15,
                        }
                    }]
                },
            }
        });
        }
    </script>
@endpush

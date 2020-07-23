@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')

@push('styles')

@endpush

@section('content')


    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card gradient-blackberry">
                <div class="card-content">
                <div class="card-body pt-2 pb-0">
                    <div class="media">
                    <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{ $totalUser }}</h3>
                        <span>Total Admins</span>
                    </div>

                    <div class="media-right white text-right">
                        <i class="fas fa-users font-large-1"></i>
                    </div>
                    </div>
                </div>
                @include('admin.layouts.line-chart')
                </div>
            </div>
            </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card gradient-ibiza-sunset">
                <div class="card-content">
                <div class="card-body pt-2 pb-0">
                    <div class="media">
                    <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{ $totalRole }}</h3>
                        <span>Total Roles</span>
                    </div>

                    <div class="media-right white text-right">
                        <i class="fab fa-r-project font-large-1"></i>
                    </div>
                    </div>
                </div>
                @include('admin.layouts.line-chart')
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card gradient-pomegranate">
            <div class="card-content">
            <div class="card-body pt-2 pb-0">
                <div class="media">
                <div class="media-body white text-left">
                <h3 class="font-large-1 mb-0">{{ $totalHosting }}</h3>
                    <span>Total Hosting</span>
                </div>

                <div class="media-right white text-right">
                    <i class="fas fa-hospital-symbol font-large-1"></i>
                </div>
                </div>
            </div>
            @include('admin.layouts.line-chart')
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card gradient-green-tea">
            <div class="card-content">
            <div class="card-body pt-2 pb-0">
                <div class="media">
                <div class="media-body white text-left">
                    <h3 class="font-large-1 mb-0">{{ $totalDemo }}</h3>
                    <span>Total Demos</span>
                </div>
                <div class="media-right white text-right">
                    <i class="fa fa-cogs font-large-1"></i>
                </div>
                </div>
            </div>
            @include('admin.layouts.line-chart')

            </div>
        </div>
        </div>

    </div>


    <div class="col-sm-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">PRODUCTS SALES</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
            <div class="chart-info mb-3 ml-3">
                <span class="gradient-blackberry d-inline-block rounded-circle mr-1" style="width:15px; height:15px;"></span>
                Sales
                <span class="gradient-mint d-inline-block rounded-circle mr-1 ml-2" style="width:15px; height:15px;"></span>
                Visits
            </div>
            <div id="line-area" class="height-350 lineArea">
            <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line y1="315" y2="315" x1="50" x2="1149.2000732421875" class="ct-grid ct-vertical"></line><line y1="255" y2="255" x1="50" x2="1149.2000732421875" class="ct-grid ct-vertical"></line><line y1="195" y2="195" x1="50" x2="1149.2000732421875" class="ct-grid ct-vertical"></line><line y1="135" y2="135" x1="50" x2="1149.2000732421875" class="ct-grid ct-vertical"></line><line y1="75" y2="75" x1="50" x2="1149.2000732421875" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="1149.2000732421875" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,315L50,315C102.343,275,154.686,195,207.029,195C259.371,195,311.714,255,364.057,255C416.4,255,468.743,45,521.086,45C573.429,45,625.771,195,678.114,195C730.457,195,782.8,99,835.143,99C887.486,99,939.829,154,992.171,189C1044.514,224,1096.857,273,1149.2,315L1149.2,315Z" class="ct-area"></path><path d="M50,315C102.343,275,154.686,195,207.029,195C259.371,195,311.714,255,364.057,255C416.4,255,468.743,45,521.086,45C573.429,45,625.771,195,678.114,195C730.457,195,782.8,99,835.143,99C887.486,99,939.829,154,992.171,189C1044.514,224,1096.857,273,1149.2,315" class="ct-line"></path><line x1="50" y1="315" x2="50.01" y2="315" class="ct-point" ct:value="0"></line><line x1="207.02858189174108" y1="195" x2="207.03858189174107" y2="195" class="ct-point" ct:value="20"></line><line x1="364.05716378348217" y1="255" x2="364.06716378348216" y2="255" class="ct-point" ct:value="10"></line><line x1="521.0857456752233" y1="45" x2="521.0957456752233" y2="45" class="ct-point" ct:value="45"></line><line x1="678.1143275669643" y1="195" x2="678.1243275669643" y2="195" class="ct-point" ct:value="20"></line><line x1="835.1429094587054" y1="99" x2="835.1529094587054" y2="99" class="ct-point" ct:value="36"></line><line x1="992.1714913504466" y1="189" x2="992.1814913504465" y2="189" class="ct-point" ct:value="21"></line><line x1="1149.2000732421875" y1="315" x2="1149.2100732421875" y2="315" class="ct-point" ct:value="0"></line></g><g class="ct-series ct-series-b"><path d="M50,315L50,315C102.343,305,154.686,300.455,207.029,285C259.371,269.545,311.714,183,364.057,183C416.4,183,468.743,231,521.086,231C573.429,231,625.771,123,678.114,123C730.457,123,782.8,243,835.143,243C887.486,243,939.829,147,992.171,147C1044.514,147,1096.857,259,1149.2,315L1149.2,315Z" class="ct-area"></path><path d="M50,315C102.343,305,154.686,300.455,207.029,285C259.371,269.545,311.714,183,364.057,183C416.4,183,468.743,231,521.086,231C573.429,231,625.771,123,678.114,123C730.457,123,782.8,243,835.143,243C887.486,243,939.829,147,992.171,147C1044.514,147,1096.857,259,1149.2,315" class="ct-line"></path><line x1="50" y1="315" x2="50.01" y2="315" class="ct-point" ct:value="0"></line><line x1="207.02858189174108" y1="285" x2="207.03858189174107" y2="285" class="ct-point" ct:value="5"></line><line x1="364.05716378348217" y1="183" x2="364.06716378348216" y2="183" class="ct-point" ct:value="22"></line><line x1="521.0857456752233" y1="231" x2="521.0957456752233" y2="231" class="ct-point" ct:value="14"></line><line x1="678.1143275669643" y1="123" x2="678.1243275669643" y2="123" class="ct-point" ct:value="32"></line><line x1="835.1429094587054" y1="243" x2="835.1529094587054" y2="243" class="ct-point" ct:value="12"></line><line x1="992.1714913504466" y1="147" x2="992.1814913504465" y2="147" class="ct-point" ct:value="28"></line><line x1="1149.2000732421875" y1="315" x2="1149.2100732421875" y2="315" class="ct-point" ct:value="0"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="320" width="157.02858189174108" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 157px; height: 20px;">1</span></foreignObject><foreignObject style="overflow: visible;" x="207.02858189174108" y="320" width="157.02858189174108" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 157px; height: 20px;">2</span></foreignObject><foreignObject style="overflow: visible;" x="364.05716378348217" y="320" width="157.0285818917411" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 157px; height: 20px;">3</span></foreignObject><foreignObject style="overflow: visible;" x="521.0857456752233" y="320" width="157.02858189174106" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 157px; height: 20px;">4</span></foreignObject><foreignObject style="overflow: visible;" x="678.1143275669643" y="320" width="157.02858189174106" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 157px; height: 20px;">5</span></foreignObject><foreignObject style="overflow: visible;" x="835.1429094587054" y="320" width="157.02858189174117" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 157px; height: 20px;">6</span></foreignObject><foreignObject style="overflow: visible;" x="992.1714913504466" y="320" width="157.02858189174094" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 157px; height: 20px;">7</span></foreignObject><foreignObject style="overflow: visible;" x="1149.2000732421875" y="320" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">8</span></foreignObject><foreignObject style="overflow: visible;" y="255" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="195" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">10</span></foreignObject><foreignObject style="overflow: visible;" y="135" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">20</span></foreignObject><foreignObject style="overflow: visible;" y="75" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">30</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">40</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">50</span></foreignObject></g><defs><linearGradient id="gradient" x1="0" y1="1" x2="1" y2="0"><stop offset="0" stop-color="rgba(0, 201, 255, 1)"></stop><stop offset="1" stop-color="rgba(146, 254, 157, 1)"></stop></linearGradient><linearGradient id="gradient1" x1="0" y1="1" x2="1" y2="0"><stop offset="0" stop-color="rgba(132, 60, 247, 1)"></stop><stop offset="1" stop-color="rgba(56, 184, 242, 1)"></stop></linearGradient></defs></svg></div>
            </div>
        </div>
        </div>
    </div>





    <section id="horizontal-examples">
        <div class="row match-height">
        <div class="col-xl-6 col-lg-12">
            <div class="card horizontal" style="height: 221.1px;">
            <div class="card-content d-flex justify-content-between">
                <div class="card-img">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                    <div class="carousel-item">
                        <img src="{{ asset('all-assets/admin/app-assets/img/photos/01.jpg') }}" class="d-block w-100" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('all-assets/admin/app-assets/img/photos/02.jpg') }}" class="d-block w-100" alt="Second slide">
                    </div>
                    <div class="carousel-item active">
                        <img src="{{ asset('all-assets/admin/app-assets/img/photos/03.jpg') }}" class="d-block w-100" alt="Third slide">
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
                </div>
                <div class="card-body">
                <div class="card-stacked align-self-center">
                    <div class="px-3">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Sweet halvah dragée jelly-o halvah carrot cake oat cake.</p>
                    <a class="btn btn-raised btn-success">Go somewhere</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12">
            <div class="card horizontal" style="height: 221.1px;">
            <div class="card-content d-flex justify-content-between">
                <div class="card-body">
                <div class="card-stacked align-self-center">
                    <div class="px-3">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Toffee sugar plum brownie pastry gummies jelly.</p>
                    <a class="btn btn-raised btn-danger">Go somewhere</a>
                    </div>
                </div>
                </div>
                <div class="card-img">
                <img class="card-img-top img-fluid" src="{{ asset('all-assets/admin/app-assets/img/photos/06.jpg') }}" alt="Card image cap">
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>




@endsection


@push('scripts')


<script>

    // Line with Area Chart Starts
    var lineArea = new Chartist.Line('#line-area', {
            labels: [1, 2, 3, 4, 5, 6, 7, 8],
            series: [
                [0, 20, 10, 45, 20, 36, 21, 0],
                [0, 5, 22, 14, 32, 12, 28, 0]
            ]
        },
        {
            low: 0,
            showArea: true,
            fullWidth: true,
            onlyInteger: true,
            axisY: {
                low: 0,
                scaleMinSpace: 50,
            },
            axisX: {
                showGrid: false
            }
        });

    lineArea.on('created', function (data) {
        var defs = data.svg.elem('defs');
        defs.elem('linearGradient', {
            id: 'gradient',
            x1: 0,
            y1: 1,
            x2: 1,
            y2: 0
        }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(0, 201, 255, 1)'
        }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(146, 254, 157, 1)'
        });

        defs.elem('linearGradient', {
            id: 'gradient1',
            x1: 0,
            y1: 1,
            x2: 1,
            y2: 0
        }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(132, 60, 247, 1)'
        }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(56, 184, 242, 1)'
        });
    });
    // Line with Area Chart Ends
</script>

@endpush

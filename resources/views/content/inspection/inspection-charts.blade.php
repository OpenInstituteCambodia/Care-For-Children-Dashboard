<!-- row -->
<section ng-app="app" ng-controller="chartController">
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- end widget -->

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-greenLight" id="wid-id-1" data-widget-sortable="false"
                 data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-editbutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-bar-chart"></i> </span>
                    <h2>{{ trans('inspection.inspection-graph') }}</h2>
                </header>

                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <!--<h2>Nestable List #1</h2>-->
                        <div class="col-md-12" style="padding: 10px 0 0 0">
                            <div class="col-md-6">
                                <div class="panel panel-primary" style="border-color: #5cb85c">
                                    <div class="panel-heading" style="background-color: #5cb85c;">
                                        {{ trans('inspection.select-option') }}
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        @if (Auth::user()->role->level == 1 || Auth::user()->role->level == 2)
                                            <ul style="list-style:none; padding: 0; line-height: 25px;">
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" ng-checked="" value="national" id="rd_national" name="options" ng-model="national_option" checked="checked">&nbsp;{{ trans('information_content.geography.national') }}
                                                        </div>
                                                        <div class="col-md-8"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" id="rd_province" value="province" name="options" ng-model="checked">&nbsp;{{ trans('information_content.geography.province') }}
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="province-select" style="display:inline" ng-show="checked">
                                                                <label class="select">
                                                                    <select ng-model="province" class="form-control" onchange="loadNew(this, 'district')" id="province-option">
                                                                        <option value="">{{ trans('information_content.geography.province_label') }}</option>
                                                                        @foreach($provinces as $province)
                                                                            <option value="{{$province->ProvinceCode}}">{{$province->ProvinceName}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" value="district" id="rd_district" name="options" ng-model="district_option">&nbsp;{{ trans('information_content.geography.district') }}
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="district-select" style="display:inline">
                                                                <label class="select">
                                                                    <select ng-model="district" id="district-filter" class="form-control">
                                                                        <option value="">{{ trans('information_content.geography.district_label') }}</option>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @elseif (Auth::user()->role->level == 3)
                                            <ul style="list-style:none; padding: 0; line-height: 25px;">
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" id="rd_province" value="province" name="options" ng-model="checked" checked="checked">&nbsp;{{ trans('information_content.geography.province') }}
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="col-md-8">
                                                                <div style="display:inline" ng-show="checked">
                                                                    <input id="province-option" type="hidden" value="{{ $provinces->first()->ProvinceCode }}"/>
                                                                    <input id="province-name" type="hidden" value="{{ $provinces->first()->ProvinceName }}"/>
                                                                    <h5 style="display:inline">{{ $provinces->first()->ProvinceName }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <input type="radio" value="district" id="rd_district" name="options" ng-model="district_option">&nbsp;{{ trans('information_content.geography.district') }}
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="district-select" style="display:inline">
                                                                <label class="select">
                                                                    <select ng-model="district" id="district-filter" class="form-control">
                                                                        <option value="">{{ trans('information_content.geography.district_label') }}</option>
                                                                        @foreach($districts as $district)
                                                                            <option value="{{$district->DistrictCode}}">{{$district->DistrictName}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @elseif (Auth::user()->role->level == 4)
                                            <ul style="list-style:none; padding: 0; line-height: 25px;">
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            {{ trans('information_content.geography.province') }}
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5 style="display:inline">{{ $provinces->first()->ProvinceName }}</h5>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            {{ trans('information_content.geography.district') }}
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="select">
                                                                <input type="radio" id="rd_district" value="district" checked="checked" style="display:none">
                                                                <input id="district-filter" type="hidden" value="{{ $districts->first()->DistrictCode }}"/>
                                                                <input id="district-name" type="hidden" value="{{ $districts->first()->DistrictName }}"/>
                                                                <h5 style="display:inline">{{ $districts->first()->DistrictName }}</h5>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-primary" style="border-color: #5cb85c">
                                    <div class="panel-heading" style="background-color: #5cb85c;">
                                        {{ trans('inspection.select-year') }}
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-5">
                                                    {{ trans('inspection.inspection-in-year') }}
                                                </div>
                                                <div class="col-md-7">
                                                    <div​ style="display:inline">
                                                        <label class="select">
                                                            <select ng-model="year" id="year-filter" class="form-control">
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="text-align:right; margin-top:10px">
                                            <button id="search-button" class="btn btn-success">{{ trans('button.search') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top: 10px">
                                <div class="col-md-6" style="padding: 0 10px 0 0">
                                    <div class="panel panel-primary" style="border-color: #5cb85c">
                                        <div class="panel-heading" style="background-color: #5cb85c;">
                                            {{ trans('inspection.inspection-pie-chart') }}
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="piechart_institution_3d"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding: 0 0 0 10px">
                                    <div class="panel panel-primary" style="border-color: #5cb85c">
                                        <div class="panel-heading" style="background-color: #5cb85c;">
                                            {{ trans('inspection.children-pie-chart') }}
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="piechart_children_3d"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 no-padding" style="padding: 10px 0 0 0">
                                <div class="col-md-8">
                                    <div class="panel panel-primary" style="border-color: #5cb85c">
                                        <div class="panel-heading" style="background-color: #5cb85c;">
                                            {{ trans('inspection.inspection-bar-chart') }}
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="inspect_graph"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding: 0 5px 0 0;">
                                    <div class="panel panel-primary" style="border-color: #5cb85c">
                                        <div class="panel-heading" style="background-color: #5cb85c;">
                                            {{ trans('inspection.inspection-table') }}
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="dataTable display table table-bordered" cellspacing="0" width="100%" >
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('inspection.institution-name') }}</th>
                                                                <th>{{ trans('inspection.inspect-once') }}</th>
                                                                <th>{{ trans('inspection.inspect-twice') }}</th>
                                                                <th>{{ trans('inspection.baseline') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tBody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </article>
        <!-- WIDGET END -->
    </div>
</section>
<!-- end widget grid -->

<div id="modal-loading" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent; box-shadow: none; border: none;">
            <div class="modal-body" style="background-color: transparent; text-align: center;">
                <img src="{{asset('img/loading.gif')}}">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // $('#chart-result').hide();
        $('#province-select').hide();
        $('#district-select').hide();
        $('#chart-result').hide();

        $('#rd_national').click(function(){
            $('#province-select').hide();
            $('#district-select').hide();
        });

        $('#rd_province').click(function(){
            $('#province-select').show();
            $('#district-select').hide();
        });

        $('#rd_district').click(function(){
            $('#province-select').show();
            $('#district-select').show();
        });

        callAllAjax();

        $('#search-button').click(function() {
            // alert({{ Auth::user()->role->level }});
            callAllAjax();
        })
    });

    function callAllAjax() {
        if (!$("#rd_province").is(":checked") && !$("#rd_district").is(":checked") && !$("#rd_national").is(":checked")) {
            alert("Please choose an option");
        } else {
            var rd_name;
            var province_code;
            var district_code;
            var selected_label;
            var inspected_date = $('#year-filter').val();

            // alert(inspected_date);

            if ({{ Auth::user()->role->level }} == 1 || {{ Auth::user()->role->level }} == 2) {
                if($("#rd_province").is(":checked")) {
                    selected_label = '<?php echo trans('information_content.geography.province') ?> ' + $('#province-option option:selected').text();
                }
                else if($("#rd_district").is(":checked") || {{ Auth::user()->role->level }} == 4) {
                    selected_label = '<?php echo trans('information_content.geography.district') ?> ' + $('#district-filter option:selected').text();
                }
                else {
                    selected_label = '<?php echo trans('information_content.geography.whole-country') ?> ' + $('input[name=options]:checked').text();
                }
            }
            else if ({{ Auth::user()->role->level }} == 3) {
                if($("#rd_district").is(":checked") || {{ Auth::user()->role->level }} == 4) {
                    selected_label = '<?php echo trans('information_content.geography.district') ?> ' + $('#district-filter option:selected').text();
                }
                else if($("#rd_province").is(":checked")) {
                    selected_label = '<?php echo trans('information_content.geography.province') ?> ' + $('#province-name').val();
                }
            }
            else if ({{ Auth::user()->role->level }} == 4) {
                selected_label = '<?php echo trans('information_content.geography.district') ?> ' + $('#district-name').val();
            }

            if($("#rd_province").is(":checked")) {
               rd_name = $('input[name=options]:checked').val();
               province_code = $('#province-option').val();
            }
            else if($("#rd_district").is(":checked") || {{ Auth::user()->role->level }} == 4) {
                rd_name = "district";
                district_code = $('#district-filter').val();
            }
            else {
                rd_name = $('input[name=options]:checked').val();
            }

            $('#modal-loading').modal('show');

            // Ajax for Institution Chart
            jQuery.ajax({
                url: "inspect/get-chart-result",
                type: "GET",
                data: {
                    "selected_name" : rd_name,
                    "province_code" : province_code,
                    "district_code" : district_code,
                    "inspected_date" : inspected_date,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    $('#modal-loading').modal('hide');

                    var once = data[0].total_inspect_once;
                    var twice = data[0].total_inspect_twice;
                    var total_centers = data[0].total_centers;

                    if (once == '0' && twice == '0' && total_centers == '0') {
                        document.getElementById('piechart_3d').innerHTML = '<h1><?php echo trans('inspection.no-data') ?></h1>';
                    } else {
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['<?php echo trans('inspection.inspect-once') ?>', parseInt(once)],
                                ['<?php echo trans('inspection.inspect-twice') ?>', parseInt(twice)],
                                ['<?php echo trans('inspection.not-inspect') ?>', parseInt(total_centers)]
                            ]);

                            var options = {
                                title: '<?php echo trans('inspection.inspect-chart-title') ?> - ' + selected_label + ' - ' + $('#year-filter').val(),
                                legend: 'labeled',
                                pieSliceText: 'none',
                                is3D: true,
                                width: '100%',
                                height: '100%',
                                chartArea: {
                                    left: "3%",
                                    top: "20%",
                                    height: "100%",
                                    width: "100%"
                                },
                                colors: ['#6599FF', '#e23d80', 'pink']
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart_institution_3d'));
                            chart.draw(data, options);
                        }
                    }

                    // $('#chart-result').show();
                },
                error: function(error) {
                    console.log(error);
                }
            });

            // Ajax for Children Chart
            jQuery.ajax({
                url: "inspect/get-children-result",
                type: "GET",
                data: {
                    "selected_name" : rd_name,
                    "province_code" : province_code,
                    "district_code" : district_code,
                    "inspected_date" : inspected_date,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    $('#modal-loading').modal('hide');

                    var once = data[0].total_inspect_once;
                    var twice = data[0].total_inspect_twice;
                    var total_children = data[0].total_not_inspected_children;

                    if (once == '0' && twice == '0' && total_children == '0') {
                        document.getElementById('piechart_3d').innerHTML = '<h1><?php echo trans('inspection.no-data') ?></h1>';
                    } else {
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['<?php echo trans('inspection.inspect-once') ?>', parseInt(once)],
                                ['<?php echo trans('inspection.inspect-twice') ?>', parseInt(twice)],
                                ['<?php echo trans('inspection.not-inspect') ?>', parseInt(total_children)]
                            ]);

                            var options = {
                                title: '<?php echo trans('inspection.inspect-children-title') ?> - ' + selected_label + ' - ' + $('#year-filter').val(),
                                legend: 'labeled',
                                pieSliceText: 'none',
                                is3D: true,
                                width: '100%',
                                height: '100%',
                                chartArea: {
                                    left: "3%",
                                    top: "20%",
                                    height: "100%",
                                    width: "100%"
                                },
                                colors: ['#FF9900', '#6599FF', '#FFDE00']
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart_children_3d'));
                            chart.draw(data, options);
                        }
                    }

                    $('#chart-result').show();
                },
                error: function(error) {
                    console.log(error);
                }
            });

            // Ajax for Table chart
            jQuery.ajax({
                url: "inspect/get-table-result",
                type: "GET",
                data: {
                    "selected_name" : rd_name,
                    "province_code" : province_code,
                    "district_code" : district_code,
                    "inspected_date" : inspected_date,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data){
                    // console.log(data);
                    $('#modal-loading').modal('hide');

                    var arr =[['<?php echo trans('inspection.inspection') ?>', '<?php echo trans('inspection.inspect-once') ?>', '<?php echo trans('inspection.inspect-twice') ?>', '<?php echo trans('inspection.baseline') ?>']];
                    var last_total = [];
                    var max_total_centers;
                    $.each(data, function(index, value){
                        // console.log(value);
                        var inner_arr =[];
                        $.each(value, function(key, val){
                            // console.log(val);
                            inner_arr.push(val);
                        });

                        // Temporary array to keep converted numbers
                        var converted_arr = [];
                        converted_arr.push(inner_arr[0]);
                        converted_arr.push(parseInt(inner_arr[1]));
                        converted_arr.push(parseInt(inner_arr[2]));
                        converted_arr.push(parseInt(inner_arr[3]));

                        // console.log(converted_arr);

                        arr.push(converted_arr);
                    });

                    // console.log(arr);

                    // Google Map
                    google.charts.load('current', {packages: ['corechart', 'bar']});
                    google.charts.setOnLoadCallback(drawStacked);

                    function drawStacked() {
                        var data = google.visualization.arrayToDataTable(arr);
                        var chartAreaHeight = data.getNumberOfRows() * 35;
                        var chartHeight = chartAreaHeight + 250;

                        var options = {
                            title : '<?php echo trans('inspection.inspection-bar-chart') ?> - ' + selected_label + ' - ' + $('#year-filter').val(),
                            hAxis: {title: '<?php echo trans('inspection.total-inspection') ?>'},
                            vAxis: {title: '<?php echo trans('inspection.inspection-location') ?>'},
                            // chartArea: {width: '50%', height: '90%'},
                            seriesType: 'bars',
                            isStacked: true,
                            orientation: 'vertical',
                            pointSize: 10,
                            pointShape: { type: 'triangle', rotation: 180 },
                            width: '100%',
                            height: chartHeight,
                            chartArea: {
                                left: "15%",
                                top: "7%",
                                bottom: "12%",
                                width: "65%",
                                height: chartHeight
                            },
                            colors: ['blue', 'green', '#d52434'],
                            series: {2: {type: 'scatter'}}
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('inspect_graph'));
                        chart.draw(data, options);
                    }

                    // Table
                    $("#tBody").empty();
                    var trHTML = '';
                    for (i = 0; i < data.length; i++) {
                        var col_name = data[i].d_name;
                        var inspected_once = data[i].insp1;
                        var inspected_twice = data[i].insp2;
                        var total_centers = data[i].total_centers;

                        if (inspected_once == '0' && inspected_twice == '0' && total_centers == '0') {
                            trHTML += '<tr class="hidden"></tr>'
                        } else {
                            trHTML +=
                                '<tr><td>'
                                + data[i].d_name
                                + '</td><td>'
                                + inspected_once
                                + '</td><td>'
                                + inspected_twice
                                + '</td><td>'
                                + total_centers
                                + '</td></tr>';
                        }
                    }
                    $('#tBody').append(trHTML);

                    $('#chart-result').show();
                    // alert(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>

<script type="text/javascript">
    pageSetUp();

    // Getting districts when province is selected
    var loadNew = function (obj, type) {
        var code;
        code = $(obj).val();
        var location = getLocation(type, code);

        if (type === 'district') {
            $("#district-filter").html("<option value=''>{{ trans('information_content.geography.district_label') }}</option>");
            for (i = 0; i < location.length; i++) {
                $("#district-filter").append("<option value='" + location[i].DistrictCode + "'>" + location[i].DistrictName + "</option>");
            }
        }
    };

    var getLocation = function (type, code) {
        var results = "";
        if (name === undefined) {
            name = "";
        }

        // Go to PDCVController
        $.ajax({
            url: "{{url('PDCV')}}/" + type + "/" + code,
            type: "GET",
            async: false,
            success: function (result) {
                results = result;
            }
        });
        return results;
    };

    // Generating years
    var min = new Date().getFullYear() - 1,
    max = min + 10,
    select = document.getElementById('year-filter');

    for (var i = min; i<=max; i++){
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        select.appendChild(opt);
    }


</script>

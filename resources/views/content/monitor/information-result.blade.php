<!-- row -->
<div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- end widget -->

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-greenLight" id="wid-id-1" data-widget-sortable="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-editbutton="false">
            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"

            -->
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>{{ trans('information_content.result.information-result') }}</h2>
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

                    <table id="datatable_fixed_column" class="table table-striped table-bordered printBorder display" width="100%">
                        <thead>
                            <tr class="danger txt-color-darken">
                                @foreach($col_headers as $header)
                                    @foreach($header as $col)
                                        <th>{{$col}}</th>
                                    @endforeach
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $row)
                                <tr onclick="compareObject(this)" data-href="#monitor/entity/{{$table->id}}/{{$row->EDF_CODE}}" target="_blank">
                                    <?php $i = 0; ?>
                                    @foreach($row as $data)
                                        @if($i===0)
                                        @endif
                                        @if($i>0)
                                            <td>{{$data}}</td>
                                        @endif
                                        <?php $i++; ?>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->

    </article>
    <!-- WIDGET END -->

</div>
<!-- end row -->
<style>
    tr{
        cursor: pointer;
    }
    tr:hover{
        color: #0066cc;
    }

    @media print {
        table,table th, table tr, table td {
            border-top: #000 solid 1px;
            border-bottom: #000 solid 1px;
            border-left: #000 solid 1px;
            border-right: #000 solid 1px;
            border-collapse: collapse;
        }
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file-text-o"></i> {!! trans('faq::category.name') !!} <small> {!! trans('app.manage') !!} {!! trans('faq::category.names') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! guard_url('/') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
            <li class="active">{!! trans('faq::category.names') !!}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div id='faq-category-entry'>
    </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                    <li class="{!!(request('status') == '')?'active':'';!!}"><a href="{!!guard_url('faq/category')!!}">{!! trans('faq::category.names') !!}</a></li>
                    <li class="{!!(request('status') == 'archive')?'active':'';!!}"><a href="{!!guard_url('faq/category?status=archive')!!}">Archived</a></li>
                    <li class="{!!(request('status') == 'deleted')?'active':'';!!}"><a href="{!!guard_url('faq/category?status=deleted')!!}">Trashed</a></li>
                    <li class="pull-right">
                    <span class="actions">
                    <!--   
                    <a  class="btn btn-xs btn-purple"  href="{!!guard_url('faq/category/reports')!!}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-sm hidden-xs"> Reports</span></a>
                    @include('faq::admin.category.partial.actions')
                    -->
                    @include('faq::admin.category.partial.filter')
                    @include('faq::admin.category.partial.column')
                    </span> 
                </li>
            </ul>
            <div class="tab-content">
                <table id="faq-category-list" class="table table-striped data-table">
                    <thead class="list_head">
                        <th style="text-align: right;" width="1%"><a class="btn-reset-filter" href="#Reset" style="display:none; color:#fff;"><i class="fa fa-filter"></i></a> <input type="checkbox" id="faq-category-check-all"></th>
                        <th data-field="name">{!! trans('faq::category.label.name')!!}</th>
                    <th data-field="status">{!! trans('faq::category.label.status')!!}</th>
                    <th data-field="created_at">{!! trans('faq::category.label.created_at')!!}</th>
                    <th data-field="updated_at">{!! trans('faq::category.label.updated_at')!!}</th>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">

var oTable;
var oSearch;
$(document).ready(function(){
    app.load('#faq-category-entry', '{!!guard_url('faq/category/0')!!}');
    oTable = $('#faq-category-list').dataTable( {
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function (data, type, full, meta){
                return '<input type="checkbox" name="id[]" value="' + data.id + '">';
            }
        }], 
        
        "responsive" : true,
        "order": [[1, 'asc']],
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! guard_url('faq/category') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $.each(oSearch, function(key, val){
                aoData.push( { 'name' : key, 'value' : val } );
            });
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'id'},
            {data :'name'},
            {data :'status'},
            {data :'created_at'},
            {data :'updated_at'},
        ],
        "pageLength": 25
    });

    $('#faq-category-list tbody').on( 'click', 'tr td:not(:first-child)', function (e) {
        e.preventDefault();

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        var d = $('#faq-category-list').DataTable().row( this ).data();
        $('#faq-category-entry').load('{!!guard_url('faq/category')!!}' + '/' + d.id);
    });

    $('#faq-category-list tbody').on( 'change', "input[name^='id[]']", function (e) {
        e.preventDefault();

        aIds = [];
        $(".child").remove();
        $(this).parent().parent().removeClass('parent'); 
        $("input[name^='id[]']:checked").each(function(){
            aIds.push($(this).val());
        });
    });

    $("#faq-category-check-all").on( 'change', function (e) {
        e.preventDefault();
        aIds = [];
        if ($(this).prop('checked')) {
            $("input[name^='id[]']").each(function(){
                $(this).prop('checked',true);
                aIds.push($(this).val());
            });

            return;
        }else{
            $("input[name^='id[]']").prop('checked',false);
        }
        
    });


    $(".reset_filter").click(function (e) {
        e.preventDefault();
        $("#form-search")[ 0 ].reset();
        $('#form-search input,#form-search select').each( function () {
          oTable.search( this.value ).draw();
        });
        $('#faq-category-list .reset_filter').css('display', 'none');

    });


    // Add event listener for opening and closing details
    $('#faq-category-list tbody').on('click', 'td.details-control', function (e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });

});
</script>
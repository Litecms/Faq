@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('faq::category.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('faq::category.names') !!}</small>
@stop

@section('title')
{!! trans('faq::category.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('faq::category.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='faq-category-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="faq-category-list" class="table table-striped table-bordered data-table">
    <thead  class="list_head">
        <th>{!! trans('faq::category.label.name')!!}</th>
        <th>{!! trans('faq::category.label.status')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[name]')->raw()!!}</th>
        <th>{!! Form::text('search[status]')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#faq-category-entry', '{!!trans_url('admin/faq/category/0')!!}');
    oTable = $('#faq-category-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/faq/category') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#faq-category-list .search_bar input, #faq-category-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
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
            {data :'name'},
                    {data :'status'},
        ],
        "pageLength": 25
    });

    $('#faq-category-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#faq-category-list').DataTable().row( this ).data();

        $('#faq-category-entry').load('{!!trans_url('admin/faq/category')!!}' + '/' + d.id);
    });

    $("#faq-category-list .search_bar input, #faq-category-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
});
</script>
@stop

@section('style')
@stop


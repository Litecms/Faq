@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('faq::faq.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('faq::faq.names') !!}</small>
@stop

@section('title')
{!! trans('faq::faq.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('faq::faq.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='faq-faq-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="faq-faq-list" class="table table-striped table-bordered data-table">
    <thead  class="list_head">
        <th>{!! trans('faq::faq.label.question')!!}</th>
        <th>{!! trans('faq::faq.label.answer')!!}</th>
        <th>{!! trans('faq::faq.label.category_id')!!}</th>
        <th>{!! trans('faq::faq.label.status')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[question]')->raw()!!}</th>
        <th>{!! Form::text('search[answer]')->raw()!!}</th>
        <th>{!! Form::text('search[category_id]')->raw()!!}</th>
        <th>{!! Form::text('search[status]')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#faq-faq-entry', '{!!trans_url('admin/faq/faq/0')!!}');
    oTable = $('#faq-faq-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/faq/faq') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#faq-faq-list .search_bar input, #faq-faq-list .search_bar select').each(
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
            {data :'question'},
                    {data :'answer'},
                    {data :'category_id'},
                    {data :'status'},
        ],
        "pageLength": 25
    });

    $('#faq-faq-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#faq-faq-list').DataTable().row( this ).data();

        $('#faq-faq-entry').load('{!!trans_url('admin/faq/faq')!!}' + '/' + d.id);
    });

    $("#faq-faq-list .search_bar input, #faq-faq-list .search_bar select").on('keyup select', function (e) {
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


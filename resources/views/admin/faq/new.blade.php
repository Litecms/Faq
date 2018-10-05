<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">  {!! trans('faq::faq.names') !!} [{!! trans('faq::faq.text.preview') !!}]</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#faq-faq-entry' data-href='{!!guard_url('faq/faq/create')!!}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }} </button>
        </div>
    </div>
</div>
<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('faq::faq.name') !!} [{!!$faq->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#faq-faq-edit'  data-load-to='#faq-faq-entry' data-datatable='#faq-faq-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#faq-faq-entry' data-href='{{trans_url('admin/faq/faq')}}/{{$faq->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#faq" data-toggle="tab">{!! trans('faq::faq.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('faq-faq-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(trans_url('admin/faq/faq/'. $faq->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="faq">
                @include('faq::admin.faq.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
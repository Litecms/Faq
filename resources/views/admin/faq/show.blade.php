<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.view') }}   {!! trans('faq::faq.name') !!}  [{!! $faq->name !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#faq-faq-entry' data-href='{{trans_url('admin/faq/faq/create')}}'><i class="fa fa-times-circle"></i> New</button>
        @if($faq->id )
        <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#faq-faq-entry' data-href='{{ trans_url('/admin/faq/faq') }}/{{$faq->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> Edit</button>
        <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#faq-faq-entry' data-datatable='#faq-faq-list' data-href='{{ trans_url('/admin/faq/faq') }}/{{$faq->getRouteKey()}}' >
        <i class="fa fa-times-circle"></i> Delete
        </button>
        @endif
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('faq::faq.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('faq-faq-show')
        ->method('POST')
        ->files('true')
        ->action(trans_url('admin/faq/faq'))!!}
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    @include('faq::admin.faq.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#faq" data-toggle="tab">{!! trans('faq::faq.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#faq-faq-edit'  data-load-to='#faq-faq-entry' data-datatable='#faq-faq-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#faq-faq-entry' data-href='{{guard_url('faq/faq')}}/{{$faq->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('faq-faq-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('faq/faq/'. $faq->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="faq">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('faq::faq.name') !!} [{!!@$faq->category->name!!}] </div>
                @include('faq::admin.faq.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>
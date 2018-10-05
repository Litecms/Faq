    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('faq::faq.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#faq-faq-entry' data-href='{{guard_url('faq/faq/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($faq->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#faq-faq-entry' data-href='{{ guard_url('faq/faq') }}/{{$faq->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#faq-faq-entry' data-datatable='#faq-faq-list' data-href='{{ guard_url('faq/faq') }}/{{$faq->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('faq-faq-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('faq/faq'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('faq::faq.name') !!}  [{!!@$faq->category->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('faq::admin.faq.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>
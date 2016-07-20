<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('faq::category.name') !!} [{!!$category->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#faq-category-edit'  data-load-to='#faq-category-entry' data-datatable='#faq-category-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#faq-category-entry' data-href='{{trans_url('admin/faq/category')}}/{{$category->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#category" data-toggle="tab">{!! trans('faq::category.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('faq-category-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(trans_url('admin/faq/category/'. $category->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="category">
                @include('faq::admin.category.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
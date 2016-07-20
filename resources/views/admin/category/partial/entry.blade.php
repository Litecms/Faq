<div class='col-md-6 col-sm-6'>
       {!! Form::text('name')
       ->required()
       -> label(trans('faq::category.label.name'))
       -> placeholder(trans('faq::category.placeholder.name'))!!}
</div>

<div class='col-md-6 col-sm-6'>
       {!! Form::select('status')
       -> options(trans('faq::category.options.status'))
       -> label(trans('faq::category.label.status'))
       -> placeholder(trans('faq::category.placeholder.status'))!!}
</div>

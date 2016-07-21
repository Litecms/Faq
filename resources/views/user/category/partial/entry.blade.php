 {!! Form::hidden('upload_folder')!!}
<div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('faq::category.label.name'))
                       -> placeholder(trans('faq::category.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('status')
                       -> label(trans('faq::category.label.status'))
                       -> placeholder(trans('faq::category.placeholder.status'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}
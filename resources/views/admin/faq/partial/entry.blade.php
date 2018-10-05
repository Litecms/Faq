            <div class='row'>
                <div class='col-md-6 col-sm-6'>
                       {!! Form::text('question')
                       -> label(trans('faq::faq.label.question'))
                       -> placeholder(trans('faq::faq.placeholder.question'))!!}
                </div>
                <div class='col-md-6 col-sm-6'>
                       {!! Form::select('category_id')
                        ->options(Faq::selectCategories())
                        -> label(trans('faq::faq.label.category_id'))
                        -> placeholder(trans('faq::faq.placeholder.category_id'))!!}
                </div>
                 <div class='col-md-12 col-sm-12'>
                       {!! Form::textarea('answer')
                       ->row(5)
                       -> label(trans('faq::faq.label.answer'))
                       -> placeholder(trans('faq::faq.placeholder.answer'))!!}
                </div>
                <div class='col-md-4 col-sm-6'>
                   {!! Form::select('status')
                   -> options(trans('faq::faq.options.status'))
                   -> label(trans('faq::faq.label.status'))!!}
                </div>
            </div>
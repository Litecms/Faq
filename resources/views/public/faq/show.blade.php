            @include('faq::public.faq.partial.header')

            <section class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('faq::public.faq.partial.aside')
                        </div>
                        <div class="col-md-9 ">
                            <div class="area">
                                <div class="item">
                                    <div class="feature">
                                        <img class="img-responsive center-block" src="{!!url($faq->defaultImage('images' , 'xl'))!!}" alt="{{$faq->title}}">
                                    </div>
                                    <div class="content">
                                        <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('faq::faq.label.id') !!}
                </label><br />
                    {!! $faq['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="question">
                    {!! trans('faq::faq.label.question') !!}
                </label><br />
                    {!! $faq['question'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="answer">
                    {!! trans('faq::faq.label.answer') !!}
                </label><br />
                    {!! $faq['answer'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="category_id">
                    {!! trans('faq::faq.label.category_id') !!}
                </label><br />
                    {!! $faq['category_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('faq::faq.label.slug') !!}
                </label><br />
                    {!! $faq['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('faq::faq.label.status') !!}
                </label><br />
                    {!! $faq['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_id">
                    {!! trans('faq::faq.label.user_id') !!}
                </label><br />
                    {!! $faq['user_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_type">
                    {!! trans('faq::faq.label.user_type') !!}
                </label><br />
                    {!! $faq['user_type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="upload_folder">
                    {!! trans('faq::faq.label.upload_folder') !!}
                </label><br />
                    {!! $faq['upload_folder'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('faq::faq.label.deleted_at') !!}
                </label><br />
                    {!! $faq['deleted_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('faq::faq.label.created_at') !!}
                </label><br />
                    {!! $faq['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('faq::faq.label.updated_at') !!}
                </label><br />
                    {!! $faq['updated_at'] !!}
            </div>
        </div>
    </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('question')
                       -> label(trans('faq::faq.label.question'))
                       -> placeholder(trans('faq::faq.placeholder.question'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('answer')
                       -> label(trans('faq::faq.label.answer'))
                       -> placeholder(trans('faq::faq.placeholder.answer'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('category_id')
                       -> label(trans('faq::faq.label.category_id'))
                       -> placeholder(trans('faq::faq.placeholder.category_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_radios('status')
                   -> radios(trans('faq::faq.options.status'))
                   -> label(trans('faq::faq.label.status'))!!}
                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




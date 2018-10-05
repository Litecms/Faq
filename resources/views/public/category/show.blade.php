            @include('faq::public.category.partial.header')

            <section class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('faq::public.category.partial.aside')
                        </div>
                        <div class="col-md-9 ">
                            <div class="area">
                                <div class="item">
                                    <div class="feature">
                                        <img class="img-responsive center-block" src="{!!url($category->defaultImage('images' , 'xl'))!!}" alt="{{$category->title}}">
                                    </div>
                                    <div class="content">
                                        <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('faq::category.label.id') !!}
                </label><br />
                    {!! $category['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('faq::category.label.name') !!}
                </label><br />
                    {!! $category['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('faq::category.label.slug') !!}
                </label><br />
                    {!! $category['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('faq::category.label.status') !!}
                </label><br />
                    {!! $category['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_id">
                    {!! trans('faq::category.label.user_id') !!}
                </label><br />
                    {!! $category['user_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_type">
                    {!! trans('faq::category.label.user_type') !!}
                </label><br />
                    {!! $category['user_type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="upload_folder">
                    {!! trans('faq::category.label.upload_folder') !!}
                </label><br />
                    {!! $category['upload_folder'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('faq::category.label.deleted_at') !!}
                </label><br />
                    {!! $category['deleted_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('faq::category.label.created_at') !!}
                </label><br />
                    {!! $category['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('faq::category.label.updated_at') !!}
                </label><br />
                    {!! $category['updated_at'] !!}
            </div>
        </div>
    </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('faq::category.label.name'))
                       -> placeholder(trans('faq::category.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('faq::category.options.status'))
                    -> label(trans('faq::category.label.status'))
                    -> placeholder(trans('faq::category.placeholder.status'))!!}
               </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




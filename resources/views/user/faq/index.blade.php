@include('public::notifications')
<div class="dashboard-content">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <h3 class="panel-title">
                        My
                        <span>
                            Faq
                        </span>
                    </h3>
                    <p class="panel-sub-title m-t-5 text-muted">
                        Sub title goes here with small font
                    </p>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="row m-t-5">
                        <div class="col-xs-6 col-sm-8">
                                {!!Form::open()
                                ->method('GET')
                                ->action(URL::to('user/faq/faq'))!!}
                                <div class="input-group">
                                    {!!Form::text('search')->type('text')->class('form-control')->placeholder('Search for Faq')->raw()!!}
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-danger" type="button">
                                            <i class="icon-magnifier">
                                            </i>
                                        </button>
                                    </span>
                                </div>
                                {!! Form::close()!!}
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <a class=" btn btn-success btn-block text-uppercase f-12" href="{{ trans_url('/user/faq/faq/create') }}">
                                {{ trans('cms.create')  }} Faq
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{!! trans('faq::faq.label.question')!!}</th>
                            <th>{!! trans('faq::faq.label.answer')!!}</th>
                            <th>{!! trans('faq::faq.label.category_id')!!}</th>
                            <th width="170">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $faq->question }}</td>
                            <td>{{ substr($faq->answer,0,100) }}...</td>
                            <td>{{ $faq->category['name'] }}</td>
                            <td>
                                 <div class="btn-group dashboard-blog-actions text-right">
                                <a class="btn btn-icon waves-effect btn-success m-b-5" href="{{trans_url('faq')}}">
                                    <i class="fa fa-eye">
                                    </i>
                                </a>
                                <a class="btn btn-icon waves-effect btn-primary m-b-5" href="{{ trans_url('/user') }}/faq/faq/{!! $faq->getRouteKey() !!}/edit">
                                    <i class="fa fa-pencil">
                                    </i>
                                </a>
                                <a class="btn btn-icon waves-effect btn-danger" data-action="DELETE" data-href="{{ trans_url('/user/faq/faq') }}/{!! $faq->getRouteKey() !!}" data-remove="{!! $faq->getRouteKey() !!}">
                                    <i class="fa fa-trash">
                                    </i>
                                </a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $faqs->links() }}
         </div>
    </div>

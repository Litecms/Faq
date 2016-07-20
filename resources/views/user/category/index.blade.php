@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> My Categories </h4>
        </div>
        <div class="col-md-6">
            <a href="{{ trans_url('/user/faq/category/create') }}" class="btn btn-default pull-right"> {{ trans('cms.create')  }} Category</a>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
    <hr>
    <div class="row">
        <div class="col-md-4 m-b-5 pull-right">
            {!!Form::open()->method('GET')!!}
            <div class="input-group">
              {!!Form::text('search')->type('search')->class('form-control')->placeholder('Search for...')->raw()!!}
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Search</button>
              </span>
            </div>
            {!! Form::close()!!}
        </div>
    </div>   
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>{!! trans('faq::category.label.name')!!}</th>
        <th>{!! trans('faq::category.label.status')!!}</th>
                    <th width="150">{!! trans('faq::category.label.status')!!}</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>
                    <td><span class="label status-{{ $category->status }}"> {{ $category->status }} </span></td>
                    <td>
                        <a href="{{ trans_url('/user') }}/faq/category/{!! $category->getRouteKey() !!}"> View </a>
                        <a href="{{ trans_url('/user') }}/faq/category/{!! $category->getRouteKey() !!}/edit"> Edit </a>
                        <a data-action="DELETE" 
                            data-href="{{ trans_url('/user') }}/faq/category/{!! $category->getRouteKey() !!}" 
                            href="trans_url('/user')/faq/category/{!! $category->getRouteKey() !!}"> 
                            Delete 
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
</div>
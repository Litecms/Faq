       <section class="faq">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <h1 class="main-title">
                            <small>Your Questions</small>
                            FAQ <span></span>
                        </h1>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs text-right">
                        <img src="{!!URL::to('img/faq-side-icon.png')!!}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      @forelse($categories as $keys=> $category)
                        <h2 class="faq-category-title">{!!ucfirst($category['name'])!!}</h2>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @forelse($category->faq as $key=>$faq)
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="#{!!$faq['slug']!!}_{!!$faq['id']!!}">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{!!$faq['slug']!!}_{!!$faq['id']!!}" aria-expanded="true" aria-controls="collapseOne">
                                  <i class="ion ion-help-circled"></i> : {!! ucfirst($faq['question']) !!}
                                  <i class="fa fa-plus pull-right"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="{!!$faq['slug']!!}_{!!$faq['id']!!}" class="panel-collapse collapse @if($key==0 && $keys==0) in @endif" role="tabpanel" aria-labelledby="#{!!$faq['slug']!!}_{!!$faq['id']!!}">
                              <div class="panel-body">
                               {!! ucfirst($faq['answer']) !!}
                              </div>
                            </div>
                          </div>
                          @empty
                          @endif

                        </div>
                         @empty
                          @endif
                    </div>
                </div>
            </div>
        </section>

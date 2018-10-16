@include('faq::faq.partial.header')
<section class="content">
                <div class="container">
                  @forelse(Faq::selectCategories() as $key => $category)
                    <div class="faq-wrapper">
                        <h2>{{@$category}}</h2>
                       
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @forelse(Faq::selectQuestions(@$key) as $qst => $faq)
                              <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                          <a role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">{{$faq->question}}</a>
                                      </h4>

                                  </div>
                                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                          <p>{{$faq->answer}}</p>
                                      </div>
                                  </div>
                              </div>
                            @empty
                            @endif
                      </div>
                    </div>
                  @empty
                  @endif
                </div>

            </section>

            

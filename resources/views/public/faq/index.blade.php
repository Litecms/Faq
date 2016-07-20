<section class="contact">
    <div class="contact-details">
        <div class="container " style="margin-top:30px;">
               <!-- Content Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion">
                        @forelse($faqs as $faq)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" class="question-info" data-toggle="collapse" data-parent="#accordion" href="#{!! $faq['id'] !!}"> {!! $faq['question'] !!}<i class="fa fa-plus pull-right"></i></a>
                                    </h4>
                                </div>
                                <div id="{!! $faq['id'] !!}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                      {!! $faq['answer'] !!}
                                    </div>
                                </div>
                            </div>
                          @empty
                            <p>No faqs</p>
                        @endif

                        </div>
                   </div>
              </div>
        </div>
    </div>
</section>

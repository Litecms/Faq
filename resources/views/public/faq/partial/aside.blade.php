<div class="sidebar">
     <div class="widget category">
        <h3 class="border-bottom">Category</h3>
        <ul class="mt20">
            <li><a href="{{trans_url('faqs')}}"><i style="color: #C93756;" class="fa fa-th-large"></i>All Faqs</a></li>   
        </ul>
    </div>
    <div class="widget category">
        <h3 class="border-bottom">Or pick a Category</h3>
        <ul class="mt20">
          @foreach($faqs as $faq)
            <li><a href="#"><i style="color: #4BCC88;" class="fa fa-circle-o"></i>{{@$faq['category->name']}}</a></li>
          @endforeach
           
        </ul>
    </div>

   
</div>
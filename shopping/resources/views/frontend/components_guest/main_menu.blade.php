  <div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('home.index') }}" class="active">Home</a></li>
         @foreach ($categoryParents as $categoryParent)
            <li class="dropdown"><a href="#">{{ $categoryParent->name }}<i class="fa fa-angle-down"></i></a>
                 {{-- // child menu recusive  --}}
                 @include('frontend.components_guest.child_menu', ['categoryParent'=> $categoryParent]) 
             </li>  
         @endforeach  
        
         <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                <li class="dropdown"><a href="blog.html">Blog List</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
            </ul>
        </li> 
        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>   

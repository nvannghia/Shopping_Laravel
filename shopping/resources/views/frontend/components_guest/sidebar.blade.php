<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                @foreach ($categoryParents as $cateParent)
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cateParent->id }}">
                                <span class="badge pull-right">
                                    @if (!$cateParent->categoryChildren->isEmpty())
                                        <i class="fa fa-plus"></i>
                                    @endif
                                </span>
                                {{ $cateParent->name }}
                            </a>
                        </h4>
                    </div>
                    
                    
                    <div id="{{ $cateParent->id }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach ($cateParent->categoryChildren as $cateChild)
                                    <li>
                                        <a href="{{ route('category.product',
                                        [
                                            'slug'=> $cateChild->slug,
                                            'id' => $cateChild->id
                                        ]) }}"
                                        >
                                            {{ $cateChild->name }} 
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div><!--/category-products-->
    
    
    </div>
</div>
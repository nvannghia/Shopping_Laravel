<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categoryParents as $keyCate => $cateParent)
                <li class="{{ $keyCate == 0 ? 'active' : '' }}">
                    <a href="#category_tab_{{ $cateParent->id }}" data-toggle="tab">
                        {{ $cateParent->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categoryParents as $keyCateItem => $cateParentItem)
            <div class="tab-pane fade {{ $keyCateItem == 0 ? 'active in' : '' }}" id="category_tab_{{ $cateParentItem->id }}" >
                @foreach ($cateParentItem->categoryChildren as $cateChild)
                    @foreach ($cateChild->products->take(4) as $productItem)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ $productItem->feature_image_path }} " alt="" />
                                        <h2>{{ number_format($productItem->price) }} <i class="fa-solid fa-dong-sign"></i></h2>
                                        <p style=" height: 20px;overflow: hidden; text-overflow: ellipsis;">{{ $productItem->name }}</p>
                                        <a 
                                            href="" 
                                            data-url="{{ route('product.add-to-cart',['id'=>$productItem->id ]) }}"
                                            class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        @endforeach
    </div>
</div><!--/category-tab-->
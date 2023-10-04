@if (!$categoryParent->categoryChildren->isEmpty())
    <ul role="menu" class="sub-menu">
        @foreach ( $categoryParent->categoryChildren as $categoryChild)
            <li>
                <a href="{{ route('category.product',['slug'=>$categoryChild->slug,'id'=>$categoryChild->id]) }}">
                    {{ $categoryChild->name }}
                </a>
                @if(!$categoryChild->categoryChildren->isEmpty())
                    @include('frontend.components_guest.child_menu', ['categoryParent' => $categoryChild])
                @endif
            </li>
        @endforeach
    </ul>
@endif
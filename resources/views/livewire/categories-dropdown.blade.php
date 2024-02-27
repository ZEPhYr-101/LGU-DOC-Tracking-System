@php
    $current_route = request()->route()->getName();
    $current_category_id = request()->query('id');
@endphp

<li class="nav-item {{ $current_route === 'admin.documents' ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $current_route === 'admin.documents' ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Documents
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- Loop through categories -->
        @foreach ($categories as $category)
            @php
                $isActive = $current_route === 'admin.documents' && $current_category_id == $category->id;
            @endphp
            <li class="nav-item">
                <a href="{{ route('admin.documents', ['id' => $category->id]) }}"
                    class="nav-link {{ $isActive ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $category->category_name }}</p>
                </a>
            </li>
        @endforeach
    </ul>
</li>

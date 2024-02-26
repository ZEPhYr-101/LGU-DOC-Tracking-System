<ul class="nav nav-treeview" wire:ignore id="menu">
    @foreach ($categories as $category)
        <li class="nav-item">
            <a href="{{ route('admin.documents', $category->id) }}"
                class="nav-link {{ $currentRoute == 'admin.documents' && request()->category == $category->id ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ $category->category_name }}</p>
            </a>
        </li>
    @endforeach
</ul>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuLinks = document.querySelectorAll('#menu .nav-link');

        // Retrieve the ID of the last active link from localStorage
        const lastActiveLinkId = localStorage.getItem('lastActiveLinkId');

        // Add active class to the last active link
        if (lastActiveLinkId) {
            const lastActiveLink = document.querySelector(`#menu .nav-link[data-category-id="${lastActiveLinkId}"]`);
            if (lastActiveLink) {
                lastActiveLink.classList.add('active');
            }
        }

        // Add click event listener to each link
        menuLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                const categoryId = this.getAttribute('data-category-id');

                // If the link is already active, prevent menu from closing
                if (this.classList.contains('active')) {
                    event.stopPropagation();
                } else {
                    // Remove active class from all links
                    menuLinks.forEach(link => {
                        link.classList.remove('active');
                    });

                    // Add active class to the clicked link
                    this.classList.add('active');

                    // Store the ID of the active link in localStorage
                    localStorage.setItem('lastActiveLinkId', categoryId);
                }
            });
        });

        // Prevent menu from closing if there is an active link inside the dropdown
        const dropdownLinks = document.querySelectorAll('#menu .nav-item .nav-link');
        dropdownLinks.forEach(dropdownLink => {
            dropdownLink.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    });
</script>

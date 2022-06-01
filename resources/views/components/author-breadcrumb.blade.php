<footer class="flex justify-between items-center mt-8">
    <div class="flex items-center text-sm">
        <img src="/images/lary-avatar.svg" alt="Lary avatar">
        <div class="ml-3">
            <a href="?author={{ $author->username }}&{{ http_build_query(request()->except(['author', 'page'])) }}">
                <h5 class="font-bold">{{ $author->name }}</h5>
            </a>
        </div>
    </div>

    <div class="hidden lg:block">
        <a href="?author={{ $author->username }}&{{ http_build_query(request()->except(['author', 'page'])) }}"
           class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
        >Read More</a>
    </div>
</footer>

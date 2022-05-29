<select
    style="width: 200px;"
    id="categoriesDropdown"
    onchange="categoriesDropdownOnChange()"
    class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
    <option value="/">Categories</option>
    @foreach($categories as $category)
    <x-dropdown-item
        :label="$category->name"
        :value="$category->slug"
        :selected="isset($currentCategory) && $currentCategory->is($category)" />
    @endforeach
</select>
<script>
    function categoriesDropdownOnChange() {
        const categorySlug = document.getElementById('categoriesDropdown').value;

        if(categorySlug === '/') {
            location.href = '/';
            return;
        }

        location.href = '/posts-category/' + categorySlug;
    }
</script>

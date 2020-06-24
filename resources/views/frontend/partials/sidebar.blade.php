<h4 class="category-ul-h4">Category</h4>
<ul class="category-ul">
    @foreach ($categories as $category)
    <li><a href="">{{ $category->name }}</a></li>
    @endforeach
</ul>




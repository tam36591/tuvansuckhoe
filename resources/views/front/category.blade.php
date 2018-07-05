<li href="#" class="list-group-item menu1 active">
    Menu
</li>
@foreach($categories as $category)
<li href="#" class="list-group-item menu1">
    <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
</li>
@endforeach
@canany(['view_books','delete_books','create_books','edit_books'])
<li class="{{ Request::is('books*') ? 'active' : '' }}">
    <a href="{{ route('books.index') }}"><i class="fa fa-edit"></i><span>Books</span></a>
</li>
@endcan
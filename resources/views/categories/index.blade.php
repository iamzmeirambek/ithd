<?php

function renderCategories($categories): string
{
    $html = '<ol class="dd-list">';
    foreach ($categories as $category) {
        $html .= '<li class="dd-item" data-id="' . $category->id . '">';
        $html .= '<div class="dd-handle">' . $category->name . '</div>';
        $html .= '<form method="POST" action="' . route('categories.destroy', $category) . '" style="display:inline;">
            ' . csrf_field() . method_field('DELETE') . '
            <button>🗑️</button>
        </form>';
        if ($category->children->count()) {
            $html .= renderCategories($category->children);
        }
        $html .= '</li>';
    }
    $html .= '</ol>';
    return $html;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Категории</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nestable2@1.6.0/jquery.nestable.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<h1>Категории</h1>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Новая категория" required>
    <button type="submit">Добавить</button>
</form>

<div class="dd" id="nestable">
    {!! renderCategories($categories) !!}
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/nestable2@1.6.0/jquery.nestable.min.js"></script>
<script>
    $('#nestable').nestable().on('change', function () {
        const data = $('#nestable').nestable('serialize');
        $.ajax({
            url: '{{ route('categories.reorder') }}',
            method: 'POST',
            data: {
                categories: data,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                console.log('Сохранено');
            }
        });
    });
</script>
</body>
</html>




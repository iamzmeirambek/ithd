<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getRootCategoriesOrdered()
    {
        return Category::whereNull('parent_id')
            ->orderBy('order')
            ->get();
    }
}

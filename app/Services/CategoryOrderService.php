<?php

namespace App\Services;

use App\Models\Category;

class CategoryOrderService
{
    public function save(array $categories, ?int $parentId = null): void
    {
        foreach ($categories as $index => $item) {
            $category = Category::findOrFail($item['id']);
            $category->update([
                'parent_id' => $parentId,
                'order' => $index,
            ]);

            if (!empty($item['children'])) {
                $this->save($item['children'], $item['id']);
            }
        }
    }
}

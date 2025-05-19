<?php

namespace app\CommandBus\Handlers\Category;

use App\CommandBus\Handlers\BaseHandler;
use App\Models\Category;

class ReorderCategoryHandler extends BaseHandler
{
    protected function handleCommand($command): void
    {
        $this->save($command->categories);
    }

    private function save(array $categories, ?int $parentId = null): void
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

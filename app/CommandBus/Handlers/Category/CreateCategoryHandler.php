<?php

namespace app\CommandBus\Handlers\Category;
use App\CommandBus\Handlers\BaseHandler;
use App\Models\Category;

class CreateCategoryHandler extends BaseHandler
{
    protected function handleCommand($command): void
    {
        Category::create([
            'name' => $command->name,
            'parent_id' => $command->parent_id,
            'order' => $command->order,
        ]);
    }
}

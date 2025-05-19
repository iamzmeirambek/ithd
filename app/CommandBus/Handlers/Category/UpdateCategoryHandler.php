<?php

namespace app\CommandBus\Handlers\Category;

use App\CommandBus\Handlers\BaseHandler;
use App\Models\Category;

class UpdateCategoryHandler extends BaseHandler
{
    protected function handleCommand($command): void
    {
        $category = Category::findOrFail($command->id);

        $category->updateOrFail([
            'name' => $command->name
        ]);
    }
}

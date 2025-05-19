<?php

namespace app\CommandBus\Handlers\Category;

use App\CommandBus\Handlers\BaseHandler;
use App\Models\Category;

class DestroyCategoryHandler extends BaseHandler
{

    protected function handleCommand($command): void
    {
        $category = Category::findOrFail($command->id);
        $category->deleteOrFail();
    }
}

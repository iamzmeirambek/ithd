<?php

namespace app\CommandBus\Commands\Category;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateCategoryCommand extends DataTransferObject
{
    public int $id;

    public string $name;
}

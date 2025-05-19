<?php

namespace App\CommandBus\Commands\Category;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CreateCategoryCommand extends DataTransferObject
{
    public string $name;
    public int|null $parent_id;
    public int $order;

    /**
     * @throws UnknownProperties
     */
    public function __construct(...$args) {
        $_args = collect($args[0]);

        if (!$_args->has('order') || $_args->get('order') === null) {
            $args[0]['order'] = 0;
        }

        parent::__construct(...$args);
    }
}

<?php

namespace App\Http\Controllers;

use App\CommandBus\Commands\Category\CreateCategoryCommand;
use App\CommandBus\Commands\Category\DestroyCategoryCommand;
use App\CommandBus\Commands\Category\UpdateCategoryCommand;
use App\CommandBus\Handlers\Category\CreateCategoryHandler;
use App\CommandBus\Handlers\Category\DestroyCategoryHandler;
use App\CommandBus\Handlers\Category\UpdateCategoryHandler;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryOrderService;
use App\Services\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CategoryController extends Controller
{
    public function index(CategoryService $categoryService): Factory|View|Application
    {
        return view('categories.index', [
            'categories' => $categoryService->getRootCategoriesOrdered()
        ]);
    }

    /**
     * @throws UnknownProperties
     */
    public function store(CategoryRequest $request, CreateCategoryHandler $handler): RedirectResponse
    {
        $command = new CreateCategoryCommand($request->validated());
        $handler->handle($command);
        return back();
    }

    /**
     * @throws UnknownProperties
     */
    public function update(CategoryRequest $request, int $categoryId, UpdateCategoryHandler $handler): RedirectResponse
    {
        $command = new UpdateCategoryCommand([
            'id' => $categoryId,
            ...$request->validated()
        ]);
        $handler->handle($command);
        return back();
    }

    /**
     * @throws UnknownProperties
     */
    public function destroy(int $categoryId, DestroyCategoryHandler $handler): RedirectResponse
    {
        $command = new DestroyCategoryCommand(id: $categoryId);
        $handler->handle($command);
        return back();
    }


    public function reorder(Request $request, CategoryOrderService $orderService): JsonResponse
    {
        $orderService->save($request->input('categories'));
        return response()->json(['status' => 'ok']);
    }

}


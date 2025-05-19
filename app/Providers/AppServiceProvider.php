<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


    function renderCategories($categories)
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

}

<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\CategoryService;

class Menu extends Component
{
    public $categories = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categories = $categoryService->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // $this->categories = [
        //         [
        //            'name' => 'Men',
        //            'slug' => 'men',
        //         ],
        //         [
        //            'name' => 'WOMENT',
        //            'slug' => 'woment',
        //         ],
        //         [
        //            'name' => 'Kids',
        //            'slug' => 'kids',
        //         ],
        //         [
        //            'name' => 'Cong so',
        //            'slug' => 'Cong so',
        //         ],
        //         [
        //            'name' => 'Tai nha',
        //            'slug' => 'Tai nha',
        //         ],
        // ];
        return view('components.menu');
    }
}

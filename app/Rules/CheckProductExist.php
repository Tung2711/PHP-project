<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CheckProductExist implements Rule
{
    protected $categoryId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($categoryId)
    {   
        $this->categoryId= $categoryId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       return ! DB::table('category_product')->where(['category_id' => $this->categoryId])->exist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Danh muc dang co san pham nen khong the xoa';
    }
}

<?php

namespace App\Support\Http;

use Illuminate\Foundation\Http\FormRequest as Request;

/**
 * Class Request.
 */
class FormRequest extends Request
{
    public function authorize()
    {
        return true;
    }
}

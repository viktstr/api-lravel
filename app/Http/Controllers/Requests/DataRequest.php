<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DataRequest
 * @package App\Http\Requests
 */
class DataRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'from' => 'nullable|numeric',
            'to' => 'nullable|numeric',
        ];
    }
}
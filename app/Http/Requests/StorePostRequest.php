<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Si el post existe (es update), la imagen es opcional, si no (es store), es requerida
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

        return [
            'title'       => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required',
            'image'       => ($isUpdate ? 'nullable' : 'required') . '|image|max:2048',
        ];
    }
}

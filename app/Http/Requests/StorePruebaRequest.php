<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePruebaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'documento' => ['required', 'file'],
        ];
    }
    public function messages()
    {
        return [
            'documento.required' => 'Debe seleccionar un archivo',
            'documento.file' => 'El archivo seleccionado debe ser un documento CSV',
        ];
    }
}

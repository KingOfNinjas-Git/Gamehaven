<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** The checks for adding and editing a game (the cover is only required when adding one). */
class GameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // the admin routes are already behind the "auth" and IsAdmin middleware
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'cover_image' => [$this->isMethod('post') ? 'required' : 'nullable', 'image'],
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'category' => 'nullable|string|max:255',
        ];
    }
}

<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStockMovementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'type' => ['required', 'string', Rule::in(['in', 'out', 'adjustment'])],
            'qty' => ['required', 'integer', 'min:1'],
            'happened_at' => ['nullable', 'date'],
            'note' => ['nullable', 'string', 'max:500'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'happened_at' => $this->input('happened_at', now()->toDateTimeString()),
        ]);
    }
}

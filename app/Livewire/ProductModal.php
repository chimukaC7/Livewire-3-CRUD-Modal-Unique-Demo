<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class ProductModal extends ModalComponent
{
    public Product $product;

    public function rules(): array
    {
        return [
            'product.name' => [
                'required',
                Rule::unique('products', 'name')->ignore($this->product),
            ],
            'product.description' => [
                'required'
            ],
        ];
    }

    public function mount(Product $product): void
    {
        $this->product = $product ?? new Product();
    }

    public function save(): void
    {
        $this->validate();

        $this->product->save();

        $this->reset();


        $this->closeModal();

        $this->dispatch('refresh-list');
    }

    public function render(): View
    {
        return view('livewire.product-modal');
    }
}

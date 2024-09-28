<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Form;
use Illuminate\Validation\Rule;

class ProductForm extends Form
{




    public function validationAttributes(): array
    {
        return [
            'name' => 'name',
            'description' => 'description',
        ];
    }
}

<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form{
    #[Rule('required|min:5')]
    public $title,$body;
    #[Rule('required')]
    public $category_id,$church_id;
    public $published,$slug,$id;
    public $user_id;
}

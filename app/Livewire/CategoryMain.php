<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryMain extends Component
{
    public CategoryForm $form;
    public $isOpen=false;
    public $search;

    public function render()
    {
        $categories=Category::where('name','LIKE','%'. $this->search . '%')->paginate();
        return view('livewire.category-main',compact('categories'));
    }

    #[On('delItem')]
    public function destroy(  Category $category){
        //dd($post);
        $category->delete();
    }

    public function create(){
        $this->isOpen=true;
        $this->form->reset();
        $this->resetValidation();

    }

    public function store() {
        //dd($this->form->all());
        $this->validate();
        $this->form->name = str_replace(" ", "-", $this->form->name);

        if($this->form->id == null) {
            Category::create($this->form->all());
        } else {
            $category = Category::find($this->form->id);
            $category->update($this->form->all());
        }

        $this->isOpen = false;
        $this->dispatch('sweetalert', ['message' => 'Registro creado']);
    }

    public function edit(Category $category) {
        $this->isOpen = true;
        $this->form->fill($category);
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Category;
use App\Models\Church;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class PostMain extends Component{
    public PostForm $form;
    public $isOpen=false;
    public $search;

    public function render(){
        $posts=Post::where('title','LIKE','%'.$this->search.'%')->latest('id')->paginate();
        $categories=Category::all();
        $churchs=Church::all();
        return view('livewire.post-main',compact('posts','categories','churchs'));
    }

    public function create(){
        $this->isOpen=true;
        $this->form->reset();
        $this->resetValidation();
    }

    public function store(){
        //dd($this->form->all());
        $this->validate();
        $this->form->slug=str_replace(" ","-",$this->form->title);
        $this->form->user_id=Auth::user()->id;
        if($this->form->id==null){
            Post::create($this->form->all());
        }else{
            $post=Post::find($this->form->id);
            $post->update($this->form->all());
        }
        $this->isOpen=false;
        $this->dispatch('sweetalert',message:'Registro creado');
    }

    public function edit(Post $post){
        $this->isOpen=true;
        $post->published=$post->published?true:false;
        $this->form->fill($post);
    }

    #[On('delItem')]
    public function destroy(Post $post){
        //dd($post);
        $post->delete();
    }
}

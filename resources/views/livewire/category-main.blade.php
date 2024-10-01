<div class="py-5">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Plantel
        </h2>
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 mb-2">
            <x-input placeholder="Buscar registro" wire:model.live="search"/>
            <x-button wire:click="create()">Nuevo</x-button>
                @if($isOpen)
                    @include('livewire.category-create')
                @endif
        </div>
        <!--Tabla lista de items   -->
        <div class="overflow-hidden bg-white border-b border-gray-200 shadow sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
              <thead class="text-white bg-indigo-500">
                <tr class="text-xs font-bold text-left uppercase">
                  <td scope="col" class="px-6 py-3">ID</td>
                  <td scope="col" class="px-6 py-3">Nombre</td>
                  <td scope="col" class="px-6 py-3 text-center">Opciones</td>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($categories as $item)
                <tr class="text-sm font-medium text-gray-900">
                  <td class="px-6 py-4">
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-indigo-500 rounded-full">
                      {{$item->id}}
                    </span>
                  </td>
                  <td class="px-6 py-4">{{$item->name}}</td>
                  <td class="flex gap-1 px-6 py-4">
                    <button wire:click="edit({{$item}})" class="w-8 h-8 text-xl text-white rounded-full bg-cyan-800 hover:bg-cyan-500"><i class="fa-solid fa-file-pen"></i></button>
                    <button wire:click="$dispatch('deleteItem',{{$item}})" class="w-8 h-8 text-xl text-white bg-red-800 rounded-full hover:bg-red-500"><i class="fa-solid fa-trash-can"></i></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @if(!$categories->count())
            <p>No existe ningun registro conincidente</p>
        @endif
        @if($categories->hasPages())
        <div class="px-6 py-3">
            {{$categories->links()}}
        </div>
        @endif

        </div>
      </div>
      @push('js')
        <script>
            Livewire.on('deleteItem', (id) => {
                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    //alert(id);
                    Livewire.dispatch('delItem',{category:id});
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
                })
            });
        </script>
      @endpush
</div>

<div>
    <div x-data="{ open:false }">
        <button @click="open = !open"
                class="text-lg font-semibold text-turquoise-dark px-3 py-2 flex justify-center items-center focus:outline-none" >
            {{__('Categorias')}}
            <i class="ml-3" x-bind:class="{'fas fa-caret-up':open,'fas fa-caret-down':!open}"></i>
        </button>
        <div
            :hidden="!open"
            class="absolute overflow-hidden rounded-bl-md rounded-br-md border-l border-b border-r border-gray-300 mt-3 z-40 bg-white w-96">
            <div class="grid grid-cols-2 gap-1">
                @foreach($categories as $category)
                    <a class="p-1 uppercase font-bold text-xs" href="{{ route('category.show',['category' => $category->id]) }}"> {{ __($category->name) }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

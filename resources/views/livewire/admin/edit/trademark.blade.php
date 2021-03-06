<div>
    @can('Editar Inventario')
    <div class="text-blue-500 hover:text-blue-700 w-4 mr-2 transform hover:scale-110"
        wire:click="edit_componente()">
        <i class="fas fa-edit"></i>
    </div>
    @endcan
{{--Ventana Modal de marca--}}
    <x-modal.main wire:model="is_show">
		<x-slot name="title">  
         Editar Marca
        </x-slot>

		<x-slot name="content">
            
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                    <dt class="text-sm font-medium text-gray-500">
                        <x-adminver.label for="nombre">
                            Nombre de la marca:
                        </x-adminver.label>
                    </dt>

                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <x-adminver.input type="text" id="nombre" wire:model="trademark.name"/>
                        <x-forms.error for="trademark.name"/>
                    </dd>

                </div>
            </dl>
            
            
		</x-slot>

        <x-slot name="footer">
            <x-buttons.red wire:click="cancelar()">
                {{__('Cancelar')}}
            </x-buttons.red>
            <x-buttons.cian wire:click="save_changes()">
                <i class ="far fa-save mr-3"></i>
                {{__('Guardar')}}
            </x-buttons.cian>	
	    </x-slot>
	    

	</x-modal.main>
    {{--Fin de la ventana modal--}}
</div>

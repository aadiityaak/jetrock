<div class="container mx-auto mt-8">
    <form wire:submit.prevent="store" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <x-input-basic id="name" name="name" label="Role Name" model="name" :error="$errors->first('name')" />
        <x-input-basic id="description" name="description" label="Description" model="description" :error="$errors->first('description')" />
        <div class="flex items-center justify-between">
            <x-button-basic @click="showModal = false" type="submit" color="primary">Simpan</x-button-basic>
        </div>
    </form>
</div>
<div>
    <form wire:submit.prevent="update">
        <x-input-basic id="name" name="name" label="Nama" model="name" :error="$errors->first('name')" />
        <x-input-basic id="email" name="email" label="Email" model="email" :error="$errors->first('email')" />
        <x-input-basic id="alamat" name="alamat" label="Alamat" model="alamat" type="textarea" :error="$errors->first('alamat')" />
        <x-input-basic id="no_hp" name="no_hp" label="No. HP" model="no_hp" :error="$errors->first('no_hp')" />
        <x-input-basic id="id_karyawan" name="id_karyawan" label="ID Karyawan" model="id_karyawan" :error="$errors->first('id_karyawan')" />
        <x-input-basic id="role" name="role" label="Role" model="role" type="select" :error="$errors->first('role')" >
            <option value="">Pilih Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $role->id == $user->role ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </x-input-basic>
        <div class="flex items-center justify-between">
            <x-a-button href="{{ route('users.index') }}" type="secondary">Kembali</x-a-button>
            <x-button-basic type="submit" color="primary">Simpan</x-button-basic>
        </div>
    </form>
</div>

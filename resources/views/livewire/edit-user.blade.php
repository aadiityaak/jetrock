<div>
    <button wire:click="update">Simpan Perubahan</button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Edit User -->
                    <form>
                        <!-- Form fields (nama, alamat, role) -->
                        <input wire:model="name" type="text" class="form-control" placeholder="Nama">
                        <input wire:model="alamat" type="text" class="form-control" placeholder="Alamat">
                        <input wire:model="role" type="text" class="form-control" placeholder="Role">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button wire:click="update" type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
</div>
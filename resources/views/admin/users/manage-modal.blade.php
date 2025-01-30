<!-- resources/views/admin/users/manage-modal.blade.php -->
<div x-data="{
    formData: {
        name: '',
        email: '',
        role: 'user'
    },
    error: null,
    isOwner() { return this.user?.role === 'owner' },
    isCurrentUserOwner: {{ auth()->user()->role === 'owner' ? 'true' : 'false' }},
    canModify() {
        return this.isCurrentUserOwner || (!this.isOwner() && {{ auth()->user()->role === 'admin' ? 'true' : 'false' }})
    }
}">
    <x-button @click="$dispatch('open-modal', 'userModal')">
        <i class="fas fa-user-plus mr-2"></i>
        Add New User
    </x-button>

    <x-modal name="userModal">
        <x-modal.header title="Manage User" />

        <form @submit.prevent="handleSubmit">
            <x-modal.content class="space-y-4">
                <x-alert x-show="error" type="error" x-text="error" />

                <x-form.input
                    label="Name"
                    x-model="formData.name"
                    :disabled="!canModify()"
                    required
                />

                <x-form.input
                    type="email"
                    label="Email"
                    x-model="formData.email"
                    :disabled="!canModify()"
                    required
                />

                <x-form.select
                    label="Role"
                    x-model="formData.role"
                    :disabled="!canModify() || isOwner()"
                >
                    <option value="user">User</option>
                    <option value="seller">Seller</option>
                    <option value="admin">Admin</option>
                    <template x-if="isCurrentUserOwner">
                        <option value="owner">Owner</option>
                    </template>
                </x-form.select>

                <x-alert
                    x-show="isOwner() && !isCurrentUserOwner"
                    type="warning"
                >
                    Only the owner can modify owner accounts
                </x-alert>
            </x-modal.content>

            <x-modal.footer>
                <x-button
                    variant="secondary"
                    @click="$dispatch('close-modal', 'userModal')"
                >
                    Cancel
                </x-button>

                <x-button
                    x-show="canModify()"
                    type="submit"
                >
                    Save Changes
                </x-button>
            </x-modal.footer>
        </form>
    </x-modal>
</div>

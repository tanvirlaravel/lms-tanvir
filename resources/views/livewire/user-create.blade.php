<form wire:submit.prevent="formSubmit">
<div class="flex -mx-4 mb-4">
    <div class="flex-1 px-4">
        <label for="name" class="lms-label">Name</label>
        <input type="text" class="lms-input" wire:model.lazy="name">
        @error('name')
        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="flex-1 px-4">
        <label for="name" class="lms-label">Eamil</label>
        <input type="email" class="lms-input" wire:model.lazy="email">
        @error('email')
        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="flex-1 px-4">
        <label for="password" class="lms-label">password</label>
        <input type="password" class="lms-input" wire:model.lazy="password">
        @error('password')
        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

        <div class="mb-4">
            <label for="role" class="lms-label">Role</label>
            <select wire:model.lazy="role"  id="role" class="lms-input">
                <option value="">Select role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role')
            <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

    @include('components.wire-loading-btn')

</form>

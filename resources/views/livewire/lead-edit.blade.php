<div>
    <form wire:submit.prevent="submitForm" class="mb-6">
        <div class="flex mb-4 -mx-4">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
                <input type="text" class="lms-input" wire:model="name">
                @error('name')
                <div class="text-read-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex-1 px-4">
                <label for="" class="lms-label">Email</label>
                <input type="text" class="lms-input" wire:model="email">
                @error('email')
                <div class="text-read-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex-1 px-4">
                <label for="" class="lms-label">Phone</label>
                <input type="text" class="lms-input" wire:model="phone">
                @error('phone')
                <div class="text-read-400">{{ $message }}</div>
                @enderror
            </div>
        </div>


        @include('components.wire-loading-btn')
           </form>

    <h3 class="text-lg font-bold">Notes</h3>
    @foreach($notes as $note)
        <p>{{ $note->description }}</p>
    @endforeach

    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model.lazy="note" class="lms-input" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form>
</div>

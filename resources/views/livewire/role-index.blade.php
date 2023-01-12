<div>
    <div>
        <table class="w-full table-auto">
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Permission</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td class="border px-4 py-2">{{ $role->name }}</td>
                    <td class="border px-4 py-2">
                        @foreach($role->permissions as $permission)
                            <span class="px-2 py-1 bg-blue-900 text-white rounded text-sm">{{ $permission->name }}</span>
                        @endforeach
                    </td>

                    <td class="border px-4 py-2">
                        <div class="flex items-center justify-center">
                            <a href="{{ route('role.edit', $role->id) }}">@include('components/icons/edit')</a>

                            <form wire:submit.prevent="roleDelete({{ $role->id }})"  onsubmit="return confirm('Are you sure ?');">
                                <button type="submit">
                                    @include('components/icons/trash')
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </table>

    </div>

</div>

<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Phone</th>
            <th class="border px-4 py-2">Register</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
        @foreach($leads as $lead)
            <tr>
                <td class="border px-4 py-2">{{ $lead->name }}</td>
                <td class="border px-4 py-2">{{ $lead->email }}</td>
                <td class="border px-4 py-2">{{ $lead->phone }}</td>
                <td class="border px-4 py-2">{{ date('F j, Y', strtotime($lead->created_at)) }}</td>
                <td class="border px-4 py-2">
                   <div class="flex items-center justify-center">
                       <a href="{{ route('lead.edit', $lead->id) }}">@include('components/icons/edit')</a>
                       <a class="px-2" href="{{ route('lead.show', $lead->id) }}">@include('components/icons/eye')</a>
                       <form wire:submit.prevent="leadDelete({{ $lead->id }})"  onsubmit="return confirm('Are you sure ?');">
                            <button type="submit">
                                @include('components/icons/trash')
                            </button>
                       </form>
                   </div>
                </td>

            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $leads->links() }}
    </div>
</div>

<div class="p-6 space-y-4">
    <h2 class="text-2xl font-bold">Appointment Status</h2>

    <table class="w-full border-collapse bg-white shadow-lg">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-4">Type</th>
                <th class="p-4">Name</th>
                <th class="p-4">Date</th>
                <th class="p-4">Time</th>
                <th class="p-4">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($appointments as $appointment)
                <tr class="border-t">
                    <td class="p-4">{{ $appointment->type }}</td>

                    @if($appointment->type == 'Baptism')
                        <td class="p-4">{{ $appointment->child_name }}</td>
                        <td class="p-4">{{ $appointment->preferred_baptism_date }}</td>
                        <td class="p-4">{{ $appointment->time_schedule }}</td>
                    @elseif($appointment->type == 'Wedding')
                        <td class="p-4">{{ $appointment->bride_name }} &amp; {{ $appointment->groom_name }}</td>
                        <td class="p-4">{{ $appointment->wedding_date }}</td>
                        <td class="p-4">{{ $appointment->time_schedule }}</td>
                    @else
                        <td class="p-4">{{ $appointment->name }}</td>
                        <td class="p-4">{{ $appointment->funeral_date }}</td>
                        <td class="p-4">{{ $appointment->time_schedule }}</td>
                    @endif

                    <td class="p-4">{{ ucfirst($appointment->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        No appointments found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

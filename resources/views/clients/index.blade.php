<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Clients') }}
            </h2>
            <div class="flex flex-wrap gap-2 w-full sm:w-auto justify-end">
                <button @if (!request()->query()) disabled @endif
                    onclick="if(window.location.search.length > 0) { window.location.href='{{ route('clients.index') }}'; }"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-white rounded-md
                {{ !request()->query() ? 'opacity-50 cursor-not-allowed' : '' }}">
                    Clear Filter
                </button>
                <button onclick="toggleFilterModal()"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 text-white rounded-md">
                    Filter
                </button>
                <a href="{{ route('clients.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-white rounded-md">
                    Add New Client
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Business Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Owner</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Contact</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Type</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Website</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Social Accounts</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Follow-up</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($data as $client)
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $client->business_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                        {{ $client->business_owner ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                        {{ $client->email ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                        {{ $client->contact ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                        {{ $client->type ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        @if ($client->website_exists && $client->website)
                                            <a href="{{ $client->website }}" target="_blank"
                                                class="text-blue-600 hover:underline dark:text-blue-400">Yes</a>
                                        @else
                                            <span class="text-red-500">No</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        @if ($client->social_accounts_exists)
                                            <span class="text-green-600 dark:text-green-400">Yes</span>
                                        @else
                                            <span class="text-red-500">No</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                        {{ $client->follow_up_dates }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @php
                                            // $statusColors = [
                                            //     0 => 'text-gray-500',
                                            //     1 => 'text-yellow-500',
                                            //     2 => 'text-green-500',
                                            //     3 => 'text-red-500',
                                            // ];
                                            $statusColors = [
                                                'text-gray-500',
                                                'text-blue-500',
                                                'text-orange-500',
                                                'text-green-500',
                                                'text-red-500',
                                            ];
                                        @endphp
                                        <span
                                            class="{{ $statusColors[$client->status ? $client->status - 1 : 0] ?? 'text-gray-500' }}">
                                            {{ ['Pending', 'In Progress', 'Waiting Client', 'Completed', 'Cancelled'][$client->status ? $client->status - 1 : 0] ?? 'Unknown' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <a href="{{ route('clients.show', $client->id) }}"
                                            class="text-green-600 hover:text-green-900 dark:hover:text-green-400">
                                            View
                                        </a> &nbsp;
                                        <a href="{{ route('clients.edit', $client->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 dark:hover:text-indigo-400">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No
                                        clients found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Filter Modal -->
        <div id="filterModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md mx-auto p-6">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Filter Clients</h2>

                <form method="GET" action="{{ route('clients.index') }}" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Business Name</label>
                        <input type="text" name="business_name" value="{{ request('business_name') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Owner</label>
                        <input type="text" name="business_owner" value="{{ request('business_owner') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                        <input type="text" name="type" value="{{ request('type') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Follow-up Date</label>
                        <input type="date" name="follow_up_dates"
                            value="{{ old('follow_up_dates') ?? today()->format('Y-m-d') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select name="status"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                            <option value="">-- Any --</option>
                            <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Pending</option>
                            <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>In Progress</option>
                            <option value="3" {{ request('status') == 3 ? 'selected' : '' }}>Waiting Client
                            </option>
                            <option value="4" {{ request('status') == 4 ? 'selected' : '' }}>Completed</option>
                            <option value="5" {{ request('status') == 5 ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="toggleFilterModal()"
                            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                            Apply
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleFilterModal() {
            document.getElementById('filterModal').classList.toggle('hidden');
        }
    </script>
</x-app-layout>

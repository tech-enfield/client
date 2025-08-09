<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Clients') }}
            </h2>
            <button @click="openCreateModal()"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-white rounded-md">
                Add New Client
            </button>
        </div>
    </x-slot>

    <div x-data="clientManager()" x-cloak>
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
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                            {{ $client->business_owner ?? '-' }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                            {{ $client->email ?? '-' }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                            {{ $client->contact ?? '-' }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
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
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                            {{ $client->follow_up_dates }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            @php
                                                $statusColors = [
                                                    0 => 'text-gray-500',
                                                    1 => 'text-yellow-500',
                                                    2 => 'text-green-500',
                                                    3 => 'text-red-500',
                                                ];
                                            @endphp
                                            <span class="{{ $statusColors[$client->status] ?? 'text-gray-500' }}">
                                                {{ ['Pending', 'In Progress', 'Completed', 'Cancelled'][$client->status] ?? 'Unknown' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <button @click="openEditModal({{ $client->id }})"
                                                class="text-indigo-600 hover:text-indigo-900 dark:hover:text-indigo-400">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10"
                                            class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No clients
                                            found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-4">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Create Modal --}}
        <template x-if="showCreateModal">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
                @click.away="closeCreateModal()">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg p-6" @click.stop>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Add New Client</h3>
                    <form method="POST" action="{{ route('dashboard.store') }}">
                        @csrf
                        <!-- form inputs same as before -->
                        <!-- (You can copy the inputs from the previous form here) -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Business Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="business_name" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Business Owner</label>
                                <input type="text" name="business_owner"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Email</label>
                                <input type="email" name="email"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Contact</label>
                                <input type="text" name="contact"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Type</label>
                                <input type="text" name="type"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                            </div>

                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                    <input type="checkbox" name="website_exists" checked
                                        class="form-checkbox text-blue-600" />
                                    <span class="ml-2">Website Exists</span>
                                </label>

                                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                    <input type="checkbox" name="social_accounts_exists" checked
                                        class="form-checkbox text-blue-600" />
                                    <span class="ml-2">Social Accounts Exists</span>
                                </label>
                            </div>

                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Website URL</label>
                                <input type="url" name="website"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                            </div>

                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Follow-up Date</label>
                                <input type="date" name="follow_up_dates"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                            </div>

                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Notes</label>
                                <textarea name="notes" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50"></textarea>
                            </div>

                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="button" @click="closeCreateModal()"
                                class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </template>

        {{-- Edit Modal --}}
        <template x-if="showEditModal">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
                @click.away="closeEditModal()">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg p-6" @click.stop>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Edit Client</h3>
                    <form :action="`/clients/${editClientId}`" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4" x-show="loaded">
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Business Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="business_name" x-model="form.business_name" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                            </div>
                            <!-- Add the other fields with x-model like before -->
                            <!-- ... -->
                        </div>

                        <div x-show="!loaded" class="text-center text-gray-500 dark:text-gray-400">
                            Loading...
                        </div>

                        <div class="mt-6 flex justify-end space-x-3" x-show="loaded">
                            <button type="button" @click="closeEditModal()"
                                class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </template>

    </div>

    <script>
        function clientManager() {
            return {
                clients: @json($data->items()),
                showCreateModal: false,
                showEditModal: false,
                editClientId: null,
                loaded: false,
                form: {},

                openCreateModal() {
                    this.showCreateModal = true;
                },
                closeCreateModal() {
                    this.showCreateModal = false;
                },
                openEditModal(id) {
                    this.editClientId = id;
                    this.loadClient();
                    this.showEditModal = true;
                },
                closeEditModal() {
                    this.showEditModal = false;
                    this.editClientId = null;
                    this.loaded = false;
                    this.form = {};
                },
                loadClient() {
                    const client = this.clients.find(c => c.id === this.editClientId);
                    if (client) {
                        this.form = {
                            business_name: client.business_name || '',
                            business_owner: client.business_owner || '',
                            email: client.email || '',
                            contact: client.contact || '',
                            type: client.type || '',
                            website_exists: !!client.website_exists,
                            social_accounts_exists: !!client.social_accounts_exists,
                            website: client.website || '',
                            follow_up_dates: client.follow_up_dates ? client.follow_up_dates.split('T')[0] : '',
                            notes: client.notes || '',
                        };
                        this.loaded = true;
                    }
                },
            };
        }
    </script>
</x-app-layout>

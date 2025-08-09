{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Client Details') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-2xl font-bold mb-6">{{ $client->business_name }}</h3>

            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Business Owner</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->business_owner ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Email</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->email ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Contact</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->contact ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Address</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->address ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Type</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->type ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Website Exists</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->website_exists ? 'Yes' : 'No' }}</dd>
                </div>
                @if($client->website_exists)
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Website</dt>
                    <dd class="mt-1">
                        <a href="{{ $client->website }}" target="_blank" class="text-blue-600 hover:underline dark:text-blue-400">{{ $client->website }}</a>
                    </dd>
                </div>
                @endif
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Social Accounts Exists</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->social_accounts_exists ? 'Yes' : 'No' }}</dd>
                </div>
                @if($client->social_accounts_exists && $client->social_accounts)
                <div class="md:col-span-2">
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Social Accounts</dt>
                    <dd class="mt-1 space-y-1">
                        @foreach($client->social_accounts as $platform => $link)
                            <div>
                                <strong class="capitalize">{{ $platform }}:</strong>
                                <a href="{{ $link }}" target="_blank" class="text-blue-600 hover:underline dark:text-blue-400">{{ $link }}</a>
                            </div>
                        @endforeach
                    </dd>
                </div>
                @endif
                @if($client->website_issues)
                <div class="md:col-span-2">
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Website Issues</dt>
                    @foreach($client->website_issues as $index => $issue)
                    <div class="mt-1">
                                <strong class="capitalize">{{ $index }}:</strong>
                                <span class="whitespace-pre-wrap text-red-600 dark:text-red-400">{{ $issue }}</span>
                            </div>
                    @endforeach
                </div>
                @endif
                @if($client->social_account_issues)
                <div class="md:col-span-2">
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Social Account Issues</dt>
                    <dd class="mt-1">
                        <pre class="whitespace-pre-wrap text-red-600 dark:text-red-400">{{ json_encode($client->social_account_issues, JSON_PRETTY_PRINT) }}</pre>
                    </dd>
                </div>
                @endif
                <div class="md:col-span-2">
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Audit Summary</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->audit_summary ?? '-' }}</dd>
                </div>
                <div class="md:col-span-2">
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Notes</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100 whitespace-pre-line">{{ $client->notes ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Follow Up Date</dt>
                    <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $client->follow_up_dates ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Status</dt>
                    @php
                        $statusLabels = ['Pending', 'In Progress', 'Completed', 'Cancelled'];
                        $statusColors = ['text-gray-500', 'text-yellow-500', 'text-green-500', 'text-red-500'];
                        $status = $client->status ?? 0;
                    @endphp
                    <dd class="mt-1 {{ $statusColors[$status] ?? 'text-gray-500' }}">{{ $statusLabels[$status] ?? 'Unknown' }}</dd>
                </div>
            </dl>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('clients.index') }}"
                   class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none"
                >
                    Back
                </a>
                <a href="{{ route('clients.edit', $client->id) }}"
                   class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 focus:outline-none"
                >
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Client Details') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-2xl font-bold mb-6">{{ $client->business_name }}</h3>

            @php
                $fields = [
                    'business_owner' => 'Business Owner',
                    'email'          => 'Email',
                    'contact'        => 'Contact',
                    'address'        => 'Address',
                    'type'           => 'Type',
                    'website_exists' => 'Website Exists',
                    'social_accounts_exists' => 'Social Accounts Exists',
                    'audit_summary'  => 'Audit Summary',
                    'notes'          => 'Notes',
                    'follow_up_dates'=> 'Follow Up Date',
                ];
                $statusLabels = ['Pending', 'In Progress', 'Completed', 'Cancelled'];
                $statusColors = ['text-gray-500', 'text-yellow-500', 'text-green-500', 'text-red-500'];
                $status = $client->status ?? 0;
            @endphp

            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                @foreach($fields as $key => $label)
                    <div class="{{ in_array($key, ['audit_summary', 'notes']) ? 'md:col-span-2' : '' }}">
                        <dt class="font-semibold text-gray-700 dark:text-gray-300">{{ $label }}</dt>
                        <dd class="mt-1 text-gray-900 dark:text-gray-100">
                            @if(is_bool($client->$key) || $key === 'website_exists' || $key === 'social_accounts_exists')
                                {{ $client->$key ? 'Yes' : 'No' }}
                            @else
                                {{ $client->$key ?? '-' }}
                            @endif
                        </dd>
                    </div>
                @endforeach

                {{-- Website link if exists --}}
                @if($client->website_exists && $client->website)
                    <div>
                        <dt class="font-semibold text-gray-700 dark:text-gray-300">Website</dt>
                        <dd class="mt-1">
                            <a href="{{ $client->website }}" target="_blank" class="text-blue-600 hover:underline dark:text-blue-400">
                                {{ $client->website }}
                            </a>
                        </dd>
                    </div>
                @endif

                {{-- Social accounts list if exists --}}
                @if($client->social_accounts_exists && $client->social_accounts)
                    <div class="md:col-span-2">
                        <dt class="font-semibold text-gray-700 dark:text-gray-300">Social Accounts</dt>
                        <dd class="mt-1 space-y-1">
                            @foreach($client->social_accounts as $platform => $link)
                                <div>
                                    <strong class="capitalize">{{ $platform }}:</strong>
                                    <a href="{{ $link }}" target="_blank" class="text-blue-600 hover:underline dark:text-blue-400">{{ $link }}</a>
                                </div>
                            @endforeach
                        </dd>
                    </div>
                @endif

                {{-- Website issues --}}
                @if($client->website_issues)
                    <div class="md:col-span-2">
                        <dt class="font-semibold text-gray-700 dark:text-gray-300">Website Issues</dt>
                        @foreach($client->website_issues as $index => $issue)
                            <div class="mt-1">
                                <strong class="capitalize">{{ $index }}:</strong>
                                <span class="whitespace-pre-wrap text-red-600 dark:text-red-400">{{ $issue }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Social account issues --}}
                @if($client->social_account_issues)
                    <div class="md:col-span-2">
                        <dt class="font-semibold text-gray-700 dark:text-gray-300">Social Account Issues</dt>
                        @foreach($client->social_account_issues as $index => $issue)
                            <div class="mt-1">
                                <strong class="capitalize">{{ $index }}:</strong>
                                <span class="whitespace-pre-wrap text-red-600 dark:text-red-400">{{ $issue }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Status --}}
                <div>
                    <dt class="font-semibold text-gray-700 dark:text-gray-300">Status</dt>
                    <dd class="mt-1 {{ $statusColors[$status] ?? 'text-gray-500' }}">
                        {{ $statusLabels[$status] ?? 'Unknown' }}
                    </dd>
                </div>
            </dl>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('clients.index') }}"
                   class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none">
                    Back
                </a>
                <a href="{{ route('clients.edit', $client->id) }}"
                   class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

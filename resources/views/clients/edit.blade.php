<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
            <form method="POST" action="{{ route('clients.update', $client->id) }}">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    {{-- Business Name --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Business Name <span class="text-red-500">*</span></label>
                        <input type="text" name="business_name" required
                               value="{{ old('business_name', $client->business_name) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                      focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                    </div>

                    {{-- Business Owner --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Business Owner</label>
                        <input type="text" name="business_owner"
                               value="{{ old('business_owner', $client->business_owner) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                      focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email"
                               value="{{ old('email', $client->email) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                      focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                    </div>

                    {{-- Contact --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Contact</label>
                        <input type="text" name="contact"
                               value="{{ old('contact', $client->contact) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                      focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                    </div>

                    {{-- Type --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Type</label>
                        <input type="text" name="type"
                               value="{{ old('type', $client->type) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                      focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                    </div>

                    {{-- Checkboxes --}}
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="website_exists" value="on"
                                   {{ old('website_exists', $client->website_exists) ? 'checked' : '' }}
                                   class="form-checkbox text-blue-600" />
                            <span class="ml-2">Website Exists</span>
                        </label>

                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="social_accounts_exists" value="on"
                                   {{ old('social_accounts_exists', $client->social_accounts_exists) ? 'checked' : '' }}
                                   class="form-checkbox text-blue-600" />
                            <span class="ml-2">Social Accounts Exists</span>
                        </label>
                    </div>

                    {{-- Website URL --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Website URL</label>
                        <input type="url" name="website"
                               value="{{ old('website', $client->website) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                      focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                    </div>

                    {{-- Google Maps URL --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Google Maps URL</label>
                        <input type="url" name="location"
                               value="{{ old('location', $client->location) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                      focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                    </div>

                    {{-- Follow-up Date --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Follow-up Date</label>
                        <input type="date" name="follow_up_dates"
                               value="{{ old('follow_up_dates', $client->follow_up_dates) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                      focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                    </div>

                    {{-- Notes --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Notes</label>
                        <textarea name="notes" rows="3"
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                         focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">{{ old('notes', $client->notes) }}</textarea>
                    </div>

                    {{-- Social Media Accounts --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Social Media Accounts</label>
                        <div x-data="socialAccountsManager()" class="mb-4">
                            <template x-for="(account, index) in accounts" :key="index">
                                <div class="flex items-center space-x-2">
                                    <input type="text" :name="`social_accounts_platform[${index}]`" x-model="account.platform" placeholder="Platform (e.g. facebook)"
                                           class="w-32 mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                                  focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                                    <input type="text" :name="`social_accounts[${account.platform}]`" x-model="account.url" placeholder="URL"
                                           class="flex-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                                  focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                                    <button type="button" @click="removeAccount(index)"
                                            class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none" title="Remove field">
                                        &times;
                                    </button>
                                </div>
                            </template>

                            <button type="button" @click="addAccount()"
                                    class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none">
                                + Add Social Account
                            </button>
                        </div>
                    </div>

                    {{-- Issues on Website --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Issues on Website</label>
                        <div x-data="websiteIssueManager()" class="mb-4">
                            <template x-for="(account, index) in accounts" :key="index">
                                <div class="flex items-center space-x-2">
                                    <input type="text" :name="`issues_on_website_platform[${index}]`" x-model="account.platform" placeholder="Platform (e.g. facebook)"
                                           class="w-32 mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                                  focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                                    <input type="text" :name="`issues_on_website[${account.platform}]`" x-model="account.url" placeholder="Describe the issue."
                                           class="flex-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                                  focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                                    <button type="button" @click="removeAccount(index)"
                                            class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none" title="Remove field">
                                        &times;
                                    </button>
                                </div>
                            </template>

                            <button type="button" @click="addAccount()"
                                    class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none">
                                + Add Issues on Website
                            </button>
                        </div>
                    </div>

                    {{-- Issues on Social Media Accounts --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Issues on Social Media Accounts</label>
                        <div x-data="socialAccountsIssueManager()" class="mb-4">
                            <template x-for="(account, index) in accounts" :key="index">
                                <div class="flex items-center space-x-2">
                                    <input type="text" :name="`issues_on_social_accounts_platform[${index}]`" x-model="account.platform" placeholder="Platform (e.g. facebook)"
                                           class="w-32 mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                                  focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                                    <input type="text" :name="`issues_on_social_accounts[${account.platform}]`" x-model="account.url" placeholder="Describe the issue."
                                           class="flex-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                                                  focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50" />
                                    <button type="button" @click="removeAccount(index)"
                                            class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none" title="Remove field">
                                        &times;
                                    </button>
                                </div>
                            </template>

                            <button type="button" @click="addAccount()"
                                    class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none">
                                + Add Issues on Social Account
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('clients.index') }}"
                       class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300
                              hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Alpine.js Data Managers --}}
    <script>
        function socialAccountsManager() {
            return {
                accounts: @json(old('social_accounts', $client->social_accounts ?? [['platform' => 'Facebook', 'url' => '']])),
                addAccount() {
                    this.accounts.push({ platform: '', url: '' });
                },
                removeAccount(index) {
                    this.accounts.splice(index, 1);
                }
            }
        }

        function socialAccountsIssueManager() {
            return {
                accounts: @json(old('issues_on_social_accounts', $client->social_account_issues ?? [['platform' => 'Engagement', 'url' => '']])),
                addAccount() {
                    this.accounts.push({ platform: '', url: '' });
                },
                removeAccount(index) {
                    this.accounts.splice(index, 1);
                }
            }
        }

        function websiteIssueManager() {
            return {
                accounts: @json(old('issues_on_website', $client->website_issues ?? [['platform' => 'Hero Section', 'url' => '']])),
                addAccount() {
                    this.accounts.push({ platform: '', url: '' });
                },
                removeAccount(index) {
                    this.accounts.splice(index, 1);
                }
            }
        }
    </script>
</x-app-layout>

<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Tech Enfield',
            'email' => 'info@techenfield.com',
            'password' => Hash::make('password')
        ]);

        $faker = Faker::create();

        $userId = 1;

        foreach(range(1, 20) as $i) {
            $websiteExists = $faker->boolean(80);
            $socialAccounts = [
                'facebook' => $faker->boolean(70) ? $faker->url : null,
                'twitter' => $faker->boolean(50) ? $faker->url : null,
                'instagram' => $faker->boolean(40) ? $faker->url : null,
                'linkedin' => $faker->boolean(30) ? $faker->url : null,
            ];
            $socialAccounts = array_filter($socialAccounts);

            $websiteIssues = $websiteExists && $faker->boolean(30)
                ? ['loading_speed' => 'slow', 'seo' => 'missing meta tags']
                : null;

            $socialAccountIssues = !empty($socialAccounts) && $faker->boolean(25)
                ? ['inconsistent_branding' => true, 'inactive_accounts' => ['twitter']]
                : null;

            Client::create([
                'added_by' => $userId,
                'last_updated_by' => $userId,
                'business_name' => $faker->company,
                'business_owner' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'contact' => $faker->phoneNumber,
                'address' => $faker->address,
                'type' => $faker->randomElement(['Retail', 'Wholesale', 'Service', 'Manufacturing']),
                'website_exists' => $websiteExists,
                'social_accounts_exists' => !empty($socialAccounts),
                'website' => $websiteExists ? $faker->url : null,
                'social_accounts' => !empty($socialAccounts) ? ($socialAccounts) : null,
                'website_issues' => $websiteIssues ? ($websiteIssues) : null,
                'social_account_issues' => $socialAccountIssues ? ($socialAccountIssues) : null,
                'audit_summary' => $faker->sentence(10),
                'notes' => $faker->paragraph,
                'follow_up_dates' => $faker->boolean(60) ? $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d') : null,
                'status' => $faker->randomElement([0,1,2,3]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

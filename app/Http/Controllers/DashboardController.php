<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Client::paginate(10);
        return view('clients.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'business_name' => 'required|string|unique:clients,business_name',
            'business_owner' => 'nullable|string',
            'email' => 'nullable|email',
            'contact' => 'nullable|regex:/^\+?\d[\d\- ]+$/',
            'address' => 'nullable|string',
            'type' => 'nullable|string',
            'website_exists' => 'nullable',
            'social_accounts_exists' => 'nullable',
            'website' => 'nullable|url',
            'location' => 'nullable|url|unique:clients,location',
            'follow_up_dates' => 'nullable|date',
            'notes' => 'nullable|string',
            'social_accounts' => 'nullable|array',
            'issues_on_website' => 'nullable|array',
            'issues_on_social_accounts' => 'nullable|array'
        ]);

        $data = $request->only([
            'business_name',
            'business_owner',
            'email',
            'contact',
            'address',
            'type',
            'website',
            'social_accounts',
            'notes',
            'follow_up_dates',
            'location'
        ]);

        if($request->website_exists == 'on') {
            $data['website_exists'] = true;
        }
        if($request->social_accounts_exists == 'on') {
            $data['social_accounts_exists'] = true;
        }
        $data['website_issues'] = $request->issues_on_website;
        $data['social_account_issues'] = $request->issues_on_social_accounts;
        $data['added_by'] = Auth::id();
        $client = Client::create($data);

        Activity::create([
            'event' => 'Client created',
            'data' => ['client_id' => $client->id]
        ]);
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validate = $request->validate([
            'business_name' => 'required|string|unique:clients,business_name',
            'business_owner' => 'nullable|string',
            'email' => 'nullable|email',
            'contact' => 'nullable|regex:/^\+?\d[\d\- ]+$/',
            'address' => 'nullable|string',
            'type' => 'nullable|string',
            'website_exists' => 'nullable',
            'social_accounts_exists' => 'nullable',
            'website' => 'nullable|url',
            'location' => 'nullable|url|unique:clients,location',
            'follow_up_dates' => 'nullable|date',
            'notes' => 'nullable|string',
            'social_accounts' => 'nullable|array',
            'issues_on_website' => 'nullable|array',
            'issues_on_social_accounts' => 'nullable|array'
        ]);

        $data = $request->only([
            'business_name',
            'business_owner',
            'email',
            'contact',
            'address',
            'type',
            'website',
            'social_accounts',
            'notes',
            'follow_up_dates',
            'location'
        ]);

        if($request->website_exists == 'on') {
            $data['website_exists'] = true;
        }
        if($request->social_accounts_exists == 'on') {
            $data['social_accounts_exists'] = true;
        }
        $data['website_issues'] = $request->issues_on_website;
        $data['social_account_issues'] = $request->issues_on_social_accounts;
        $data['last_updated_by'] = Auth::id();
        $client->update($data);

        Activity::create([
            'event' => 'Client updated by ' . Auth::user()->name,
            'data' => $request->all()
        ]);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}

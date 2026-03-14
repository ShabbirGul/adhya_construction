<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $perPage = $request->get('per_page', 10);
        $clients = $query->latest()->paginate($perPage);
        return view('admin.clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = 'storage/' . $request->file('logo')->store('clients', 'public');
        }

        Client::create($data);
        return redirect()->route('clients.index')->with('success', 'Client created successfully');
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();
        if ($request->hasFile('logo')) {
            if ($client->logo && strpos($client->logo, 'storage/') === 0) {
                Storage::disk('public')->delete(str_replace('storage/', '', $client->logo));
            }
            $data['logo'] = 'storage/' . $request->file('logo')->store('clients', 'public');
        }

        $client->update($data);
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        if ($client->logo && strpos($client->logo, 'storage/') === 0) {
            Storage::disk('public')->delete(str_replace('storage/', '', $client->logo));
        }
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Get a list of all clients
    public function index()
    {
        $clients = Client::paginate();
        return response()->json(['data' => $clients]);
    }

    // Create a new client
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'token' => 'required|string',
            'liveness_range' => 'required|numeric',
            'liveness_threshold' => 'required|numeric',
            'fr_range' => 'required|numeric',
            'fr_threshold' => 'required|numeric',
            'is_active' => 'required|boolean',
        ]);

        $client = Client::create($validatedData);

        return response()->json(['data' => $client], 201);
    }

    // Get details of a specific client
    public function show(Client $client)
    {
        return response()->json(['data' => $client]);
    }

    // Update a specific client
    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'token' => 'required|string',
            'liveness_range' => 'required|numeric',
            'liveness_threshold' => 'required|numeric',
            'fr_range' => 'required|numeric',
            'fr_threshold' => 'required|numeric',
            'is_active' => 'required|boolean',
        ]);

        $client->update($validatedData);

        return response()->json(['data' => $client], 200);
    }

    // Delete a specific client
    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json(['message' => 'Client deleted successfully'], 204);
    }
}
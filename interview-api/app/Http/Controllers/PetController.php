<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PetController extends Controller
{
    # Functionality of listing all available pets
    public function index()
    {
        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $response = $client->get('https://petstore.swagger.io/v2/pet/findByStatus', [
                'query' => ['status' => 'available'],
            ]);

            $pets = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            \Log::error('Error retrieving pets: ' . $e->getMessage());
            $pets = [];
            return view('pets.index', compact('pets'))->with('error', 'Failed to retrieve pets');
        }

        return view('pets.index', compact('pets'));
    }

    # Functionality of creating new pet
    public function create()
    {
        try {
            return view('pets.create');
        } catch (\Exception $e) {
            return redirect('/pets')->with('error', 'Failed to create pet');
        }
    }

    # Functionality of adding new pet
    public function store(Request $request)
    {
        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $response = $client->post('https://petstore.swagger.io/v2/pet', [
                'json' => [
                    'id' => $request->id,
                    'name' => $request->name,
                    'status' => $request->status,
                ],
            ]);

            return redirect('/pets')->with('success', 'Added new pet successfully');
        } catch (\Exception $e) {
            \Log::error('Error adding pet: ' . $e->getMessage());
            return redirect('/pets/create')->with('error', 'Failed to add new pet');
        }
    }

    # Functionality of editing a pet
    public function edit($id)
    {
        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $response = $client->get('https://petstore.swagger.io/v2/pet/' . $id);
            $pet = json_decode($response->getBody(), true);

            return view('pets.edit', compact('pet'));
        } catch (\Exception $e) {
            \Log::error('Error editing pet: ' . $e->getMessage());
            return redirect('/pets')->with('error', 'Failed to edit pet');
        }
    }

    # Functionality of updating a pet
    public function update(Request $request, $id)
    {
        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $response = $client->put('https://petstore.swagger.io/v2/pet', [
                'json' => [
                    'id' => $id,
                    'name' => $request->name,
                    'status' => $request->status,
                ],
            ]);

            return redirect('/pets')->with('success', 'Updated pet successfully');
        } catch (\Exception $e) {
            \Log::error('Error updating pet: ' . $e->getMessage());
            return redirect('/pets/' . $id . '/edit')->with('error', 'Failed to update pet');
        }
    }

    # Functionality of deleting a pet
    public function destroy($id)
    {
        try {
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $response = $client->delete('https://petstore.swagger.io/v2/pet/' . $id);

            return redirect('/pets')->with('success', 'Pet deleted successfully');
        } catch (\Exception $e) {
            \Log::error('Error deleting pet: ' . $e->getMessage());
            return redirect('/pets')->with('error', 'Failed to delete pet');
        }
    }
}
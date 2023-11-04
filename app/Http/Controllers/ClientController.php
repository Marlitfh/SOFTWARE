<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:clients.create')->only(['create', 'store']);
        $this->middleware('can:clients.index')->only(['index']);
        $this->middleware('can:clients.edit')->only(['edit', 'update']);
        $this->middleware('can:clients.show')->only(['show']);
        $this->middleware('can:clients.destroy')->only(['destroy']);
    }

    public function index()
    {
        $clients = Client::get();
        $user_session = Auth::user()->email;
        return view('admin.client.index', compact('clients', 'user_session'));
    }

    public function create()
    {
        $user_session = Auth::user()->email;
        return view('admin.client.create',compact('user_session'));
    }

    public function store(StoreRequest $request)
    {
        Client::create($request->all());
        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
        $user_session = Auth::user()->email;
        return view('admin.client.show', compact('client', 'user_session'));
    }

    public function edit(Client $client)
    {
        $user_session = Auth::user()->email;
        return view('admin.client.edit', compact('client', 'user_session'));
    }

    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return redirect()->route('clients.index');
        } catch (\Exception $e) {
            $errors = 'Registro relacionado, imposible de eliminar';
            return redirect()->route('clients.index')->with('errors', $errors);
        }
    }

    public function get_clients_by_dni(Request $request)
    {
        if ($request->ajax()) {
            $clients = Client::where('clie_dni', $request->dni)->first();
            return response()->json($clients);
        }//firstOrFail()
    }

    public function get_clients_by_id(Request $request)
    {
        if ($request->ajax()) {
            $clients = Client::findOrFail($request->client_id);
            return response()->json($clients);
        }
    }

}

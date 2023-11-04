<?php

namespace App\Http\Controllers;

use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:providers.create')->only(['create', 'store']);
        $this->middleware('can:providers.index')->only(['index']);
        $this->middleware('can:providers.edit')->only(['edit', 'update']);
        $this->middleware('can:providers.show')->only(['show']);
        $this->middleware('can:providers.destroy')->only(['destroy']);
    }

    public function index()
    {
        $providers = Provider::get();
        $user_session = Auth::user()->email;
        return view('admin.provider.index', compact('providers', 'user_session'));
    }

    public function create()
    {
        $user_session = Auth::user()->email;
        return view('admin.provider.create', compact('user_session'));
    }

    public function store(StoreRequest $request)
    {
        Provider::create($request->all());
        return redirect()->route('providers.index');
    }

    public function show(Provider $provider)
    {
        $user_session = Auth::user()->email;
        return view('admin.provider.show', compact('provider', 'user_session'));
    }

    public function edit(Provider $provider)
    {
        $user_session = Auth::user()->email;
        return view('admin.provider.edit', compact('provider', 'user_session'));
    }

    public function update(UpdateRequest $request, Provider $provider)
    {
        $provider->update($request->all());
        return redirect()->route('providers.index');
    }

    public function destroy(Provider $provider)
    {
        try {
            $provider->delete();
            return redirect()->route('providers.index');
        } catch (\Exception $e) {
            $errors = 'Registro relacionado, imposible de eliminar';
            return redirect()->route('providers.index')->with('errors', $errors);
        }
    }

    public function get_providers_by_ruc(Request $request)
    {
        if ($request->ajax()) {
            $providers = Provider::where('prov_ruc', $request->ruc)->first();
            return response()->json($providers); //firstOrFail
        }
    }
}

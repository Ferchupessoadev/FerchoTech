<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();

        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['required', 'string'],
        ]);

        $service = Service::create($validated);

        return redirect()->route('dashboard.blog.index')->with('success', 'Service creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('landing.services', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return redirect()->route('dashboard.services.index')
                             ->with('success', 'Servicio eliminado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.services.index')
                             ->with('error', 'No se pudo eliminar el servicio, está siendo utilizado.');
        }
    }
}

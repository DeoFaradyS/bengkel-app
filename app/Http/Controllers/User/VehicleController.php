<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = Vehicle::where('user_id', auth()->id())
            ->when($request->search, function ($q, $search) {
                $q->where(function ($q) use ($search) {
                    $q->where('brand', 'like', "%$search%")
                        ->orWhere('license_plate', 'like', "%$search%")
                        ->orWhere('model', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('user.vehicles', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_plate' => 'required|string|max:20|unique:vehicles',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'type' => 'required|in:sedan,suv,mpv,pickup,truck',
        ]);

        $validated['user_id'] = auth()->id();

        Vehicle::create($validated);

        return redirect()->route('user.vehicles.index')
            ->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $this->authorizeVehicle($vehicle);

        $validated = $request->validate([
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate,' . $vehicle->id,
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'type' => 'required|in:sedan,suv,mpv,pickup,truck',
        ]);

        $vehicle->update($validated);

        return redirect()->route('user.vehicles.index')  // ← fix
            ->with('success', 'Kendaraan berhasil diupdate.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $this->authorizeVehicle($vehicle);

        $vehicle->delete();

        return redirect()->route('user.vehicles.index')  // ← fix
            ->with('success', 'Kendaraan berhasil dihapus.');
    }
    private function authorizeVehicle(Vehicle $vehicle): void
    {
        abort_if($vehicle->user_id !== auth()->id(), 403);
    }
}
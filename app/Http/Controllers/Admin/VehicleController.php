<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Category;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $query = Vehicle::with('category');

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhereHas('category', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            });
        }

        $perPage = $request->get('per_page', 10);
        $vehicles = $query->latest()->paginate($perPage);
        $categories = Category::where('status', 1)->get();

        return view('admin.vehicles.index', compact('vehicles', 'categories'));
    }

    public function store(VehicleRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('vehicles', 'public');
        }

        Vehicle::create($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully');
    }

    public function edit(Vehicle $vehicle)
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $categories = Category::where('status', 1)->get();
        return view('admin.vehicles.edit', compact('vehicle', 'categories'));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($vehicle->image) {
                Storage::disk('public')->delete($vehicle->image);
            }
            $data['image'] = $request->file('image')->store('vehicles', 'public');
        }

        $vehicle->update($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->image) {
            Storage::disk('public')->delete($vehicle->image);
        }
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully');
    }
}
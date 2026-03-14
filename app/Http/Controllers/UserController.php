<?php

namespace App\Http\Controllers;

use App\Models\User; // 👈 IMPORTANT (import model)

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function home()
    {
        $banners = \App\Models\Banner::where('status', 1)->get();
        $categories = \App\Models\Category::where('status', true)->take(5)->get();
        $latestVehicles = \App\Models\Vehicle::with('category')->where('status', true)->latest()->take(6)->get();
        $clients = \App\Models\Client::where('status', 1)->get();
        $history = \App\Models\History::first();
        $testimonials = \App\Models\Testimonial::where('status', 1)->get();
        $countries = \App\Models\Country::where('status', 1)->get();

        return view('user.home', compact(
            'banners', 'categories', 'latestVehicles', 'clients', 'history', 'testimonials', 'countries'
        ));
    }

    public function vehicles(\Illuminate\Http\Request $request)
    {
        $query = \App\Models\Vehicle::with('category')->where('status', true);
        
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $vehicles = $query->latest()->paginate(9);
        $categories = \App\Models\Category::where('status', true)->get();

        return view('user.vehicles.index', compact('vehicles', 'categories'));
    }

    public function categories()
    {
        $categories = \App\Models\Category::where('status', true)->get();
        return view('user.categories.index', compact('categories'));
    }

    public function about()
    {
        $history = \App\Models\History::first();
        return view('user.about', compact('history'));
    }

    public function faqs()
    {
        $faqs = \App\Models\Faq::where('status', true)->latest()->get();
        return view('user.faqs', compact('faqs'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function storeContact(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        \App\Models\ContactQuery::create($validated);

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
        ]);

        return redirect('/users')->with('success', 'User created successfully!');
    }
}
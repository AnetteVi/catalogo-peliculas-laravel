<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $filter = $request->input('filter');
    $today = now()->format('Y-m-d'); // Usamos el formato 'Y-m-d'

    switch ($filter) {
        case 'anteriores':
            $movies = Movie::whereDate('release_date', '<', $today)->get();  // Aseguramos que sólo compare la fecha
            break;
        case 'proximos':
            $movies = Movie::whereDate('release_date', '>', $today)->get();  // Aseguramos que sólo compare la fecha
            break;
        case 'actuales':
            $movies = Movie::whereDate('release_date', '=', $today)->get();  // Comparamos solo por fecha
            break;
        default:
            $movies = Movie::all();
    }

    return view('movies.index', compact('movies'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'classification' => 'required',
            'release_date' => 'required|date',
            'description' => 'required',
        ]);
    
        Movie::create($request->all());
    
        return redirect()->route('movies.index')->with('success', 'Película agregada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $movie = Movie::findOrFail($id);
    return view('movies.edit', compact('movie'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'classification' => 'required',
        'release_date' => 'required|date',
        'description' => 'required',
    ]);

    $movie = Movie::findOrFail($id);
    $movie->update($request->all());

    return redirect()->route('movies.index')->with('success', 'Película actualizada correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

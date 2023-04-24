<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registry;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registries = Registry::all();
        return view('admin.registries.index', compact('registries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $registry = new Registry();
        return view('admin.registries.create', compact('registry'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'business_name' => 'required|string|min:1|max:100',
                'status' => 'required|string|min:1|max:20',
                'sector' => 'required|string|min:1|max:50',
                'vat_number' => 'required|string|unique:registries|min:11|max:11',
                'tax_id_code' => 'required|string|min:16|max:16',
                'activity_start_date' => 'required|string',
                'rating' => 'required|string|max:1',
                'chamber_of_commerce' => 'nullable|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
                'notes' => 'required|string',
                'email' => 'required|string|max:70',
                'phone_number' => 'required|string|max:20',
                'username' => 'required|string|min:3|max:50',
                'password' => 'required|string|max:30',
            ]
        );

        $data = $request->all();
        $registry = new Registry();

        if (Arr::exists($data, 'chamber_of_commerce')) {
            $chamber_of_commerce = Storage::put('companies', $data['chamber_of_commerce']);
            $data['chamber_of_commerce'] = $chamber_of_commerce;
        }

        $registry->fill($data);
        $registry->save();

        return to_route('admin.registries.show', $registry->id)->with('type', 'success')->with('msg', 'Azienda inserita con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registry $registry)
    {
        return view('admin.registries.show', compact('registry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registry $registry)
    {
        return view('admin.registries.edit', compact('registry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registry $registry)
    {
        $request->validate(
            [
                'business_name' => 'required|string|min:1|max:100',
                'status' => 'required|string|min:1|max:20',
                'sector' => 'required|string|min:1|max:50',
                'vat_number' => ['required', 'string', Rule::unique('registries')->ignore($registry->id), 'min:11', 'max:11'],
                'tax_id_code' => 'required|string|min:16|max:16',
                'activity_start_date' => 'required|string',
                'rating' => 'required|string|max:1',
                'chamber_of_commerce' => 'nullable|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
                'notes' => 'required|string',
                'email' => 'required|string|max:70',
                'phone_number' => 'required|string|max:20',
                'username' => 'required|string|min:3|max:50',
                'password' => 'required|string|max:30',
            ]
        );

        $data = $request->all();

        if (Arr::exists($data, 'chamber_of_commerce')) {
            if ($registry->chamber_of_commerce) Storage::delete($registry->chamber_of_commerce);
            $chamber_of_commerce = Storage::put('companies', $data['chamber_of_commerce']);
            $data['chamber_of_commerce'] = $chamber_of_commerce;
        }

        $registry->fill($data);
        $registry->save();

        return to_route('admin.registries.show', $registry->id)->with('type', 'warning')->with('msg', 'Modifica avvenuta con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registry $registry)
    {
        if ($registry->chamber_of_commerce) Storage::delete($registry->chamber_of_commerce);

        $registry->delete();

        return to_route('admin.registries.index')->with('type', 'danger')->with('msg', "L'azienda $registry->business_name è stata cancellata con successo.");
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TelephonedirectoryRequest;
use App\Models\TelephoneDirectoriesView;
use App\Models\Telephonedirectory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TelephonedirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $telephones = Telephonedirectory::all();

        return Inertia::render('TelephoneDirectory/DataTable', [
            'telephones' => $telephones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('TelephoneDirectory/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile_number' => 'nullable|string|regex:/^\+?[0-9\s\-()]{7,}$/',
            'landline_number' => 'nullable|string|regex:/^\+?[0-9\s\-()]{7,}$/',
            'notes' => 'nullable|string',
        ]);

        $contact = new Telephonedirectory();
        $contact->fill($validated);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('contacts', 'public');
            $contact->photo = $path;
        }

        $contact->save();

        return redirect()->route('TelephoneDirectory.index')->with('success', 'Contact added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Telephonedirectory::findOrFail($id);


        TelephoneDirectoriesView::create([
            'telephone_directory_id' => $id,
            'viewed_at' => now(),
        ]);

        // Get the total views count
        $viewCount = TelephoneDirectoriesView::where('telephone_directory_id', $id)->count();

        return Inertia::render('TelephoneDirectory/View', [
            'contact' => $contact,
            'viewCount' => $viewCount,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = Telephonedirectory::findOrFail($id);

        return Inertia::render('TelephoneDirectory/Edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $contact = Telephonedirectory::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile_number' => 'nullable|string|regex:/^\+?[0-9\s\-()]{7,}$/',
            'landline_number' => 'nullable|string|regex:/^\+?[0-9\s\-()]{7,}$/',
            'notes' => 'nullable|string',
        ]);


        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('contacts', 'public');
            $validatedData['photo'] = $filePath;
        }

        $contact->update($validatedData);

        return redirect()->route('TelephoneDirectory.index')->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Telephonedirectory $telephonedirectory)
    {
        //
    }
}

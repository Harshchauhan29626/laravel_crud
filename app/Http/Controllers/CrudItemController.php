<?php

namespace App\Http\Controllers;

use App\Models\CrudItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CrudItemController extends Controller
{
    public function index(): View
    {
        $crudItems = CrudItem::latest()->paginate(10);

        return view('crud-items.index', compact('crudItems'));
    }

    public function create(): View
    {
        return view('crud-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:120'],
            'status' => ['required', 'in:active,inactive'],
            'notes' => ['nullable', 'string'],
        ]);

        CrudItem::create($validated);

        return redirect()
            ->route('crud-items.index')
            ->with('success', 'CRUD item created successfully.');
    }

    public function show(CrudItem $crudItem): View
    {
        return view('crud-items.show', compact('crudItem'));
    }

    public function edit(CrudItem $crudItem): View
    {
        return view('crud-items.edit', compact('crudItem'));
    }

    public function update(Request $request, CrudItem $crudItem): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:120'],
            'status' => ['required', 'in:active,inactive'],
            'notes' => ['nullable', 'string'],
        ]);

        $crudItem->update($validated);

        return redirect()
            ->route('crud-items.index')
            ->with('success', 'CRUD item updated successfully.');
    }

    public function destroy(CrudItem $crudItem): RedirectResponse
    {
        $crudItem->delete();

        return redirect()
            ->route('crud-items.index')
            ->with('success', 'CRUD item deleted successfully.');
    }
}

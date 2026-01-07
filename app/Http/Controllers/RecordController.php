<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    // Show all record sections
    public function index()
    {
        $records = Record::get();
        return view('admin.pages.record.index', compact('records'));
    }

    // Show form to create a new record sections
    public function create()
    {
        return view('admin.pages.record.create');
    }

    // Store new record sections
    public function store(Request $request)
    {
        $request->validate([
            'sub_title'  => 'nullable|string|max:255',
            'title'      => 'nullable|string|max:255',
            'icon'       => 'nullable|string|max:255',
            'text'       => 'nullable|array',
        ]);

        $text = [];
        if ($request->text) {
            foreach ($request->text as $item) {
                if (!empty($item['key'])) {
                    $text[$item['key']] = $item['value'] ?? '';
                }
            }
        }

        Record::create([
            'sub_title'  => $request->sub_title,
            'title'      => $request->title,
            'icon'       => $request->icon,
            'text'       => $text,
            'is_active'  => (int) $request->is_active,
        ]);

        return redirect()
            ->route('record.index')
            ->with('success', 'record section created successfully.');
    }

    public function show($id)
    {
        $record = Record::findOrFail($id);
        return view('admin.pages.record.show', compact('record'));
    }

    // Show edit form
    public function edit($id)
    {
        $record = Record::findOrFail($id);
        return view('admin.pages.record.edit', compact('record'));
    }

    // Update the record section
    public function update(Request $request, $id)
    {
        $record = Record::findOrFail($id);

        $request->validate([ 
            'sub_title' => 'nullable|string|max:255',
            'title'     => 'nullable|string|max:255',
            'icon'      => 'nullable|string|max:255',
            'text'      => 'nullable|array',
        ]);

        $text = [];
        if ($request->text) {
            foreach ($request->text as $item) {
                if (!empty($item['key'])) {
                    $text[$item['key']] = $item['value'] ?? '';
                }
            }
        }

        $record->update([
            'sub_title' => $request->sub_title,
            'title'     => $request->title,
            'icon'      => $request->icon,
            'text'      => $text,
            'is_active' => (int) $request->is_active,
        ]);

        return redirect()
            ->route('record.index')
            ->with('success', 'record section updated successfully.');
    }
    
    // Delete record
    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return redirect()->route('record.index')->with('success', 'record section deleted successfully.');
    }
}

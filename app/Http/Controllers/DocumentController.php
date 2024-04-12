<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all(); // Fetch all documents from the database

        return view('documents.index', compact('documents'));
    }

    public function show($id)
    {
        $document = Document::findOrFail($id); // Fetch the specific document by ID

        return view('documents.show', compact('document'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'select_values' => 'required|json', // Validate the incoming JSON string
        ]);

        // Save the document to the database
        $document = new Document();
        $document->select_values = $request->input('select_values');
        $document->save();

        return response()->json(['message' => 'Document created successfully'], 201);
    }
}

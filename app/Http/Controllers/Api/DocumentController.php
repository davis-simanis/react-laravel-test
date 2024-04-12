<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document as DocumentModel;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Documents fetched successfully',
            'data' => DocumentModel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
        $resource = new DocumentResource([
            'document_name' => $request->input('title'),
            'content' => $request->input('title'),
            'field_count' => $request->input('title')
        ]);

        $resource->save();

        return response()->json(['message' => 'Resource created successfully', 'data' => $resource], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentModel $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, DocumentModel $document)
    {
        $document->update($request->validated());

        return new DocumentResource($document);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentModel $document)
    {
        $document->delete();

        return response('', 204);
    }
}

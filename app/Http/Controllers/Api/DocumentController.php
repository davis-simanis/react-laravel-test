<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document as DocumentModel;
use Illuminate\Auth\Events\Validated;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return DocumentResource::collection(
        //     DocumentModel::query()->orderBy('id', 'desc')
        // );

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
        $data = $request->validated();

        return new DocumentResource(DocumentModel::create($data));
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

<?php

namespace App\Http\Controllers;

use App\AuditAction;
use App\Models\Audit;
use App\Models\Document;
use Illuminate\Http\Request;

class CheckedInDocumentController extends Controller
{
    public function store(Request $request)
    {
        $request->file('document')->store('documents');
        Document::create(
            [
                'name' => 'document',
                'filename' => 'document.pdf',
                'checked_in' => true,
            ]
        );

        Audit::create([
            'action' => AuditAction::CHECKED_IN,
            '',
        ]);

        return response()->json([
            'message' => 'Document checked in',
        ]);
    }
}

<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckedOutDocumentException extends Exception
{
    public function render(Request $request): Response
    {
        return response('Document is already checked out', Response::HTTP_BAD_REQUEST);
    }
}

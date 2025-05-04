<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class NotFoundException extends Exception
{
    public function __construct(
        string $message = 'Resource not found',
        int $code = 404
    ) {
        parent::__construct($message, $code);
    }

    public function render(Request $request)
    {
        return response()->json([
            'status' => false,
            'message' => $this->getMessage()
        ], $this->getCode());
    }
}

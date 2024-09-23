<?php

namespace App\Models;

use App\Exceptions\CheckedOutDocumentException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'checked_in' => 'boolean',
        ];
    }

    public static function checkIn(array $document)
    {
        return Document::create(array_merge($document, ['checked_in' => true]));
    }

    public function checkedIn()
    {
        return $this->checked_in;
    }

    public function checkedOut()
    {
        return ! $this->checked_in;
    }

    public function checkOut()
    {
        if ($this->checkedOut()) {
            throw new CheckedOutDocumentException('Document already checked out');
        }
        $this->checked_in = false;
        $this->save();
    }
}

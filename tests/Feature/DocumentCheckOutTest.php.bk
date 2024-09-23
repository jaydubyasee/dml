<?php

use App\Exceptions\CheckedOutDocumentException;
use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a document can be checked out', function () {
    $document = Document::checkIn(
        [
            'name' => fake()->name,
            'filename' => fake()->name,
        ]
    );

    $document->checkOut();

    expect($document->checkedIn())->toBeFalse();
    expect($document->checkedOut())->toBeTrue();
});

test('throws an exception if a checked out document is checked out again', function () {

    $document = Document::checkIn(
        [
            'name' => fake()->name,
            'filename' => fake()->name,
        ]
    );

    $document->checkOut();

    expect($document->checkedOut())->toBeTrue();

    $this->expectException(CheckedOutDocumentException::class);
    $this->expectExceptionMessage('Document already checked out');

    $document->checkOut();
});

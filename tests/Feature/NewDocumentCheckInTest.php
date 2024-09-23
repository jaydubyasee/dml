<?php

use App\Models\Document;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('an authorised user can check in a new document', function () {
    Storage::fake('documents');

    $document = UploadedFile::fake()->create('document.pdf', 100);

    $this->actingAs(User::factory()->create());
    $this->post('/check-in', ['document' => $document]);

    expect(Storage::disk('documents'))->exists('document.pdf');
    expect(Document::first())->toBeInstanceOf(Document::class);
    $doc = Document::first();

    expect($doc->checkedIn())->toBeTrue();
});

test('an unauthorised user cannot check in a new document', function () {
    Storage::fake('documents');

    $document = UploadedFile::fake()->create('document.pdf', 100);

    $response = $this->post('/check-in', ['document' => $document]);
    expect(Storage::disk('documents'))->missing('document.pdf');
    $response->assertRedirect('/login');
});

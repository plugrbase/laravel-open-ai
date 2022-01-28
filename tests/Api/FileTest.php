<?php

namespace Plugrbase\OpenAi\Tests\Feature;

use Plugrbase\OpenAi\Tests\TestCase;
use Rs\JsonLines\JsonLines;

class FileTest extends TestCase
{
    public function test_files_should_return_file_items()
    {
        $files = $this->openAi()->file()->files();
        $this->assertNotEmpty($files);
    }

    public function test_files_upload_should_return_file()
    {
        $data = (new JsonLines())->enline([
            ['text' => 'A cat in a box'],
            ['text' => 'Three dogs walking on the moon'],
        ]);

        $file = $this->openAi()->file()->upload('hello.json', 'search', $data);
        
        $this->assertEquals('uploaded', $file->status);
        $this->assertEquals('hello.json', $file->filename);
    }

    public function test_files_get_should_return_file()
    {
        $data = (new JsonLines())->enline([
            ['text' => 'A cat in a box'],
            ['text' => 'Three dogs walking on the moon'],
        ]);

        $file = $this->openAi()->file()->upload('hello.json', 'search', $data);
        
        $this->assertEquals('uploaded', $file->status);
        $this->assertEquals('hello.json', $file->filename);

        $uploadedFile = $this->openAi()->file()->file($file->id);

        $this->assertEquals('uploaded', $uploadedFile->status);
        $this->assertEquals('hello.json', $uploadedFile->filename);
    }
}

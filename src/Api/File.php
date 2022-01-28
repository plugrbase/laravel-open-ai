<?php

namespace Plugrbase\OpenAi\Api;

use Rs\JsonLines\JsonLines;

class File extends ApiEntity
{
    /**
     * Get the files.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function files()
    {
        return json_decode(
            $this->openAi->get('files')
                ->getBody()
                ->getContents()
        );
    }

    /**
     * Upload a file.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function upload(string $filename, string $purpose, mixed $contents)
    {
        $params = [
            'multipart' => [
                [
                    'Content-type' => 'multipart/form-data',
                    'name' => 'file',
                    'filename' => $filename,
                    'contents' => $contents,
                ],
                [
                    'name' => 'purpose',
                    'contents' => $purpose,
                ]
            ]
        ];

        return json_decode(
            $this->openAi->post('files', $params)
                ->getBody()
                ->getContents()
        );
    }
}

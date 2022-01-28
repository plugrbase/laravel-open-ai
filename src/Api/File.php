<?php

namespace Plugrbase\OpenAi\Api;

use Rs\JsonLines\JsonLines;

class File extends ApiEntity
{
    /**
     * Get a file.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function file(string $id)
    {
        return json_decode(
            $this->openAi->get('files/' . $id)
                ->getBody()
                ->getContents()
        );
    }

    /**
     * Get file content.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function content(string $id)
    {
        return json_decode(
            $this->openAi->get('files/' . $id . '/content')
                ->getBody()
                ->getContents()
        );
    }

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

    /**
     * Delete a file.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $id)
    {
        return json_decode(
            $this->openAi->delete('files/' . $id . '/content')
                ->getBody()
                ->getContents()
        );
    }
}

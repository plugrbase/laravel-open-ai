<?php

namespace Plugrbase\OpenAi\Api;

class Search extends ApiEntity
{
    /**
     * Perform a semantic search.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function make(array $params)
    {
        $data = [
            'headers' => ['content-type' => 'application/json'],
            'body' => json_encode($params)
        ];

        return json_decode(
            $this->openAi->post('engines/' . $this->engine . '/search', $data)
                ->getBody()
                ->getContents()
        );
    }
}

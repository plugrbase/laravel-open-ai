<?php

namespace Plugrbase\OpenAi\Api;

class Embedding extends ApiEntity
{
    /**
     * Create an embedding.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(string $id, array $data)
    {
        return json_decode(
            $this->openAi->post('engines/' . $id . '/embeddings', $data)
                ->getBody()
                ->getContents()
        );
    }
}

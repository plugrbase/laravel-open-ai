<?php

namespace Plugrbase\OpenAi\Api;

class Answer extends ApiEntity
{
    /**
     * Create an answer.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $params)
    {
        $data = [
            'headers' => ['content-type' => 'application/json'],
            'body' => json_encode($params)
        ];

        return json_decode(
            $this->openAi->post('answers', $data)
                ->getBody()
                ->getContents()
        );
    }
}

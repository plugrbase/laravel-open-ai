<?php

namespace Plugrbase\OpenAi\Api;

class Classification extends ApiEntity
{
    /**
     * Perform a classification.
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
            $this->openAi->post('classifications', $data)
                ->getBody()
                ->getContents()
        );
    }
}

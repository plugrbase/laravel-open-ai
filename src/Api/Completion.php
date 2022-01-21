<?php

namespace Plugrbase\OpenAi\Api;

class Completion extends ApiEntity
{
    /**
     * Create a completion.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(string $engine, array $params)
    {
        return json_decode(
            $this->openAi->post('engines/' . $engine . '/completions', $params)
                ->getBody()
                ->getContents()
        );
    }

    /**
     * Complete.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function complete(array $params)
    {
        $data = [
            'headers' => ['content-type' => 'application/json'],
            'body' => json_encode($params)
        ];

        return json_decode(
            $this->openAi->post('engines/' . $this->engine . '/completions', $data)
                ->getBody()
                ->getContents()
        );
    }
}

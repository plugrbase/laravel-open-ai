<?php

namespace Plugrbase\OpenAi\Api;

class FineTune extends ApiEntity
{
    /**
     * Create a fine-tune.
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
            $this->openAi->post('fine-tunes', $data)
                ->getBody()
                ->getContents()
        );
    }

    /**
     * Get the fine-tunes.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fineTunes()
    {
        return json_decode(
            $this->openAi->get('fine-tunes')
                ->getBody()
                ->getContents()
        );
    }

    /**
     * Get a fine-tune.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fineTune(string $id)
    {
        return json_decode(
            $this->openAi->get('fine-tunes/' . $id)
                ->getBody()
                ->getContents()
        );
    }

    /**
     * Cancel a fine-tune.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel(string $id)
    {
        return json_decode(
            $this->openAi->get('fine-tunes/' . $id . '/cancel')
                ->getBody()
                ->getContents()
        );
    }

    /**
     * List fine-tune events.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function events(string $id)
    {
        return json_decode(
            $this->openAi->get('fine-tunes/' . $id . '/events')
                ->getBody()
                ->getContents()
        );
    }
}

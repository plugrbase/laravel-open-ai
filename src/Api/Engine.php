<?php

namespace Plugrbase\OpenAi\Api;

class Engine extends ApiEntity
{
    /**
     * Return the engine items.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function engines()
    {
        return json_decode($this->openAi->get('engines')->getBody()->getContents());
    }

    /**
     * Return a single engine.
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function engine(string $engine)
    {
        return json_decode($this->openAi->get('engines/' . $engine)->getBody()->getContents());
    }
}

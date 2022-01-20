<?php

namespace Plugrbase\OpenAi\Api;

class Engines extends ApiEntity
{
    /**
     * Return the engine items.
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list()
    {
        return json_decode($this->openAi->get('engines')->getBody()->getContents());
    }

    /**
     * Return a single engine.
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($engine)
    {
        return json_decode($this->openAi->get('engines/' . $engine)->getBody()->getContents());
    }
}

<?php

namespace Plugrbase\OpenAi;

use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException as GuzzleConnectException;
use GuzzleHttp\Exception\GuzzleException;
use Plugrbase\OpenAi\Exceptions\AuthorizationException;
use Plugrbase\OpenAi\Exceptions\ConflictException;
use Plugrbase\OpenAi\Exceptions\ConnectException;
use Plugrbase\OpenAi\Exceptions\FailedActionException;
use Plugrbase\OpenAi\Exceptions\NotFoundException;
use Plugrbase\OpenAi\Exceptions\RequestException;
use Plugrbase\OpenAi\Exceptions\ValidationException;
use Psr\Http\Message\ResponseInterface;

trait Request
{
    /**
     * Make a GET request and return the response.
     *
     * @return bool|string|void
     */
    public function get(string $uri, mixed $data = [])
    {
        return $this->request('get', $uri, [], $data);
    }

    /**
     * Make a POST request and return the response.
     *
     * @return bool|string|void
     */
    public function post(string $uri, mixed $data = [])
    {
        return $this->request('post', $uri, $data);
    }

    /**
     * Make a DELETE request and return the response.
     *
     * @return bool|string|void
     */
    public function delete(string $uri, mixed $data = [])
    {
        return $this->request('delete', $uri, $data);
    }

    /**
     * Make request to API and return response.
     *
     * @return object
     */
    public function request(string $method, string $uri, array $data = [])
    {
        try {
            return $this->guzzle->request($method, $uri, $data);
        } catch (ClientException $e) {
            return $this->handleRequestError($e->getResponse());
        } catch (GuzzleException $e) {
            throw new RequestException($e);
        } catch (GuzzleConnectException $e) {
            throw new ConnectException($e);
        }
    }

    /**
     * Handle request errors.
     *
     * @param  \Psr\Http\Message\ResponseInterface  $response
     * @return void
     *
     * @throws \Exception
     * @throws \Plugrbase\OpenAi\Exceptions\AuthorizationException
     * @throws \Plugrbase\OpenAi\Exceptions\ConflictException
     * @throws \Plugrbase\OpenAi\Exceptions\FailedActionException
     * @throws \Plugrbase\OpenAi\Exceptions\NotFoundException
     * @throws \Plugrbase\OpenAi\Exceptions\ValidationException
     */
    protected function handleRequestError(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 400) {
            throw new FailedActionException((string) $response->getBody());
        }

        if ($response->getStatusCode() == 401) {
            throw new AuthorizationException();
        }

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException();
        }

        if ($response->getStatusCode() == 409) {
            throw new ConflictException();
        }

        if ($response->getStatusCode() == 422) {
            throw new ValidationException(json_decode((string) $response->getBody(), true));
        }

        throw new Exception((string) $response->getBody());
    }
}

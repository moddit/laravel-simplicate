<?php

namespace Moddit\Simplicate\Services;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Contracts\Services\SimplicateClientInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Arr;
use \GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class SimplicateClient implements SimplicateClientInterface
{

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string|null
     */
    protected $authenticationKey;

    /**
     * @var string|null
     */
    protected $authenticationSecret;

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var array
     */
    protected $filter = [];

    /**
     * @var string|null
     */
    protected $sort;

    /**
     * @var string|null
     */
    protected $metadata = 'count,limit,total_count,offset';

    /**
     * @var bool
     */
    protected $sortDescending = false;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * The response class to cast the result as.
     *
     * @var string|null
     */
    protected $responseClass;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new Client([  // Set the guzzle client
            'base_uri' => config('simplicate.api.domain'),
            'timeout'  => 2.0,
            'headers'        => [
                'Content-Type' => 'application/json'
            ],
        ]);

        $this->setAuthentication();
    }

    public function setAuthentication(): SimplicateClientInterface
    {
        $this->authenticationKey    = config('simplicate.api.key');
        $this->authenticationSecret = config('simplicate.api.secret');

        return $this;
    }

    /**
     * @param int $offset
     * @return $this
     */
    public function offset(int $offset): SimplicateClientInterface
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit): SimplicateClientInterface
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @param array $filter
     * @return $this
     */
    public function filter(array $filter): SimplicateClientInterface
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @param string $sort
     * @return $this
     */
    public function sort(string $sort): SimplicateClientInterface
    {
        $this->sort = trim($sort);

        if (starts_with($sort, '-')) {
            $this->sortDescending = true;
            $this->sort           = substr($sort, 1);
        }

        return $this;
    }

    /**
     * @param string $metadata
     * @return $this
     */
    public function metadata(string $metadata): SimplicateClientInterface
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Sort next call in descending order.
     *
     * @return $this
     */
    public function descending(): SimplicateClientInterface
    {
        $this->sortDescending = true;

        return $this;
    }

    public function get(string $path): SimplicateResponseInterface
    {
        return $this->call('GET', $path);
    }

    public function post(string $path, array $body): SimplicateResponseInterface
    {
        return $this->call('POST', $path, $body);
    }

    public function put(string $path, array $body): SimplicateResponseInterface
    {
        return $this->call('PUT', $path, $body);
    }

    public function delete(string $path): SimplicateResponseInterface
    {
        return $this->call('DELETE', $path);
    }

    /**
     * @param string $class
     * @return $this
     */
    public function responseClass(string $class): SimplicateClientInterface
    {
        $this->responseClass = $class;

        return $this;
    }


    protected function call(string $method, $path, array $body = null)
    {
        $options = $this->addAuthenticationToOptions($this->options);

        if ($body !== null) {
            $options['body'] = json_encode($body);
        }

        $options['query'] = $this->collectQueryParameters();

        try {
            $response = $this->client->request($method, $path, $options);
        } catch (GuzzleException $e) {
            $this->resetFluentState();

            // todo
            throw $e;
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 && $statusCode >= 300) {
            // todo
            // problem response (might have plaintext contents)

            $this->resetFluentState();

            throw new \Exception('Service error ' . $statusCode);
        }

        if ($this->responseClass === null) {

            $this->resetFluentState();

            return $response->getBody()->getContents();
        }

        $this->resetFluentState();

        return $this->makeResponse($response);
    }

    protected function collectQueryParameters(): array
    {
        $query = [];

        if ($this->offset > 0) {
            $query['offset'] = $this->offset;
        }

        if ($this->limit > 0) {
            $query['limit'] = $this->limit;
        }

        if ($this->sort) {
            $query['sort'] = ($this->sortDescending ? '-' : '') . $this->sort;
        }

        if ($this->metadata) {
            $query['metadata'] = $this->metadata;
        }

        if ( ! empty($this->filter)) {
            $query['q'] = $this->filter;
        }

        return $query;
    }

    protected function makeResponse(ResponseInterface $response): SimplicateResponseInterface
    {
        // The response should be JSON.
        try {
            $responseArray = json_decode($response->getBody()->getContents(), true);
        } catch (\Throwable $e) {
            // todo
            // error handling
            $responseArray = [];
        }

        $class = $this->responseClass;

        return new $class(
            Arr::get($responseArray,'metadata'),
            Arr::get($responseArray,'data'),
            Arr::get($responseArray,'errors'),
            Arr::get($responseArray,'debug'),
        );
    }

    /**
     * Adds authentication key and secret to the guzzle options, where possible.
     *
     * @param array $options
     * @return array
     */
    protected function addAuthenticationToOptions(array $options): array
    {
        if (null !== $this->authenticationKey && null !== $this->authenticationSecret) {
            Arr::set($options, 'headers.Authentication-Key', $this->authenticationKey);
            Arr::set($options, 'headers.Authentication-Secret', $this->authenticationSecret);
        }

        return $options;
    }

    /**
     * Resets the fluent-set state in preparation for the next call.
     */
    protected function resetFluentState(): void
    {
        $this->offset         = 0;
        $this->limit          = null;
        $this->filter         = [];
        $this->sort           = null;
        $this->metadata       = null;
        $this->sortDescending = false;
        $this->options        = [];
    }
}

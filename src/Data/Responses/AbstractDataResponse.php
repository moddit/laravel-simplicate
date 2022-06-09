<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Data\AbstractDataObject;
use Illuminate\Contracts\Support\Arrayable;

abstract class AbstractDataResponse extends AbstractDataObject implements SimplicateResponseInterface
{

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var array|null
     */
    protected $errors;

    /**
     * @var string|null
     */
    protected $debug;

    /**
     * @var int
     */
    protected $statusCode;
    
    /**
     * @var array|null
     */
    protected $metadata;


    public function __construct(?array $metadata, $data, ?array $errors = null, ?string $debug = null, int $statusCode = 200)
    {
        $this->metadata   = $metadata;
        $this->errors     = $errors;
        $this->debug      = $debug;
        $this->statusCode = $statusCode;

        $this->setData($data);
    }

    abstract protected function setData($data);

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function getErrors(): ?array
    {
        return $this->errors;
    }

    public function getDebug(): ?string
    {
        return $this->debug;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function toArray()
    {
        $data = $this->getData();

        return [
            'data'   => ($data instanceof Arrayable) ? $data->toArray() : $data,
            'errors' => $this->getErrors(),
            'debug'  => $this->getDebug(),
            'metadata' => $this->getMetadata()
        ];
    }
    
}

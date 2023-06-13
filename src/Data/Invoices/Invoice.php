<?php

namespace Moddit\Simplicate\Data\Project;

use Carbon\Carbon;
use Moddit\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class Invoice extends AbstractDataObject
{
    /**
     * @var string
     */
    protected $id;

    public function __construct(array $data)
    {
        $this->id = Arr::get($data, 'id');
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
        ];
    }
}

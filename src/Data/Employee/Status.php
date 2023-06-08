<?php

namespace Moddit\Simplicate\Data\Employee;

use Moddit\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class Status extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $label;


    public function __construct(array $data)
    {
        $this->id    = Arr::get($data, 'id');
        $this->label = Arr::get($data, 'label');
    }


    public function getId(): string
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function toArray(): array
    {
        return [
            'id'    => $this->getId(),
            'label' => $this->getLabel(),
        ];
    }

}

<?php

namespace Czim\Simplicate\Data\Leave;

use Czim\Simplicate\Data\AbstractDataObject;

class LeaveTypeReference extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var bool
     */
    protected $affectsBalance;


    public function __construct(array $data)
    {
        $this->id             = array_get($data, 'id');
        $this->label          = array_get($data, 'label');
        $this->affectsBalance = (bool) array_get($data, 'affects_balance', false);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getAffectsBalance(): bool
    {
        return $this->affectsBalance;
    }

    public function toArray(): array
    {
        return [
            'id'              => $this->getId(),
            'label'           => $this->getLabel(),
            'affects_balance' => $this->getAffectsBalance(),
        ];
    }

}

<?php

namespace Moddit\Simplicate\Data\Service;

use Carbon\Carbon;
use Moddit\Simplicate\Data\AbstractDataObject;
use Moddit\Simplicate\Data\Hours\VatClass;
use Illuminate\Support\Arr;

class DefaultService extends AbstractDataObject
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var VatClass|null
     */
    protected $vatClass;

    /**
     * @var Carbon|null
     */
    protected $createdAt;

    /**
     * @var Carbon|null
     */
    protected $updatedAt;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var float|null
     */
    protected $rate;

    public function __construct(array $data)
    {
        $this->id                    = Arr::get($data, 'id');
        $this->vatClass              = new VatClass(Arr::get($data, 'vat_class'));
        $this->createdAt             = $this->castStringAsDate(Arr::get($data, 'created_at'));
        $this->updatedAt             = $this->castStringAsDate(Arr::get($data, 'updated_at'));
        $this->name                  = Arr::get($data, 'name');
        $this->rate                  = Arr::get($data, 'price');
    }


    public function getId(): ?string
    {
        return $this->id;
    }

    public function getVatClass(): ?VatClass
    {
        return $this->vatClass;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function toArray(): array
    {
        return [
            'id'                      => $this->getId(),
            'vat_class'               => $this->getVatClass()->toArray(),
            'created_at'              => $this->formatDate($this->getCreatedAt()),
            'updated_at'              => $this->formatDate($this->getUpdatedAt()),
            'name'                    => $this->getName(),
            'rate'                    => $this->getRate()
        ];
    }

}

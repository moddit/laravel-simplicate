<?php

namespace Moddit\Simplicate\Data\Project;

use Carbon\Carbon;
use Moddit\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class Project extends AbstractDataObject
{

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var Carbon|null
     */
    protected $endDate;

    /**
     * @var Carbon|null
     */
    protected $startDate;

    /**
     * @var int|null
     */
    protected $budget;

    /**
     * @var OrganizationReference|null
     */
    protected $organization;


    public function __construct(array $data)
    {
        $this->id           = Arr::get($data, 'id');
        $this->name         = Arr::get($data, 'name');
        $this->organization = new OrganizationReference(Arr::get($data, 'organization', []));
        $this->endDate      = $this->castStringAsDate(Arr::get($data, 'end_date'));
        $this->startDate    = $this->castStringAsDate(Arr::get($data, 'start_date'));
        $this->budget       = Arr::get($data, 'budget.hours.value_budget');
    }


    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getStartDate(): ?Carbon
    {
        return $this->startDate;
    }

    public function getEndDate(): ?Carbon
    {
        return $this->endDate;
    }

    public function getOrganization(): ?OrganizationReference
    {
        return $this->organization;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function toArray(): array
    {
        $array = [
            'id'         => $this->getId(),
            'name'       => $this->getName(),
            'start_date' => $this->formatDateOnly($this->getStartDate()),
            'end_date'   => $this->formatDateOnly($this->getEndDate()),
            'budget'      => $this->getBudget(),
        ];

        if ($this->organization) {
            $array['organization'] = $this->organization->toArray();
        }

        return $array;
    }
}

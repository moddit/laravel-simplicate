<?php

namespace Moddit\Simplicate\Data\TimeTable;

use Carbon\Carbon;
use Moddit\Simplicate\Data\AbstractDataObject;
use Moddit\Simplicate\Data\Employee\EmployeeReference;
use Illuminate\Support\Arr;

class TimeTable extends AbstractDataObject
{

    /**
     * @var EmployeeReference
     */
    protected $employee;

    /**
     * @var float
     */
    protected $hourlySalesTariff;

    /**
     * @var float
     */
    protected $hourlyCostTariff;

    /**
     * @var TimeTableWeek
     */
    protected $evenWeek;

    /**
     * @var TimeTableWeek
     */
    protected $oddWeek;

    /**
     * @var Carbon|null
     */
    protected $startDate;

    /**
     * @var Carbon|null
     */
    protected $endDate;



    public function __construct(array $data)
    {
        $this->employee          = new EmployeeReference(Arr::get($data, 'employee', []));
        $this->hourlySalesTariff = (float) Arr::get($data, 'hourly_sales_tariff');
        $this->hourlyCostTariff  = (float) Arr::get($data, 'hourly_cost_tariff');
        $this->evenWeek          = new TimeTableWeek(Arr::get($data, 'even_week', []));
        $this->oddWeek           = new TimeTableWeek(Arr::get($data, 'odd_week', []));
        $this->startDate         = $this->castStringAsDate(Arr::get($data, 'start_date'));
        $this->endDate           = $this->castStringAsDate(Arr::get($data, 'end_date'));
    }


    public function getEmployee(): EmployeeReference
    {
        return $this->employee;
    }

    public function getHourlySalesTariff(): float
    {
        return $this->hourlySalesTariff;
    }

    public function getHourlyCostTariff(): float
    {
        return $this->hourlyCostTariff;
    }

    public function getEvenWeek(): TimeTableWeek
    {
        return $this->evenWeek;
    }

    public function getOddWeek(): TimeTableWeek
    {
        return $this->oddWeek;
    }

    public function getStartDate(): ?Carbon
    {
        return $this->startDate;
    }

    public function getEndDate(): ?Carbon
    {
        return $this->endDate;
    }


    public function toArray(): array
    {
        return [
            'employee'            => $this->getEmployee()->toArray(),
            'hourly_sales_tariff' => $this->getHourlySalesTariff(),
            'hourly_cost_tariff'  => $this->getHourlyCostTariff(),
            'even_week'           => $this->getEvenWeek()->toArray(),
            'odd_week'            => $this->getOddWeek()->toArray(),
            'start_date'          => $this->formatDate($this->getStartDate()),
            'end_date'            => $this->formatDate($this->getEndDate()),
        ];
    }

}

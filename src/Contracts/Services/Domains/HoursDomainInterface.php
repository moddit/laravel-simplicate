<?php

namespace Moddit\Simplicate\Contracts\Services\Domains;

use Moddit\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Moddit\Simplicate\Data\Responses\HoursListResponse;
use Moddit\Simplicate\Data\Responses\HoursSingleResponse;
use Moddit\Simplicate\Data\Responses\HoursTypeListResponse;
use Moddit\Simplicate\Data\Responses\HoursTypeSingleResponse;

interface HoursDomainInterface extends SimplicateDomainInterface
{

    public function allHours(): HoursListResponse;

    public function hours(string $id): HoursSingleResponse;

    public function allHoursTypes(): HoursTypeListResponse;

    public function hoursType(string $id): HoursTypeSingleResponse;

}

<?php

namespace Moddit\Simplicate\Contracts\Services\Domains;

use Moddit\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Moddit\Simplicate\Data\Responses\ServiceSingleResponse;
use Moddit\Simplicate\Data\Responses\ServicesListResponse;

interface ProjectsDomainInterface extends SimplicateDomainInterface
{

    public function allServices(): ServicesListResponse;

    public function service(string $id): ServiceSingleResponse;

}

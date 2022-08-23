<?php

namespace Moddit\Simplicate\Contracts\Services\Domains;

use Moddit\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Moddit\Simplicate\Data\Responses\DefaulServicesListResponse;

interface ServicesDomainInterface extends SimplicateDomainInterface
{
    public function default(): DefaulServicesListResponse;
}

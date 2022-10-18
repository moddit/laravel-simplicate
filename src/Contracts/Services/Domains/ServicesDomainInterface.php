<?php

namespace Moddit\Simplicate\Contracts\Services\Domains;

use Moddit\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Moddit\Simplicate\Data\Responses\DefaulServicesListResponse;
use Moddit\Simplicate\Data\Responses\DefaultServiceSingleResponse;

interface ServicesDomainInterface extends SimplicateDomainInterface
{
    public function default(): DefaulServicesListResponse;

    public function update(string $id, array $body): DefaultServiceSingleResponse;
}

<?php

namespace Moddit\Simplicate\Services\Domains;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Contracts\Services\Domains\ServicesDomainInterface;
use Moddit\Simplicate\Data\Responses\DefaulServicesListResponse;

class ServicesDomain extends AbstractDomain implements ServicesDomainInterface
{
    /**
     * @return string
     */
    public function path(): string
    {
        return 'services';
    }

    /**
     * @return SimplicateResponseInterface|DefaulServicesListResponse
     */
    public function default(): DefaulServicesListResponse
    {
        return $this->client->responseClass(DefaulServicesListResponse::class)
            ->get($this->prefixPath('defaultservice'));
    }
}

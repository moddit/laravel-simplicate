<?php

namespace Moddit\Simplicate\Services\Domains;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Contracts\Services\Domains\ServicesDomainInterface;
use Moddit\Simplicate\Data\Responses\DefaulServicesListResponse;
use Moddit\Simplicate\Data\Responses\DefaultServiceSingleResponse;

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
     * Retrieve all default services
     * 
     * @return SimplicateResponseInterface|DefaulServicesListResponse
     */
    public function default(): DefaulServicesListResponse
    {
        return $this->client->responseClass(DefaulServicesListResponse::class)
            ->get($this->prefixPath('defaultservice'));
    }

    /**
     * Update default service
     *
     * @return SimplicateResponseInterface|DefaultServiceSingleResponse
     */
    public function update(string $id, array $body): DefaultServiceSingleResponse
    {
        return $this->client->responseClass(DefaultServiceSingleResponse::class)
            ->put($this->prefixPath('defaultservice/' . $id), $body);
    }
}

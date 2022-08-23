<?php

namespace Moddit\Simplicate\Services\Domains;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Contracts\Services\Domains\ProjectsDomainInterface;
use Moddit\Simplicate\Data\Responses\ProjectsListResponse;
use Moddit\Simplicate\Data\Responses\ServiceSingleResponse;
use Moddit\Simplicate\Data\Responses\ServicesListResponse;

class ProjectsDomain extends AbstractDomain implements ProjectsDomainInterface
{

    /**
     * @return string
     */
    public function path(): string
    {
        return 'projects';
    }

    /**
     * @return SimplicateResponseInterface|ServicesListResponse
     */
    public function all(): ProjectsListResponse
    {
        return $this->client->responseClass(ProjectsListResponse::class)
            ->get($this->prefixPath('project'));
    }

    /**
     * @return SimplicateResponseInterface|ServicesListResponse
     */
    public function allServices(): ServicesListResponse
    {
        return $this->client->responseClass(ServicesListResponse::class)
            ->get($this->prefixPath('service'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|ServiceSingleResponse
     */
    public function service(string $id): ServiceSingleResponse
    {
        return $this->client->responseClass(ServiceSingleResponse::class)
            ->get($this->prefixPath('service/' . $id));
    }

}

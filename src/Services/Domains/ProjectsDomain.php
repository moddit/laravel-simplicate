<?php

namespace Moddit\Simplicate\Services\Domains;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Contracts\Services\Domains\ProjectsDomainInterface;
use Moddit\Simplicate\Data\Responses\ProjectSingleResponse;
use Moddit\Simplicate\Data\Responses\ProjectsListResponse;
use Moddit\Simplicate\Data\Responses\ServiceDeleteResponse;
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
     * Create a new project
     *
     * @param array $body
     * @return SimplicateResponseInterface|ProjectSingleResponse
     */
    public function create(array $body): ProjectSingleResponse
    {
        return $this->client->responseClass(ProjectSingleResponse::class)
            ->post($this->prefixPath('project'), $body);
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

    /**
     * Create a new service on a project
     *
     * @param string $id
     * @return SimplicateResponseInterface|ServiceSingleResponse
     */
    public function createService(array $body): ServiceSingleResponse
    {        
        return $this->client->responseClass(ServiceSingleResponse::class)
            ->post($this->prefixPath('service'), $body);
    }

        /**
     * Create a new service on a project
     *
     * @param array $body
     * @return SimplicateResponseInterface|ServiceDeleteResponse
     */
    public function deleteService(string $id): ServiceDeleteResponse
    {        
        return $this->client->responseClass(ServiceDeleteResponse::class)
            ->delete($this->prefixPath('service/' . $id));
    }

    /**
     * Create a new service on a project
     *
     * @param array $body
     * @return SimplicateResponseInterface|ServiceSingleResponse
     */
    public function updateService(string $id, array $body): ServiceSingleResponse
    {        
        return $this->client->responseClass(ServiceSingleResponse::class)
            ->put($this->prefixPath('service/' . $id), $body);
    }
}

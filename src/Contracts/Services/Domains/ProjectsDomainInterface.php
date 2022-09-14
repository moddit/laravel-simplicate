<?php

namespace Moddit\Simplicate\Contracts\Services\Domains;

use Moddit\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Moddit\Simplicate\Data\Responses\ProjectSingleResponse;
use Moddit\Simplicate\Data\Responses\ProjectsListResponse;
use Moddit\Simplicate\Data\Responses\ServiceDeleteResponse;
use Moddit\Simplicate\Data\Responses\ServiceSingleResponse;
use Moddit\Simplicate\Data\Responses\ServicesListResponse;

interface ProjectsDomainInterface extends SimplicateDomainInterface
{
    public function all(): ProjectsListResponse;

    public function create(array $body): ProjectSingleResponse;

    public function allServices(): ServicesListResponse;

    public function service(string $id): ServiceSingleResponse;

    public function createService(array $body): ServiceSingleResponse;

    public function deleteService(string $id): ServiceDeleteResponse;

    public function updateService(string $id): ServiceSingleResponse;
}

<?php

namespace Moddit\Simplicate\Services\Domains;

use Moddit\Simplicate\Contracts\Services\Domains\CrmDomainInterface;
use Moddit\Simplicate\Data\Responses\OrganisationListResponse;
use Moddit\Simplicate\Data\Responses\OrganisationSingleResponse;
use Moddit\Simplicate\Data\Responses\PersonListResponse;
use Moddit\Simplicate\Data\Responses\PersonSingleResponse;
use Moddit\Simplicate\Data\Responses\ContactPersonListResponse;
use Moddit\Simplicate\Data\Responses\ContactPersonSingleResponse;

class CrmDomain extends AbstractDomain implements CrmDomainInterface
{
    public function path(): string
    {
        return 'crm';
    }

    public function allPersons(): PersonListResponse
    {
        return $this->client->responseClass(PersonListResponse::class)
            ->get($this->prefixPath('person'));
    }

    public function person(string $id): PersonSingleResponse
    {
        return $this->client->responseClass(PersonSingleResponse::class)
            ->get($this->prefixPath('person/'.$id));
    }

    public function allContactPersons(): ContactPersonListResponse
    {
        return $this->client->responseClass(ContactPersonListResponse::class)
            ->get($this->prefixPath('contactperson'));
    }

    public function contactPerson(string $id): ContactPersonSingleResponse
    {
        return $this->client->responseClass(ContactPersonSingleResponse::class)
            ->get($this->prefixPath('contactperson/'.$id));
    }

    public function allOrganisations(): OrganisationListResponse
    {
        return $this->client->responseClass(OrganisationListResponse::class)
            ->get($this->prefixPath('organization'));
    }

    public function organisation(string $id): OrganisationSingleResponse
    {
        return $this->client->responseClass(OrganisationSingleResponse::class)
            ->get($this->prefixPath('organization/'.$id));
    }
}
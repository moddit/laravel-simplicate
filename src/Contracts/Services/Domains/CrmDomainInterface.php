<?php

namespace Moddit\Simplicate\Contracts\Services\Domains;

use Moddit\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Moddit\Simplicate\Data\Responses\ContactPersonListResponse;
use Moddit\Simplicate\Data\Responses\ContactPersonSingleResponse;
use Moddit\Simplicate\Data\Responses\OrganisationListResponse;
use Moddit\Simplicate\Data\Responses\OrganisationSingleResponse;
use Moddit\Simplicate\Data\Responses\PersonListResponse;
use Moddit\Simplicate\Data\Responses\PersonSingleResponse;

interface CrmDomainInterface extends SimplicateDomainInterface
{
    public function allPersons(): PersonListResponse;

    public function person(string $id): PersonSingleResponse;

    public function allContactPersons(): ContactPersonListResponse;

    public function contactPerson(string $id): ContactPersonSingleResponse;
    
    public function updatePerson(string $id, array $body): PersonSingleResponse;

    public function allOrganisations(): OrganisationListResponse;

    public function organisation(string $id): OrganisationSingleResponse;

    public function updateOrganisation(string $id, array $body): OrganisationSingleResponse;

    public function createOrganisation(array $body): OrganisationSingleResponse;
}
<?php

namespace Moddit\Simplicate\Contracts\Services;

interface SimplicateServiceInterface
{

    public function setAuthentication(string $key, string $secret): SimplicateServiceInterface;

    public function hours(): Domains\HoursDomainInterface;

    public function hrm(): Domains\HrmDomainInterface;

    public function crm(): Domains\CrmDomainInterface;

    public function projects(): Domains\ProjectsDomainInterface;

    public function services(): Domains\ServicesDomainInterface;
}

<?php

namespace Moddit\Simplicate\Services;

use Moddit\Simplicate\Contracts\Services\Domains;
use Moddit\Simplicate\Contracts\Services\SimplicateClientInterface;
use Moddit\Simplicate\Contracts\Services\SimplicateServiceInterface;
use Moddit\Simplicate\Services\Domains\HoursDomain;
use Moddit\Simplicate\Services\Domains\HrmDomain;
use Moddit\Simplicate\Services\Domains\ProjectsDomain;
use Moddit\Simplicate\Services\Domains\CrmDomain;
use Moddit\Simplicate\Services\Domains\InvoicesDomain;
use Moddit\Simplicate\Services\Domains\ServicesDomain;

class SimplicateService implements SimplicateServiceInterface
{

    /**
     * @var SimplicateClientInterface
     */
    protected $client;

    /**
     * @var Domains\HoursDomainInterface
     */
    protected $hours;

    /**
     * @var Domains\HrmDomainInterface
     */
    protected $hrm;

    /**
     * @var Domains\ProjectsDomainInterface
     */
    protected $projects;

    /**
     * @var Domains\InvoicesDomainInterface
     */
    protected $invoices;


    public function __construct()
    {
        $this->client = new SimplicateClient;

        $this->hours    = new HoursDomain($this->client);
        $this->hrm      = new HrmDomain($this->client);
        $this->projects = new ProjectsDomain($this->client);
        $this->crm      = new CrmDomain($this->client);
        $this->services = new ServicesDomain($this->client);
        $this->invoices = new InvoicesDomain($this->client);
    }

    public function setAuthentication(string $key, string $secret): SimplicateServiceInterface
    {
        $this->client->setAuthentication($key, $secret);

        return $this;
    }

    public function hours(): Domains\HoursDomainInterface
    {
        return $this->hours;
    }

    public function hrm(): Domains\HrmDomainInterface
    {
        return $this->hrm;
    }

    public function projects(): Domains\ProjectsDomainInterface
    {
        return $this->projects;
    }

    public function crm(): Domains\CrmDomainInterface
    {
        return $this->crm;
    }

    public function services(): Domains\ServicesDomainInterface
    {
        return $this->services;
    }

    public function invoices(): Domains\InvoicesDomainInterface
    {
        return $this->invoices;
    }
}

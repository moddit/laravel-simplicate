<?php

namespace Moddit\Simplicate\Services\Domains;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Contracts\Services\Domains\InvoicesDomainInterface;
use Moddit\Simplicate\Data\Responses\InvoicesListResponse;

class InvoicesDomain extends AbstractDomain implements InvoicesDomainInterface
{
    /**
     * @return string
     */
    public function path(): string
    {
        return 'invoices';
    }

    /**
     * Retrieve all invoices
     * 
     * @return SimplicateResponseInterface|InvoicesListResponse
     */
    public function all(): InvoicesListResponse
    {
        return $this->client->responseClass(InvoicesListResponse::class)
            ->get($this->prefixPath('invoice'));
    }
}

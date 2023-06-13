<?php

namespace Moddit\Simplicate\Contracts\Services\Domains;

use Moddit\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Moddit\Simplicate\Data\Responses\InvoicesListResponse;

interface InvoicesDomainInterface extends SimplicateDomainInterface
{
    public function all(): InvoicesListResponse;
}

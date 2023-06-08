<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Invoices\Invoice;
use Illuminate\Support\Collection;

/**
 * Class InvoicesListResponse
 *
 * @method Collection|Service[] getData()
 */
class InvoicesListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Invoice($item);
                },
                $data
            )
        );
    }
}

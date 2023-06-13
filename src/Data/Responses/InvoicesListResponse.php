<?php

namespace Moddit\Simplicate\Data\Responses;

use Illuminate\Support\Collection;
use Moddit\Simplicate\Data\Project\Invoice;

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

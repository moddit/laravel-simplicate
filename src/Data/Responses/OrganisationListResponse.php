<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Data\Crm\Organisation;
use Illuminate\Support\Collection;

/**
 * Class OrganisationListResponse
 *
 * @method Collection|Organisation[] getData()
 */
class OrganisationListResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                fn(array $item) => new Organisation($item),
                $data
            )
        );
    }
}
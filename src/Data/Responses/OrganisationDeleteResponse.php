<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;

/**
 * Class OrganisationDeleteResponse
 *
 * @method getData()
 */
class OrganisationDeleteResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = $data;
    }
}
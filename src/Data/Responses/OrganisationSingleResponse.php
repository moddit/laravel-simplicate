<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Data\Crm\Organisation;

/**
 * Class OrganisationSingleResponse
 *
 * @method Organisation() getData()
 */
class OrganisationSingleResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = new Organisation($data);
    }
}
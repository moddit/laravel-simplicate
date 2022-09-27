<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;

/**
 * Class PersonDeleteResponse
 *
 * @method getData()
 */
class PersonDeleteResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = $data;
    }
}
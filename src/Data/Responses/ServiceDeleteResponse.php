<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;

/**
 * Class ServiceDeleteResponse
 *
 * @method getData()
 */
class ServiceDeleteResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = $data;
    }
}
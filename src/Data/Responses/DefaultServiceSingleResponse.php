<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Service\DefaultService;

/**
 * Class DefaultServiceSingleResponse
 *
 * @method DefaultService setData()
 */
class DefaultServiceSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new DefaultService($data);
    }

}

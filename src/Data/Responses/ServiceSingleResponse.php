<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Project\Service;

/**
 * Class ServiceSingleResponse
 *
 * @method Service() getData()
 */
class ServiceSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Service($data);
    }

}

<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Hours\Hours;

/**
 * Class HoursSingleResponse
 *
 * @method Hours getData()
 */
class HoursSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Hours($data);
    }

}

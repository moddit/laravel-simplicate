<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Leave\Leave;

/**
 * Class LeaveSingleResponse
 *
 * @method Leave getData()
 */
class LeaveSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Leave($data);
    }

}

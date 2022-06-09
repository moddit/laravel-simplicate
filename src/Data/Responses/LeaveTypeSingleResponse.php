<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Leave\LeaveType;

/**
 * Class LeaveTypeSingleResponse
 *
 * @method LeaveType getData()
 */
class LeaveTypeSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new LeaveType($data);
    }

}

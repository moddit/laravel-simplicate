<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Leave\LeaveType;
use Illuminate\Support\Collection;

/**
 * Class LeaveTypeListResponse
 *
 * @method Collection|LeaveType[] getData()
 */
class LeaveTypeListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new LeaveType($item);
                },
                $data
            )
        );
    }

}

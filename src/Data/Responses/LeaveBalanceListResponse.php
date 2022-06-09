<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Leave\LeaveBalance;
use Illuminate\Support\Collection;

/**
 * Class LeaveBalanceListResponse
 *
 * @method Collection|LeaveBalance[] getData()
 */
class LeaveBalanceListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new LeaveBalance($item);
                },
                $data
            )
        );
    }

}

<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Employee\Team;
use Illuminate\Support\Collection;

/**
 * Class TeamListResponse
 *
 * @method Collection|Team[] getData()
 */
class TeamListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Team($item);
                },
                $data
            )
        );
    }

}

<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Project\Service;
use Illuminate\Support\Collection;
use Moddit\Simplicate\Data\Service\DefaultService;

/**
 * Class DefaulServicesListResponse
 *
 * @method Collection|Service[] getData()
 */
class DefaulServicesListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new DefaultService($item);
                },
                $data
            )
        );
    }

}

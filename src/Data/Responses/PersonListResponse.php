<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Data\Employee\Person;
use Illuminate\Support\Collection;

/**
 * Class PersonListResponse
 *
 * @method Collection|Person[] getData()
 */
class PersonListResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Person($item);
                },
                $data
            )
        );
    }
}
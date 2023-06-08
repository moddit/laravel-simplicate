<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Data\Crm\ContactPerson;
use Illuminate\Support\Collection;

/**
 * Class ContactPersonListResponse
 *
 * @method Collection|ContactPerson[] getData()
 */
class ContactPersonListResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new ContactPerson($item);
                },
                $data
            )
        );
    }
}
<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Data\Employee\Person;

/**
 * Class PersonSingleResponse
 *
 * @method Person() getData()
 */
class PersonSingleResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = new Person($data);
    }
}
<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Data\Crm\ContactPerson;

/**
 * Class ContactPersonSingleResponse
 *
 * @method ContactPerson() getData()
 */
class ContactPersonSingleResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = new ContactPerson($data);
    }
}
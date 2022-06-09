<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Employee\Type;

/**
 * Class EmployeeTypeSingleResponse
 *
 * @method Type getData()
 */
class EmployeeTypeSingleResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Type($data);
    }

}

<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Data\Project\Project;

/**
 * Class OrganisationSingleResponse
 *
 * @method Organisation() getData()
 */
class ProjectSingleResponse extends AbstractDataResponse implements SimplicateResponseInterface
{
    protected function setData($data)
    {
        $this->data = new Project($data);
    }
}
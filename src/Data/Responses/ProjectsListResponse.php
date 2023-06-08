<?php

namespace Moddit\Simplicate\Data\Responses;

use Moddit\Simplicate\Data\Project\Project;
use Illuminate\Support\Collection;

/**
 * Class ServicesListResponse
 *
 * @method Collection|Service[] getData()
 */
class ProjectsListResponse extends AbstractDataResponse
{

    protected function setData($data)
    {
        $this->data = new Collection(
            array_map(
                function (array $item) {
                    return new Project($item);
                },
                $data
            )
        );
    }

}

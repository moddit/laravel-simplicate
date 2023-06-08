<?php

namespace Moddit\Simplicate\Services\Domains;

use Moddit\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Moddit\Simplicate\Contracts\Services\Domains\HrmDomainInterface;
use Moddit\Simplicate\Data\Responses\EmployeeListResponse;
use Moddit\Simplicate\Data\Responses\EmployeeSingleResponse;
use Moddit\Simplicate\Data\Responses\EmployeeTypeListResponse;
use Moddit\Simplicate\Data\Responses\EmployeeTypeSingleResponse;
use Moddit\Simplicate\Data\Responses\EmploymentTypeListResponse;
use Moddit\Simplicate\Data\Responses\EmploymentTypeSingleResponse;
use Moddit\Simplicate\Data\Responses\LeaveBalanceListResponse;
use Moddit\Simplicate\Data\Responses\LeaveListResponse;
use Moddit\Simplicate\Data\Responses\LeaveSingleResponse;
use Moddit\Simplicate\Data\Responses\LeaveTypeListResponse;
use Moddit\Simplicate\Data\Responses\LeaveTypeSingleResponse;
use Moddit\Simplicate\Data\Responses\TeamListResponse;
use Moddit\Simplicate\Data\Responses\TeamSingleResponse;
use Moddit\Simplicate\Data\Responses\TimeTableListResponse;

class HrmDomain extends AbstractDomain implements HrmDomainInterface
{

    /**
     * @return string
     */
    public function path(): string
    {
        return 'hrm';
    }

    /**
     * @return SimplicateResponseInterface|EmployeeListResponse
     */
    public function allEmployees(): EmployeeListResponse
    {
        return $this->client->responseClass(EmployeeListResponse::class)
            ->get($this->prefixPath('employee'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|EmployeeSingleResponse
     */
    public function employee(string $id): EmployeeSingleResponse
    {
        return $this->client->responseClass(EmployeeSingleResponse::class)
            ->get($this->prefixPath('employee/' . $id));
    }

    /**
     * @return SimplicateResponseInterface|EmployeeTypeListResponse
     */
    public function allEmployeeTypes(): EmployeeTypeListResponse
    {
        return $this->client->responseClass(EmployeeTypeListResponse::class)
            ->get($this->prefixPath('employeetype'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|EmployeeTypeSingleResponse
     */
    public function employeeType(string $id): EmployeeTypeSingleResponse
    {
        return $this->client->responseClass(EmployeeTypeSingleResponse::class)
            ->get($this->prefixPath('employeetype/' . $id));
    }

    /**
     * @return SimplicateResponseInterface|EmploymentTypeListResponse
     */
    public function allEmploymentTypes(): EmploymentTypeListResponse
    {
        return $this->client->responseClass(EmploymentTypeListResponse::class)
            ->get($this->prefixPath('employmenttype'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|EmploymentTypeSingleResponse
     */
    public function employmentType(string $id): EmploymentTypeSingleResponse
    {
        return $this->client->responseClass(EmploymentTypeSingleResponse::class)
            ->get($this->prefixPath('employmenttype/' . $id));
    }

    /**
     * @return SimplicateResponseInterface|LeaveListResponse
     */
    public function allLeave(): LeaveListResponse
    {
        return $this->client->responseClass(LeaveListResponse::class)
            ->get($this->prefixPath('leave'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|LeaveSingleResponse
     */
    public function leave(string $id): LeaveSingleResponse
    {
        return $this->client->responseClass(LeaveSingleResponse::class)
            ->get($this->prefixPath('leave/' . $id));
    }

    /**
     * @return SimplicateResponseInterface|LeaveBalanceListResponse
     */
    public function leaveBalance(): LeaveBalanceListResponse
    {
        return $this->client->responseClass(LeaveBalanceListResponse::class)
            ->get($this->prefixPath('leavebalance'));
    }

    /**
     * @return SimplicateResponseInterface|LeaveTypeListResponse
     */
    public function allLeaveTypes(): LeaveTypeListResponse
    {
        return $this->client->responseClass(LeaveTypeListResponse::class)
            ->get($this->prefixPath('leavetype'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|LeaveTypeSingleResponse
     */
    public function leaveType(string $id): LeaveTypeSingleResponse
    {
        return $this->client->responseClass(LeaveTypeSingleResponse::class)
            ->get($this->prefixPath('leavetype/' . $id));
    }

    /**
     * @return SimplicateResponseInterface|TeamListResponse
     */
    public function allTeams(): TeamListResponse
    {
        return $this->client->responseClass(TeamListResponse::class)
            ->get($this->prefixPath('team'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|TeamSingleResponse
     */
    public function team(string $id): TeamSingleResponse
    {
        return $this->client->responseClass(TeamSingleResponse::class)
            ->get($this->prefixPath('team/' . $id));
    }

    /**
     * @return SimplicateResponseInterface|TimeTableListResponse
     */
    public function timeTables(): TimeTableListResponse
    {
        return $this->client->responseClass(TimeTableListResponse::class)
            ->get($this->prefixPath('timetable'));
    }

}

<?php

namespace Moddit\Simplicate\Contracts\Services\Domains;

use Moddit\Simplicate\Contracts\Services\SimplicateDomainInterface;
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

interface HrmDomainInterface extends SimplicateDomainInterface
{

    public function allEmployees(): EmployeeListResponse;

    public function employee(string $id): EmployeeSingleResponse;

    public function allEmployeeTypes(): EmployeeTypeListResponse;

    public function employeeType(string $id): EmployeeTypeSingleResponse;

    public function allEmploymentTypes(): EmploymentTypeListResponse;

    public function employmentType(string $id): EmploymentTypeSingleResponse;

    public function allLeave(): LeaveListResponse;

    public function leave(string $id): LeaveSingleResponse;

    public function leaveBalance(): LeaveBalanceListResponse;

    public function allLeaveTypes(): LeaveTypeListResponse;

    public function leaveType(string $id): LeaveTypeSingleResponse;

    public function allTeams(): TeamListResponse;

    public function team(string $id): TeamSingleResponse;

    public function timeTables(): TimeTableListResponse;
    
}

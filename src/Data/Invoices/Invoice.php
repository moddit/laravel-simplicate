<?php

namespace Moddit\Simplicate\Data\Invoices;

use Carbon\Carbon;
use Moddit\Simplicate\Data\AbstractDataObject;
use Illuminate\Support\Arr;

class Invoice extends AbstractDataObject
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var array
     */
    protected $invoice_lines;

    /**
     * @var array
     */
    protected $status;

    /**
     * @var Carbon
     */
    protected $date;

    public function __construct(array $data)
    {
        $this->id = Arr::get($data, 'id');
        $this->date = Arr::get($data, 'date');
        $this->invoice_lines = Arr::get($data, 'invoice_lines');
        $this->status = Arr::get($data, 'status');
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getDate(): ?Carbon
    {
        return $this->date;
    }

    public function getInvoiceLines(): ?array
    {
        return $this->invoice_lines;
    }

    public function getStatus(): ?array
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'date' => $this->getDate(),
            'invoice_lines' => $this->getInvoiceLines(),
            'status' => $this->getStatus(),
        ];
    }
}

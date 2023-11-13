<?php

namespace Hurah\Invoice\Data;

use Hurah\Invoice\Data\Invoice\Company;
use Hurah\Invoice\Data\Invoice\Customer;
use Hurah\Invoice\Data\Invoice\Note;
use Hurah\Invoice\Data\Invoice\Order;
use Hurah\Invoice\Data\Invoice\PaymentDetails;
use Hurah\Invoice\Data\Invoice\Totals;

interface ConsumableInvoiceInterface
{
    /**
     * Invoice::toArray()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return array
     */
    public function toArray(): array;

    /**
     * Invoice::getOrder()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return Order
     */
    public function getOrder(): Order;

	public function getTotals(): Totals;

    /**
     * Invoice::getCustomer()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return Customer
     */
    public function getCustomer(): Customer;

    /**
     * Invoice::getNumber()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return string
     */
    public function getNumber(): string;

    /**
     * Invoice::getCustomerReference()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return string
     */
    public function getCustomerReference(): ?string;

    /**
     * Invoice::getOwnCompany()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return Company
     */
    public function getOwnCompany(): Company;

    /**
     * Invoice::getCustomerNote()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return ?Note
     */
    public function getCustomerNote(): ?Note;

	public function getPaymentDetails():PaymentDetails;

    /**
     * Invoice::getOurNote()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return ?Note
     */
    public function getOurNote(): ?Note;
}

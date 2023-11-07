<?php
namespace Hurah\Invoice\Data;

use DateInterval;
use DateTime;
use Hurah\Invoice\Data\Invoice\Customer;
use Hurah\Invoice\Data\Invoice\Note;
use Hurah\Invoice\Data\Invoice\Order;
use Hurah\Invoice\Data\Invoice\Company;
use Hurah\Invoice\Data\Invoice\PaymentDetails;

final class Invoice implements InvoiceInterface
{
	private Order $order;
	private Customer $customer;
	private string $number;
	private ?string $customerReference = null;
	private Company $ownCompany;
	private ?Note $customerNote = null;
	private ?Note $ourNote = null;
	private DateTime $createdOn;
	private ?DateInterval $payTerm = null;
	private DateTime $payBefore;
	private PaymentDetails $paymentDetails;

	/**
	 * @return PaymentDetails
	 */
	public function getPaymentDetails(): PaymentDetails
	{
		return $this->paymentDetails;
	}

	/**
	 * @param PaymentDetails $paymentDetails
	 */
	public function setPaymentDetails(PaymentDetails $paymentDetails): void
	{
		$this->paymentDetails = $paymentDetails;
	}
	private bool $isFullyPaid;
	private string $paymentConditions;


	/**
	 * Invoice::__construct()
	 */
	public function __construct()
	{
	}


	/**
	 * Invoice::create()
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(
		string $number,
		Order $order,
		Company $ownCompany,
		Customer $customer,
		DateTime $createdOn,
		?DateInterval $payTerm,
		PaymentDetails $paymentDetails,
		bool $isFullyPaid,
		string $paymentConditions,
		?Note $customerNote = null,
		?Note $ourNote = null,
		?string $customerReference = null
	): self {
		$new = new self();
		$new->number = $number;
		$new->order = $order;
		$new->ownCompany = $ownCompany;
		$new->customer = $customer;
		$new->createdOn = $createdOn;
		$new->payTerm = $payTerm;
		$new->paymentDetails = $paymentDetails;
		$new->isFullyPaid = $isFullyPaid;
		$new->paymentConditions = $paymentConditions;
		$new->customerNote = $customerNote;
		$new->ourNote = $ourNote;
		$new->customerReference = $customerReference;
		return $new;
	}


	/**
	 * Invoice::getOrder()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return Order
	 */
	final public function getOrder(): Order
	{
		return $this->order;
	}


	/**
	 * Invoice::setOrder()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Order $order
	 * @return self
	 */
	final public function setOrder(Order $order): self
	{
		$this->order = $order;
		return $this;
	}


	/**
	 * Invoice::getCustomer()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return Customer
	 */
	final public function getCustomer(): Customer
	{
		return $this->customer;
	}


	/**
	 * Invoice::getNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getNumber(): string
	{
		return $this->number;
	}


	/**
	 * Invoice::getCustomerReference()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	public function getCustomerReference(): ?string
	{
		return $this->customerReference;
	}


	/**
	 * Invoice::setNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $number
	 * @return self
	 */
	final public function setNumber(string $number): self
	{
		$this->number = $number;
		return $this;
	}


	/**
	 * Invoice::getOwnCompany()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return Company
	 */
	final public function getOwnCompany(): Company
	{
		return $this->ownCompany;
	}


	/**
	 * Invoice::setOwnCompany()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Company $ownCompany
	 * @return self
	 */
	final public function setOwnCompany(Company $ownCompany): self
	{
		$this->ownCompany = $ownCompany;
		return $this;
	}


	/**
	 * Invoice::setCustomer()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Customer $customer
	 * @return self
	 */
	final public function setCustomer(Customer $customer): self
	{
		$this->customer = $customer;
		return $this;
	}


	/**
	 * Invoice::getCustomerNote()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return Note
	 */
	final public function getCustomerNote(): ?Note
	{
		return $this->customerNote;
	}
	/**
	 * Invoice::setCreatedOn()
	 * @param DateTime $createdOn
	 * @return void
	 */
	final public function setCreatedOn(DateTime $createdOn): self
	{
		$this->createdOn = $createdOn;
		return $this;
	}

	/**
	 * Invoice::getCreatedOn()
	 * @return DateTime
	 */
	final public function getCreatedOn(): DateTime
	{
		return $this->createdOn;
	}
	/**
	 * Invoice::getOurNote()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return Note
	 */
	final public function getOurNote(): ?Note
	{
		return $this->ourNote;
	}


	/**
	 * Invoice::setCustomerNote()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Note $customerNote
	 * @return self
	 */
	final public function setCustomerNote(?Note $customerNote): self
	{
		$this->customerNote = $customerNote;
		return $this;
	}


	/**
	 * Invoice::setOurNote()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Note $ourNote
	 * @return self
	 */
	final public function setOurNote(?Note $ourNote): self
	{
		$this->ourNote = $ourNote;
		return $this;
	}


	/**
	 * Invoice::setCustomerReference()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param ?string $customerReference
	 * @return self
	 */
	final public function setCustomerReference(?string $customerReference): self
	{
		$this->customerReference = $customerReference;
		return $this;
	}


	/**
	 * Invoice::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		$result = [];
		$result['number'] = $this->getNumber();
		$result['order'] = $this->getOrder()->toArray();
		$result['ownCompany'] = $this->getOwnCompany()->toArray();
		$result['customer'] = $this->getCustomer()->toArray();
		$result['payTerm'] = $this->getPayTerm();
		$result['payBefore'] = $this->getPayBefore();
		$result['isFullyPaid'] = $this->getIsFullyPaid();
		$result['paymentConditions'] = $this->getPaymentConditions();
		if(($oCustomerNote = $this->getCustomerNote()) instanceof Note)
		{
			$result['customerNote'] = $oCustomerNote->toArray();
		}
		else
		{
			$result['customerNote'] = null;
		}
		if(($oOurNote = $this->getOurNote()) instanceof Note)
		{
			$result['ourNote'] = $oOurNote->toArray();
		}
		else
		{
			$result['ourNote'] = null;
		}
		$result['customerReference'] = $this->getCustomerReference();
		return $result;
	}

	final public function getPayBefore():DateTime{
		if(!isset($this->payBefore))
		{
			$this->payBefore = $this->getCreatedOn()->add($this->getPayTerm());
		}
		return $this->payBefore;
	}

	final public function setPayBefore(DateTime $payBefore): self
	{
		$this->payBefore = $payBefore;
		return $this;
	}


	/**
	 * Invoice::getPayTerm()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return DateInterval
	 */
	final public function getPayTerm(): ?DateInterval
	{
		return $this->payTerm;
	}


	/**
	 * Invoice::setPayTerm()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param DateInterval $payTerm
	 * @return self
	 */
	final public function setPayTerm(?DateInterval $payTerm): self
	{
		$this->payTerm = $payTerm;
		return $this;
	}


	/**
	 * Invoice::getIsFullyPaid()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return bool
	 */
	final public function getIsFullyPaid(): bool
	{
		return $this->isFullyPaid;
	}


	/**
	 * Invoice::setIsFullyPaid()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param bool $isFullyPaid
	 * @return self
	 */
	final public function setIsFullyPaid(bool $isFullyPaid): self
	{
		$this->isFullyPaid = $isFullyPaid;
		return $this;
	}


	/**
	 * Invoice::getPaymentConditions()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getPaymentConditions(): string
	{
		return $this->paymentConditions;
	}


	/**
	 * Invoice::setPaymentConditions()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $paymentConditions
	 * @return self
	 */
	final public function setPaymentConditions(string $paymentConditions): self
	{
		$this->paymentConditions = $paymentConditions;
		return $this;
	}


	/**
	 * Invoice::createFromArray()
	 * Make this method final to enable code generation.
	 */
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		if(isset($array['number'])){
			$new->setNumber($array['number']);
		}
		if(isset($array['order'])){
			$oOrder = Order::createFromArray($array['order']);
			$new->setOrder($oOrder);
		}
		if(isset($array['ownCompany'])){
			$oOwnCompany = Company::createFromArray($array['ownCompany']);
			$new->setOwnCompany($oOwnCompany);
		}
		if(isset($array['customer'])){
			$oCustomer = Customer::createFromArray($array['customer']);
			$new->setCustomer($oCustomer);
		}
		if(isset($array['payTerm']) && $array['payTerm'] instanceof DateInterval){
			$new->setPayTerm($array['payTerm']);
		}
		elseif(isset($array['payTerm']) && is_string($array['payTerm']))
		{
			$oPayTerm = DateInterval::createFromDateString($array['payTerm']);
			$new->setPayTerm($oPayTerm);
		}
		if(isset($array['isFullyPaid'])){
			$new->setIsFullyPaid($array['isFullyPaid']);
		}
		if(isset($array['paymentConditions'])){
			$new->setPaymentConditions($array['paymentConditions']);
		}
		if(isset($array['customerNote'])){
			$oCustomerNote = Note::createFromArray($array['customerNote']);
			$new->setCustomerNote($oCustomerNote);
		}
		if(isset($array['ourNote'])){
			$oOurNote = Note::createFromArray($array['ourNote']);
			$new->setOurNote($oOurNote);
		}
		if(isset($array['customerReference'])){
			$new->setCustomerReference($array['customerReference']);
		}
		return $new;
	}
}

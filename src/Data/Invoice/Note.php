<?php
namespace Hurah\Invoice\Data\Invoice;

use \DateTime;

final class Note
{
	private string $message;
	private ?string $from;
	private ?DateTime $dateTime;


	/**
	 * Note::__construct()
	 */
	public function __construct()
	{
	}


	/**
	 * Note::create()
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(string $message, string $from = null, DateTime $dateTime = null): self
	{
		$new = new self();
		$new->message = $message;
		$new->from = $from;
		$new->dateTime = $dateTime;
		return $new;
	}


	/**
	 * Note::createFromArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param array $array
	 * @return self
	 */
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		$new->setMessage($array['message']);
		$new->setFrom($array['from']);
		$new->setDateTime($array['dateTime']);
		return $new;
	}


	/**
	 * Note::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		return [
		'message' => $this->getMessage(),
		'from' => $this->getFrom(),
		'dateTime' => $this->getDateTime(),
		];
	}


	/**
	 * Note::getMessage()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getMessage(): string
	{
		return $this->message;
	}


	/**
	 * Note::getFrom()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getFrom(): ?string
	{
		return $this->from;
	}


	/**
	 * Note::getDateTime()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return DateTime
	 */
	final public function getDateTime(): ?DateTime
	{
		return $this->dateTime;
	}


	/**
	 * Note::setMessage()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $message
	 * @return self
	 */
	final public function setMessage(string $message): self
	{
		$this->message = $message;
		return $this;
	}


	/**
	 * Note::setFrom()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $from
	 * @return self
	 */
	final public function setFrom(string $from): self
	{
		$this->from = $from;
		return $this;
	}


	/**
	 * Note::setDateTime()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param DateTime $dateTime
	 * @return self
	 */
	final public function setDateTime(DateTime $dateTime): self
	{
		$this->dateTime = $dateTime;
		return $this;
	}
	public function __toString():string
	{
		return $this->getMessage();
	}
}

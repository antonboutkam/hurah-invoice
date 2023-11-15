<?php
namespace Hurah\Invoice\Data\Invoice;

use \DateTime;
use Hurah\Types\Type\PlainText;

final class Note
{
	private PlainText $message;
	private ?string $from;
	private ?DateTime $dateTime;


	/**
	 * Note::__construct()
	 */
	public function __construct()
	{
		$this->message = new PlainText();
	}


	/**
	 * Note::create()
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(?string $message, string $from = null, DateTime $dateTime = null): self
	{
		$new = new self();
		$new->message = new PlainText($message);
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
	 * @param string $line
	 *
	 * @return $this
	 */
	public final function appendLn(string $line):self
	{
		$this->message->addLn($line);
		return $this;
	}

	/**
	 * Note::getMessage()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getMessage(): string
	{
		return (string) $this->message;
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
		$this->message->setValue($message);
		return $this;
	}

	final public function append(string ...$message):self
	{
		$this->message->append($message);
		return $this;
	}


	/**
	 * Note::setMessage()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $message
	 * @return self
	 */
	final public function addLn(string $message): self
	{

		$this->message->addLn($message);
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

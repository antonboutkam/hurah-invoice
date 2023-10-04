<?php
namespace Hurah\Invoice\Generator\Document\Type;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;
use Hurah\Types\Type\Html as HtmlDataType;

final class Html implements InvoiceDocumentTypeInterface
{
	private string $contentType = 'text/html';


	/**
	 * Pdf::create()
	 * @generate [getters]
	 */
	public static function create(string $contentType): self
	{
		$new = new self();
		$new->contentType = $contentType;
		return $new;
	}


	public function convert(HtmlDataType $input): string
	{
		return $input;
	}


	/**
	 * Html::getContentType()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getContentType(): string
	{
		return $this->contentType;
	}
}

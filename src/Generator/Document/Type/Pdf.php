<?php
namespace Hurah\Invoice\Generator\Document\Type;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;
use Hurah\Types\Exception\InvalidArgumentException;
use Hurah\Types\Type\Html;
use Hurah\Types\Type\Path;

final class Pdf implements InvoiceDocumentTypeInterface
{
	private string $contentType = 'application/pdf';
	private string $wkhtmltopdfbin = '/usr/local/bin/wkhtmltopdf';
	private string $tmpdir = '/tmp';


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


	/**
	 * Pdf::getContentType()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getContentType(): string
	{
		return $this->contentType;
	}


	/**
	 * @throws InvalidArgumentException
	 */
	public function convert(Html $input): string
	{
		$oTmpDir = Path::make($this->tmpdir);
		$sHtml = $input->getValue();
		$sTmpFilename = md5($sHtml) .'.html';
		$oTmpDestination = $oTmpDir->extend($sTmpFilename);
		$oTmpDestination->write($sHtml);

		$oSnappy = new \Knp\Snappy\Pdf();
		$oSnappy->setBinary($this->wkhtmltopdfbin);
		return $oSnappy->getOutput((string) $oTmpDestination);
	}
}

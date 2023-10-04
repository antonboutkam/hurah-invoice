<?php
namespace Hurah\Invoice\Generator\Result\Handler;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;
use Hurah\Invoice\Generator\Result\ResultHandlerInterface;

final class Download implements ResultHandlerInterface
{
	private string $document;
    private InvoiceDocumentTypeInterface $type;

	/**
	 * Download::__construct()
     * @param string $document
     * @param InvoiceDocumentTypeInterface $type
     */
	public function __construct(string $document, InvoiceDocumentTypeInterface $type)
	{
        $this->document = $document;
        $this->type = $type;
	}

    public function handle():string
    {
        header("Content-type: {$this->type->getContentType()}");
        header('Content-Disposition: attachment; filename="invoice.pdf"');

        return $this->document;
    }
}

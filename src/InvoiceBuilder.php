<?php
namespace Hurah\Invoice;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface;
use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface as Type;
use Hurah\Invoice\Generator\Document\Type\Pdf;
use Hurah\Invoice\Generator\HtmlInvoice;
use Hurah\Invoice\Generator\Result\Handler\Download;
use Hurah\Invoice\Generator\Result\ResultHandlerInterface as ResultHandler;
use Hurah\Types\Exception\InvalidArgumentException;
use Hurah\Types\Type\Path;

final class InvoiceBuilder
{
	private StructureInterface $invoiceStructure;
	private string $twigTemplate;
	private Type $invoiceType;
	private ResultHandler $handler;


	public function __construct()
	{
	}


	/**
	 * Invoice::create()

	 */
	public static function create(
		StructureInterface $invoiceStructure,
		string $twigTemplate,
		Type $invoiceType,
		ResultHandler $handler
	): self {
		$new = new self();
		$new->invoiceStructure = $invoiceStructure;
		$new->twigTemplate = $twigTemplate;
		$new->invoiceType = $invoiceType;
		$new->handler = $handler;
		return $new;
	}

    /**
     * @throws InvalidArgumentException
     */
    public static function init(StructureInterface $invoiceStructure, Type $type = null, ResultHandler $handler = null):self
	{
        $oCurrentDir = Path::make(__DIR__)
                        ->extend('Layout', 'invoice.twig');

		$new = new self();
		$new->setInvoiceStructure($invoiceStructure);
        $new->setTwigTemplate($oCurrentDir->contents());
        if(!$type)
        {
            $type = new Pdf();
        }
        $new->setInvoiceType($type);

        if(!$handler)
        {
            $handler = new Download();
        }
        $new->setHandler($handler);

        return $new;
	}

    final public function setInvoiceType(InvoiceDocumentTypeInterface $type):self
    {
        $this->invoiceType = $type;
        return $this;
    }
	/**
	 * InvoiceBuilder::setInvoiceStructure()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param StructureInterface $invoiceStructure
	 * @return self
	 */
	final public function setInvoiceStructure(StructureInterface $invoiceStructure): self
	{
		$this->invoiceStructure = $invoiceStructure;
		return $this;
	}


	public function makeInvoice(): string
	{
		$oHtmlInvoice = new HtmlInvoice($this->invoiceStructure, $this->twigTemplate);
		$oHtml = $oHtmlInvoice->render();
		$oMixedInvoice = $this->invoiceType->convert($oHtml);
        $this->handler->setType($this->invoiceType);
		return $this->handler->handle($oMixedInvoice);
	}


	/**
	 * InvoiceBuilder::setTwigTemplate()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $twigTemplate
	 * @return self
	 */
	final public function setTwigTemplate(string $twigTemplate): self
	{
		$this->twigTemplate = $twigTemplate;
		return $this;
	}

    final public function getTwigTemplate(): string
    {
        return $this->twigTemplate;
    }


    /**
	 * InvoiceBuilder::setHandler()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param ResultHandler $handler
	 * @return self
	 */
	final public function setHandler(ResultHandler $handler): self
	{
		$this->handler = $handler;
		return $this;
	}
}

<?php

namespace Hurah\Invoice\Data\Invoice;

use Hurah\Types\Type\DnsName;
use Hurah\Types\Exception\MethodNotImplementedException;

final class Environment
{
	private bool $bDebug = false;
	private array $translations = [];
    private ?DnsName $assetsHostname = null;
    private ?DnsName $fileHostname = null;
    private array $extraArguments = [];
    private array $twigConfig = [
        'cache' => "/tmp",
        'debug' => false,
    ];

    /**
     * Environment::__construct()
     */
    public function __construct()
    {
    }

    public function __call(string $name, array $arguments)
    {
        if (strpos($name, 'get') === 0) {

            $camelName = str_replace('get', '', $name);
            $snakeName = $this->camelCaseToSnakeCase($camelName);

            if (isset($this->extraArguments[$snakeName])) {
                return $this->extraArguments[$snakeName];
            } else {
                throw new MethodNotImplementedException("{$camelName} call to undefined array index {$snakeName} ");
            }
        }
        throw new MethodNotImplementedException("{$name}");

    }
	public function enableDebugging(bool $bDebug = true)
	{
		$this->bDebug = $bDebug;
	}

	public function debuggingEnabled():bool
	{
		return $this->bDebug;
	}

    public static function init(string $assetsHostname, string $fileHostname, array $aExtraArguments = []): self
    {
        $new = new self();
        $new->setAssetsHostname(new DnsName($assetsHostname));
        $new->setFileHostname(new DnsName($fileHostname));
        $new->setExtraArguments($aExtraArguments);
		$new->setTranslations($aExtraArguments['translations'] ?? []);
        return $new;
    }

    /**
     * Environment::createFromArray()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @param array $array
     * @return self
     */
    final public static function createFromArray(array $array): self
    {
        $new = new self();
        $oAssetsHostname = DnsName::make($array['assetsHostname']);
        $new->setAssetsHostname($oAssetsHostname);
        $oFileHostname = DnsName::make($array['fileHostname']);
        $new->setFileHostname($oFileHostname);
        $new->setExtraArguments($array['extraArguments']);
        return $new;
    }

    /**
     * Environment::toArray()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return array
     */
    final public function toArray(): array
    {
        return array_merge([
            'assetsHostname' => (string)$this->getAssetsHostname(),
            'fileHostname' => (string)$this->getFileHostname(),
			'translations' => (string)$this->getFileHostname(),
        ], $this->getExtraArguments());
    }

    /**
     * Environment::getAssetsHostname()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return DnsName
     */
    final public function getAssetsHostname(): ?DnsName
    {
        return $this->assetsHostname;
    }

    /**
     * Environment::setAssetsHostname()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @param DnsName $assetsHostname
     * @return self
     */
    final public function setAssetsHostname(DnsName $assetsHostname): self
    {
        $this->assetsHostname = $assetsHostname;
        return $this;
    }

    /**
     * Environment::getFileHostname()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return DnsName
     */
    final public function getFileHostname(): ?DnsName
    {
        return $this->fileHostname;
    }

    /**
     * Environment::setFileHostname()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @param DnsName $fileHostname
     * @return self
     */
    final public function setFileHostname(DnsName $fileHostname): self
    {
        $this->fileHostname = $fileHostname;
        return $this;
    }

    /**
     * Environment::getExtraArguments()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return array
     */
    final public function getExtraArguments(): array
    {
        return $this->extraArguments;
    }

    /**
     * Environment::setExtraArguments()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @param array $extraArguments
     * @return self
     */
    final public function setExtraArguments(array $extraArguments): self
    {
        $this->extraArguments = $extraArguments;
        return $this;
    }

    final public function setTwigConfig(array $aConfig)
    {
        $this->twigConfig = $aConfig;
    }
    final public function getTwigConfig():array
    {
        return $this->twigConfig;
    }

    private function camelCaseToSnakeCase($string): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }
	/**
	 * @return array
	 */
	final public function getTranslations(): array
	{
		return $this->translations;
	}

	/**
	 * @param array $translations
	 *
	 * @return Environment
	 */
	final public function setTranslations(array $translations): Environment
	{
		$this->translations = $translations;
		return $this;
	}
}

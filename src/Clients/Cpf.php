<?php

namespace JC\BrDocs\Clients;

use Exception;
use JC\BrDocs\Formatters\CpfFormatter;
use JC\BrDocs\Helpers\StringHelper;
use JC\BrDocs\Validators\CpfValidator;

/**
 * Class Cpf
 * @package JC\BrDocs\Clients
 */
class Cpf
{
    /**
     * The input document number.
     * @var string
     */
    private $document;

    /**
     * The manipulated document number.
     * @var string
     */
    private $newDocument;

    /**
     * State of the newDocument if its valid or not.
     * @var
     */
    private $isValid;

    /**
     * Cpf constructor.
     * @param string $document
     */
    public function __construct(string $document)
    {
        $this->document = $document;
        $this->newDocument = $document;
    }

    /**
     * Converts newDocument to number and add leading zeros if applicable.
     * @return $this
     */
    public function normalize()
    {
        $this->newDocument = StringHelper::numbersOnly($this->newDocument);
        $this->newDocument = sprintf('%011d', $this->newDocument);

        return $this;
    }

    /**
     * Checks if newDocument number is valid.
     * @return $this
     * @throws Exception
     */
    public function validate()
    {
        if (!$this->isValid = CpfValidator::validate($this->newDocument)) {
            throw new Exception('O documento não é válido.');
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        try {
            $this->validate();
        } catch (Exception $exception) {
            return false;
        }

        return $this->isValid;
    }

    /**
     * Formats the newDocument to its specific style.
     * @return $this
     */
    public function format()
    {
        $this->newDocument = CpfFormatter::format($this->newDocument);

        return $this;
    }

    /**
     * Returns the newDocument which contains the manipulated document number.
     * @return string
     */
    public function get()
    {
        return $this->newDocument;
    }
}
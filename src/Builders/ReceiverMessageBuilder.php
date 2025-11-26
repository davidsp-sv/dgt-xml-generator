<?php

namespace DazzaDev\DgtXmlGenerator\Builders;

use DazzaDev\DgtXmlGenerator\Models\ReceiverMessage\ReceiverMessage;
use DazzaDev\DgtXmlGenerator\XmlHelper;
use DOMDocument;
use InvalidArgumentException;

class ReceiverMessageBuilder
{
    protected array $messageData;

    protected ReceiverMessage $message;

    /**
     * Create a receiver message builder
     */
    public function __construct(array $messageData)
    {
        $this->messageData = $messageData;

        $this->validateRequiredData();

        $this->message = new ReceiverMessage($this->messageData);
    }

    /**
     * Get the receiver message
     */
    public function getMessage(): ReceiverMessage
    {
        return $this->message;
    }

    /**
     * Get the receiver message (alias for getMessage with proper return type)
     */
    public function getDocument(): ReceiverMessage
    {
        return $this->message;
    }

    /**
     * Get the receiver message XML
     */
    public function getXml(): DOMDocument
    {
        return (new XmlHelper)->getXml(
            'receiver-message',
            $this->message->toArray()
        );
    }

    /**
     * Validate required data
     */
    protected function validateRequiredData(): void
    {
        $requiredFields = [
            'document_key',
            'issuer_identification_number',
            'date',
            'message_type',
            'receiver',
        ];

        foreach ($requiredFields as $field) {
            if (! isset($this->messageData[$field])) {
                throw new InvalidArgumentException("Missing required field: {$field}");
            }
        }

        $receiver = $this->messageData['receiver'];
        if (! is_array($receiver)) {
            return;
        }

        foreach (['identification_number', 'sequential_number'] as $subField) {
            if (! isset($receiver[$subField])) {
                throw new InvalidArgumentException("Missing required field in receiver: {$subField}");
            }
        }
    }
}

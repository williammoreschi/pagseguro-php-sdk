<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

namespace PagSeguro\Resources\Factory\Request\DirectPayment\CreditCard\Holder;

use PagSeguro\Enum\Properties\Current;

/**
 * Class Document
 * @package PagSeguro\Resources\Factory
 */
class Document
{

    /**
     * @var \PagSeguro\Domains\Document
     */
    private $holder;

    /**
     * Document constructor.
     */
    public function __construct($holder)
    {
        $this->holder = $holder;
    }

    /**
     * @param \PagSeguro\Domains\Document $document
     * @return \PagSeguro\Domains\DirectPayment\CreditCard\Holder
     */
    public function instance(\PagSeguro\Domains\Document $document)
    {
        $this->holder->setDocuments($document);
        return $this->holder;
    }

    /**
     * @param $array
     * @return \PagSeguro\Domains\DirectPayment\CreditCard\Holder
     */
    public function withArray($array)
    {
        $properties = new Current;
        $document = new \PagSeguro\Domains\Document();
        $document->setType($array[$properties::DOCUMENT_TYPE])
                 ->setIdentifier($array[$properties::DOCUMENT_VALUE]);
        $this->holder->setDocuments($document);
        return $this->holder;
    }

    /**
     * @param $type
     * @param $identifier
     * @return \PagSeguro\Domains\DirectPayment\CreditCard\Holder
     */
    public function withParameters($type, $identifier)
    {
        $document = new \PagSeguro\Domains\Document();
        $document->setType($type)
                 ->setIdentifier($identifier);
        $this->holder->setDocuments($document);
        return $this->holder;
    }
}

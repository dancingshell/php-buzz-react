<?php

namespace Clue\React\Buzz\Message;

class Headers
{
    private $headers;

    /**
     * @param array $headers
     */
    public function __construct($headers = array())
    {
        $this->headers = $headers;
    }

    /**
     * @param $search String
     * @return array
     */
    public function getHeaderValues($search)
    {
        $search = strtolower($search);

        $ret = array();

        foreach ($this->headers as $key => $values) {
            if (strtolower($key) === $search) {
                if (is_array($values)) {
                    foreach ($values as $value) {
                        $ret []= $value;
                    }
                } else {
                    $ret []= $values;
                }
            }
        }

        return $ret;
    }

    /**
     * @param $search String
     * @return mixed
     */
    public function getHeaderValue($search)
    {
        $values = $this->getHeaderValues($search);

        return isset($values[0]) ? $values[0] : null;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->headers;
    }
}

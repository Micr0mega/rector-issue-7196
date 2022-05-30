<?php

namespace Micr0mega\RectorIssue7196;

class Foo {

    /**
     * @param \DateTime|\DateTimeImmutable $date
     * @return string
     */
    public function bar($date) {
        return $date->format('C');
    }
}

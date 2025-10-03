<?php

namespace Kubrick\E164;

interface E164Interface
{
    /**
     * @return string
     */
    public function toInternational(): string ;

    /**
     * @return string
     */
    public function toE164(): string ;

}

<?php
use Casper;

namespace Browser;

/**
 * CasperJS wrapper
 *
 * @author aguidet
 */
class jdSpider extends Casper
{
    public function fetchText($selector)
    {

        $fragment = <<<FRAGMENT
casper.then(function() {
    var txt = this.fetchText('$selector')
    this.echo(txt);
    return txt;
});
FRAGMENT;

        $this->script .= $fragment;

        return $this;
    }
}

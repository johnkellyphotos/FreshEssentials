<h1>Error: <b>{$message}</b></h1>
<h2>In file <i>{$file}</i> on line {$line}.</h2>
<hr/>
<h3>Stack Trace:</h3>
<ul>
    <li>{$file}::{$line}</li>
    {foreach from=$stack_trace item=trace}
        <li>{if isset($trace.file) && isset($trace.line)}{$trace.file}::{$trace.line}{/if} {if isset($trace.function)}(Scope: {$trace.function}){/if}</li>
    {/foreach}
</ul>
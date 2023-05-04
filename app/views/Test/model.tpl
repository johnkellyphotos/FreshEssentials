<h1>{if $success}Success!{else}Failure!{/if}</h1>

<h3>{$message}</h3>

{if isset($table)}
    {$table}
{/if}
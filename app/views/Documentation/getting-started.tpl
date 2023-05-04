<h1>Getting Started</h1>

<div class="directory-tree">
    <h3>Directory Contents</h3><hr/>
    {if isset($documentationDirectory)}
        {include file="template/directory-list.tpl"}
        {call name=printList items=$documentationDirectory}
    {/if}
</div>
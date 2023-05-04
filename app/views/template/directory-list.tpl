{function name=printList}
    <ul>
        {foreach $items as $item}
            <li>
                {if $item.type == 'directory'}
                    <i class="far fa-folder-open"></i>
                {else}
                    <i class="far fa-file-lines"></i>
                {/if}
                <a href="/{$item.urlPath}/">{$item.name}</a>
            </li>
            {if $item.type == 'directory'}
                {call name=printList items=$item['content']}
            {/if}
        {/foreach}
    </ul>
{/function}

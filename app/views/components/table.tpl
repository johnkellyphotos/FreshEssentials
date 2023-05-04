{if !empty($table)}
    <table class="table">
        <tbody>
        {if isset($table[0])}
            {foreach array_keys(reset($table)) as $columnName}
                <th scope="col">{Helper::toSpaceCase($columnName)}</th>
            {/foreach}
        {/if}
        {foreach $table as $row}
            <tr>
                {foreach $row as $column}
                    <td>{$column}</td>
                {/foreach}
            </tr>
        {/foreach}
        </tbody>
    </table>
{/if}
<?php

namespace model;

use lib\model\Query;
use lib\model\QueryType;

trait ModelTraits
{
    private function bindParameters($preparedValues, $statement): void
    {
        $i = 1;
        foreach ($preparedValues as $value) {
            $statement->bindValue($i++, $value);
        }
    }

    private function toKeyValuePair(array $list, &$preparedValues): string
    {
        if (empty($list)) {
            return '';
        }
        $string = '';
        foreach ($list as $key => $value) {
            $key = $this->wrap($key);
            $operator = "=";
            $string .= " $key $operator ?";
            $preparedValues[] = $value;
        }

        return $string;
    }

    private function wrap(string $item): string
    {
        return "`$item`";
    }

    private function toList(array $list, bool $wrap = true): string
    {
        if (empty($list)) {
            return '';
        }
        if ($wrap) {
            $list = array_map(fn($list) => $this->wrap($list), $list);
        }

        return implode(',', $list);
    }

    private function toFieldList(array $list): string
    {
        if (empty($list)) {
            return '';
        }

        $list = array_map(fn($value) => in_array($value, $this->columns) ? $this->wrap($value) : $value, $list);

        return implode(',', $list);
    }

    private function getFields(?array $query): string
    {
        return !empty($query[Query::FIELDS]) ? self::toFieldList($query[Query::FIELDS]) : '*';
    }

    private function getWhere(?array $query, &$parameters): string
    {
        if (isset($query[Query::WHERE])) {
            $whereStatement = 'WHERE ';
            $whereStatements = [];
            foreach ($query[Query::WHERE] as $key => $value) {
                if (in_array($key, $this->columns)) {
                    if (is_array($value)) {
                        $whereStatements[] = "(" . $this->wrap($key) . " IN (" . implode(',', array_fill(0, count($value), '?')) . ") )";
                        $parameters = [...$parameters, ...$value];
                    } else {
                        $whereStatements[] = "(" . $this->wrap($key) . " = ?)";
                        $parameters[] = $value;
                    }
                } else {
                    $whereStatements[] = "(" . $this->wrapColumnsInString($key) . " ?)";
                    $parameters[] = $value;
                }
            }
            return $whereStatement . implode(' AND ', $whereStatements);
        }

        return '';
    }

    private function wrapColumnsInString(string $string): string
    {
        $pattern = '/\b(' . implode('|', $this->columns) . ')\b/i';
        return preg_replace_callback($pattern, function ($matches) {
            return $this->wrap($matches[0]);
        }, $string);
    }

    private function getUpdates(?array $query, &$parameters): string
    {
        if (isset($query[Query::UPDATE])) {
            return " SET " . self::toKeyValuePair($query[Query::UPDATE], $parameters) . " ";
        }

        return '';
    }

    private function getLimit(?array $query): string
    {
        if (isset($query[Query::LIMIT])) {
            return "LIMIT " . $query[Query::LIMIT];
        }

        return '';
    }

    private function getOrderBy(?array $query): string
    {
        if (isset($query[Query::ORDER_BY])) {
            $orderBys = [];
            foreach ($query[Query::ORDER_BY] as $orderByKey => $orderByValue) {
                $orderBys[] = $this->wrap($orderByKey) . " " . $orderByValue;
            }

            return 'ORDER BY ' . $this->toList($orderBys, false);
        }

        return '';
    }

    private function getGroupBy(?array $query): string
    {
        if (isset($query[Query::GROUP_BY])) {
            $groupBys = $this->toList($query[Query::GROUP_BY]);

            return 'GROUP BY ' . $groupBys;
        }

        return '';
    }

    private function buildQuery(QueryType $queryType, array $query = []): string
    {
        $query[Query::WHERE] ??= '';
        $query[Query::GROUP_BY] ??= '';
        $query[Query::ORDER_BY] ??= '';
        $query[Query::LIMIT] ??= '';
        $query[Query::UPDATE] ??= '';

        return trim(
            match ($queryType) {
                QueryType::FETCH => "SELECT " . $query[Query::FIELDS] . " FROM `$this->database`.`$this->table` " .
                    $query[Query::WHERE] . " " . $query[Query::GROUP_BY] . " " . $query[Query::ORDER_BY] . " " . $query[Query::LIMIT],

                QueryType::INSERT => "INSERT INTO `$this->database`.`$this->table` (" . $query[Query::COLUMNS] . ")  VALUES (" . $query[Query::VALUES] . ")",

                QueryType::DESCRIBE => "DESCRIBE `$this->database`.`$this->table`",

                QueryType::UPDATE => "UPDATE `$this->database`.`$this->table` " . $query[Query::UPDATE] . " " . $query[Query::WHERE] . " " . $query[Query::LIMIT],

                QueryType::DELETE => "DELETE FROM `$this->database`.`$this->table` " . $query[Query::WHERE] . " " . $query[Query::LIMIT],
            }
        );
    }
}

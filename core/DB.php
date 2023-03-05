<?php

namespace core;

use core\Connector;
use PDO;

class DB
{
    private $pdo = null;

    protected $table = '';

    private $where = [];

    private $select = '*';

    private $orderBy = '';

    private $limit = '';

    public function __construct()
    {
        try {
            $this->pdo = Connector::init();
        }catch (\Exception $exception){
            print "Error!: " . $exception->getMessage();
            die();
        }
    }

    /**
     * @param  string  $table
     * @return $this
     */
    public function table(string $table): DB
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @param  string  $column
     * @param  string  $value
     * @param  string  $operator
     * @return $this
     */
    public function where(string $column, string $value, string $operator = '='): DB
    {
        $this->where[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
            'type' => 'and'
        ];

        return $this;
    }

    /**
     * @param  string  $column
     * @param  string  $value
     * @param  string  $operator
     * @return $this
     */
    public function orWhere(string $column, string $value, string $operator = '='): DB
    {
        $this->where[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
            'type' => 'or'
        ];

        return $this;
    }

    /**
     * @param  string  $select
     * @return $this
     */
    public function select(string $select): DB
    {
        $this->select = $select;

        return $this;
    }

    /**
     * @param  string  $column
     * @param  string  $type
     * @return $this
     */
    public function orderBy(string $column, string $type = 'ASC'): DB
    {
        $this->orderBy = ' ORDER BY ' . $column . ' ' . $type;

        return $this;
    }

    /**
     * @param  int  $count
     * @param  int  $offset
     * @return $this
     */
    public function limit(int $count, int $offset = 0): DB
    {
        $this->limit = ' LIMIT ' . $offset . ', ' . $count;

        return $this;
    }

    /**
     * @param $mode
     * @return mixed
     */
    public function first($mode = PDO::FETCH_OBJ): mixed
    {
        $sql = $this->query();

        $query = $this->pdo->prepare($sql);

        $query->execute($this->execute());

        return $query->fetch($mode);
    }

    /**
     * @param $mode
     * @return mixed
     */
    public function get($mode = PDO::FETCH_OBJ): mixed
    {
        $sql = $this->query();

        $query = $this->pdo->prepare($sql);

        $query->execute($this->execute());

        return $query->fetchAll($mode);
    }

    /**
     * @param  array  $insert
     * @return int
     */
    public function insert(array $insert): int
    {
        $sql = 'INSERT INTO '
            . $this->table
            . ' (' . implode(",", array_keys($insert))
            . ') VALUE ('
            . implode(',', array_fill(0, count($insert), '?'))
            . ')' ;

        $result = $this->pdo->prepare($sql);

        $result->execute(array_values($insert));

        return $this->pdo->lastInsertId();
    }

    /**
     * @param  array  $update
     * @return bool
     */
    public function update(array $update): bool
    {
        $sql = 'UPDATE ' . $this->table . ' SET ' . implode("=?,", array_keys($update)) . '=?';

        $sql .= $this->processingWhere();

        $result = $this->pdo->prepare($sql);

        return $result->execute(array_merge(array_values($update), $this->execute()));
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        $sql = 'DELETE FROM ' . $this->table;

        $sql .= $this->processingWhere();

        $result = $this->pdo->prepare($sql);

        return $result->execute($this->execute());
    }

    /**
     * @return string
     */
    private function query(): string
    {
        $sql = 'SELECT ' . $this->select . ' FROM ' . $this->table;

        $sql .= $this->processingWhere();

        $sql .= $this->orderBy;

        $sql .= $this->limit;

        return $sql;
    }

    /**
     * @return \core\PDO|PDO|null
     */
    public static function init()
    {
        return Connector::init();
    }

    /**
     * @return string
     */
    private function processingWhere(): string
    {
        $sql = '';

        if (count($this->where)){
            $sql .= ' WHERE';
        }

        foreach ($this->where as $key => $item){
            if ($key === 0){
                $sql .= ' ' . $item['column'] . ' ' . $item['operator'] . ' ?';
            }else{
                $sql .= ' ' . $item['type'] . ' ' . $item['column'] . ' ' . $item['operator'] . ' ?';
            }
        }

        return $sql;
    }

    /**
     * @return array
     */
    private function execute(): array
    {
        $execute = [];

        foreach ($this->where as $item){
            $execute[] = $item['value'];
        }

        return $execute;
    }

}
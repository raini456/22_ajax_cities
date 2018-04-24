<?php

require_once './classes/DbClass.php';

class DbClassExt extends DbClass {

  /**
   * @var string $columns: Tabellen angeben, mit Komma getrennt
   * @var string $statement: SELECT-Statement wie z.B. * oder DISTINCT
   * @var string $orderBy: Ordnungsparameter
   * @var string $sort: ASC oder DESC, default ist ASC
   */
  private $columns = '*';
  private $statement = '';
  private $orderBy = '';
  private $where = '';
  private $groupBy = '';

  /**
   * 
   * @param string $cols Eingabe der Spalte()
   */
  public function setWhere(string $where) {
    $this->where = $where;
  }

  public function setGroupBy(string $param) {
    $this->groupBy = $param;
  }

  public function setColumns(string $cols) {
    $this->columns = $cols;
  }

  /**
   * @param string $stmt: Eingabe des Statements wie z.B. DISTINCT für eine Query 
   */
  public function setStatement(string $stmt) {
    $this->statement = $stmt;
  }

  /**
   * 
   * @param string $stmt: Eingabe des Statements wie z.B. id ASC, name DESC für eine Query
   */
  public function setOrderBy(string $stmt) {
    $this->orderBy = $stmt;
  }

  public function getData(string $columns = '*', string $statement = '', string $orderBy = '', string $sort = '') {

    $o = ($this->orderBy !== '') ? ' ORDER BY ' . $this->orderBy : '';
    $w = ($this->where !== '') ? ' WHERE ' . $this->where : '';
    $g = ($this->groupBy !== '') ? ' GROUP BY ' . $this->groupBy : '';
    $query = sprintf('SELECT %s %s FROM %s %s %s %s', $this->statement, $this->columns, $this->tableName, $w, $g, $o);
    $stmt = $this->query($query);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  public function insertArray(array $data = []) {
    $keys = array_keys($data);
    $amountValues = count($data[$keys[0]]);
    for ($i = 0; $i < $amountValues; $i++) {
      $tmp = [];
      for ($j = 0; $j < count($keys); $j++) {
        $tmp[$keys[$j]] = $data[$keys[$j]][$i];
      }
      $this->insert($tmp);
    }
  }

}

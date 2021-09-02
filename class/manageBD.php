<?php
/**

 **/
class manageBD
{
	//Variables que controlan la interacción con la Base de datos.
	private $pdo; 
	private $table; 
	private $column;


	//Contructor
	function __CONSTRUCT(PDO $pdo, $table, $column)
	{
		$this->pdo = $pdo;
		$this->table = $table;
		$this->column = $column;
	}

	//Ejecución de las secuencias sql
	private function query($sql, $parametros = [])
	{
		$query = $this->pdo->prepare($sql);
		$query->execute($parametros);
		return $query;
	}

	////////--Comandos de administración de la base de datos--////////
	//////////////////////////////////////////////////////////

	//
	public function delete($id)
	{
		$parameters = [':id' => $id];
		$this->query('DELETE FROM `' . $this->table . '` WHERE
		`' . $this->column . '` = :id', $parameters);
	}

	//
	public function insert($column)
	{
		$query = 'INSERT INTO `' . $this->table . '` (';
		foreach ($column as $key => $valor) {
			$query .= '`' . $key . '`,';
		}
		$query = rtrim($query, ',');
		$query .= ') VALUES (';
		foreach ($column as $key => $valor) {
			$query .= ':' . $key . ',';
		}
		$query = rtrim($query, ',');
		$query .= ')';
		$column = $this->processdate($column);
		$this->query($query, $column);
	}

	//
	public function update($column) {/*actualizar*/
		$query = ' UPDATE `' . $this->table .'` SET ';
		foreach ($column as $key => $valor) {
			$query .= '`' . $key . '` = :' . $key . ',';
		}
		$query = rtrim($query, ',');
		$query .= ' WHERE `' . $this->column . '`
		= :column';
		// Set the :column variable
		$column['column'] = array_shift(array_values($column));
		$column = $this->processdate($column);
		$this->query($query, $column);
	}

	//
	private function processdate($column)
	{
		foreach ($column as $key => $valor) {
			if ($valor instanceof DateTime) {
			$column[$key] = $valor->format('Y-m-d');
			}
		}
	return $column;

	}
}
?>
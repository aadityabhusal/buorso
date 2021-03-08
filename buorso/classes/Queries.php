<?php 
/**
 * 
 */
class Queries extends Database
{
	public $table;
	public function __construct($table)
	{
		$this->table = $table;
	}

	function select($fields, $field, $value, $condition){
		$sql = "SELECT $fields FROM $this->table WHERE $field = :value $condition";
		$query = $this->connect()->prepare($sql);
		$query->bindValue(':value', $value);
		$query->execute();
		return $query;
	}

	function insert($formData){
		$keys = array_keys($formData);
	    $fields = implode(', ', $keys);
	    $fieldsBind = implode(', :', $keys);
		$sql = "INSERT INTO `$this->table`($fields) VALUES(:$fieldsBind)";
	    $query = $this->connect()->prepare($sql);
	    $query->execute($formData);
	    return $query;
	}

	// Needs Change - Week 12 Update Function
	function update($formData, $pk, $pkValue){
		$keys = [];
    	foreach ($formData as $key => $value) {
    		$keys[] = $key.' = :'.$key;
    	}
    	$keyList = implode(', ', $keys);
		$sql = "UPDATE `$this->table` SET $keyList WHERE $pk = $pkValue"; //Binding pkValue
	    $query = $this->connect()->prepare($sql);
	    // $query->bindValue(':pkValue', $pkValue);
	    $query->execute($formData);
	    return $query;
	}

	function delete($field,$value){
		$sql = "DELETE FROM $this->table WHERE $field = :value";
		$values = array(
			'value' => $value
		);
		$query = $this->connect()->prepare($sql);
		$query->execute($values);
		return $query;
	}

}
 ?>
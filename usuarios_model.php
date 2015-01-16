<?php 

require_once('db_abstract_model.php');

class Usuario extends DBAbstractModel
{
	public $nombre;
	public $apellido;
	public $email;
	private $clave;
	protected $id;

	function __construct()
	{
		$this->db_name = 'mvc';
	}

	function __destruct()
	{
		unset($this);
	}

	// SELECT
	public function get($user_email='')
	{
		if( $user_email != '' ):
			$this->query = "
			SELECT id, nombre, apellido, email, clave
			FROM usuarios
			WHERE email = '$user_email'
			";
			$this->get_results_from_query();
		endif;

		if ( count($this->rows) == 1 ):
			foreach( $this->rows[0] as $propiedad=>$valor):
				$this->$propiedad = $valor;
			endforeach;
		endif;
	}

	// INSERT
	public function set( $user_data=array() )
	{
		if( array_key_exists('email', $user_data)):

			// Consultamos si se encuentra 
			$this->get( $user_data['email']);
			// Si no se encuantra ejecutamos el INSERT
			if( $user_data['email'] != $ $this->email):

				foreach ( $user_data as $campo=>$valor ):
					$$campo = $valor;
				endforeach;
			

				$this->query = "
					INSERT INTO 	usuarios
					( nombre, apellido, email, clave )
					VALUES 
					( '$nombre', '$apellido', '$email', '$clave' )";
				$this->execute_single_query();
			endif;
		endif;
	}

	// EDIT
	public function edit( $user_data=array())
	{
		foreach ($user_data as $campo => $valor):
			$$campo = $valor;
		endforeach;

		$this->query = "
			UPDATE 	usuarios
			SET 	nombre='$nombre',
					apellido='$apellido',
					email='$email',
					clave=$clave
			WHERE 	email = '$email'
			";
		$this->execute_single_query();
	}

	// DELETE
	public function delete()
	{
		$this->query = "
			DELETE FROM 	usuarios
			WHERE 			email = '$user_email'
			";
			$this->execute_single_query();
	}
}

?>
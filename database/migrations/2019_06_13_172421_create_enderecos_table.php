<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnderecosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enderecos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('logradouro', 150);
			$table->string('complemento', 100)->nullable();
			$table->integer('numero');
			$table->string('bairro', 45);
			$table->string('cidade', 45);
			$table->string('estado', 42);
			$table->string('pais', 45);
			$table->string('cep', 45);
			$table->integer('clientes_id')->index('fk_endereco_clientes_idx');
			$table->primary(['id','clientes_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('enderecos');
	}

}

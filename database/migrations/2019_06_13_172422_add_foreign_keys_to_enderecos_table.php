<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEnderecosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enderecos', function(Blueprint $table)
		{
			$table->foreign('clientes_id', 'fk_endereco_clientes')->references('id')->on('clientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('enderecos', function(Blueprint $table)
		{
			$table->dropForeign('fk_endereco_clientes');
		});
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('email')->unique()->change();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->renameColumn('nama_lengkap', 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('email',45)->change();
            $table->dropColumn('email_verified_at');
            $table->dropColumn('password');
            $table->dropColumn('updated_at');
            $table->dropColumn('created_at');
            $table->dropColumn('remember_token');

            $table->renameColumn('name', 'nama_lengkap');
            $table->dropUnique('profiles_email_unique');
        });
    }
}

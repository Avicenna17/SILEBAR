<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama file
            $table->foreignId('folder_id')->constrained()->onDelete('cascade'); // ID folder
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID user yang membuat file
            $table->string('path'); // Menyimpan path file
            $table->string('detail')->nullable(); // Format file seperti .pdf, .doc
            $table->date('date')->nullable(); // Tanggal sesuai input
            $table->timestamps(); // Timestamp untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('files');
    }
}

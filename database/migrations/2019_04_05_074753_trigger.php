<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP TRIGGER IF EXISTS `supply_add`;CREATE DEFINER=`root`@`localhost` TRIGGER `supply_add` AFTER INSERT ON `supplies` FOR EACH ROW BEGIN UPDATE items SET items.total = items.total + new.total WHERE items.id = new.item_id; END");
        // DB::unprepared("DROP TRIGGER IF EXISTS `kurang_stok`;CREATE DEFINER=`root`@`localhost` TRIGGER `kurang_stok` AFTER INSERT ON `borrow_details` FOR EACH ROW BEGIN UPDATE items SET items.total = items.total - new.total WHERE items.id = new.item_id; END");

        // DB::unprepared("DROP PROCEDURE `item_today`; CREATE DEFINER=`root`@`localhost` PROCEDURE `item_today`() NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN SELECT * FROM items WHERE items.registration_date = CURDATE(); END");
        // DB::unprepared("DROP TRIGGER IF EXISTS `add_supply`;CREATE DEFINER=`root`@`localhost` TRIGGER `add_supply` AFTER INSERT ON `supplies` FOR EACH ROW BEGIN UPDATE items SET items.total = items.total + new.total WHERE items.id = supplies.item_id; END");
        // DB::unprepared("DROP TRIGGER IF EXISTS `add_to_cart`;CREATE DEFINER=`root`@`localhost` TRIGGER `add_to_cart` AFTER INSERT ON `borrow_details` FOR EACH ROW BEGIN UPDATE items SET items.total = items.total - new.total WHERE items.id = borrow_details.item_id; END");
        // DB::unprepared("DROP TRIGGER IF EXISTS `return_items`;CREATE DEFINER=`root`@`localhost` TRIGGER `return_items` AFTER UPDATE ON `borrow_details` FOR EACH ROW BEGIN UPDATE items SET items.total = items.total + new.total WHERE items.id = borrow_details.item_id; END");
        
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('borrows', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('employee_id')->references('id')->on('employees');
        });

        Schema::table('borrow_details', function (Blueprint $table) {
            $table->foreign('borrow_id')->references('id')->on('borrows');
            $table->foreign('item_id')->references('id')->on('items');

        });

        Schema::table('supplies', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('maintenances', function (Blueprint $table) {
            $table->foreign('borrow_id')->references('id')->on('borrows');
            $table->foreign('item_id')->references('id')->on('items');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

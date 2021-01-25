<?php

namespace Database\Migrations;

use Phoenix\Database\Element\Index;
use Phoenix\Migration\AbstractMigration;

class PaymentsMigration extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('payments')
            ->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('token', 'string')
            ->addColumn('payfast_id', 'string')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();
            /*$this->execute('CREATE TABLE `payments_table` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) NOT NULL,
                `email` varchar(255) NOT NULL,
                `token` varchar(255) NOT NULL,
                `payfast_id` varchar(255) NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NOT NULL,
                PRIMARY KEY (`id`),
                /*UNIQUE KEY `idx_payments_table_` (`url`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;'*/
        //);
    }

    protected function down(): void
    {   
        $this->table('payments')
            ->drop();
    }
}

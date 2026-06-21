<?php
require 'vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$tables = DB::select('SHOW TABLES');
$sql = "SET FOREIGN_KEY_CHECKS=0;\n\n";

foreach($tables as $tableInfo) {
    $table = (array) $tableInfo;
    $tableName = array_values($table)[0];
    
    // Dump schema
    $create = DB::select("SHOW CREATE TABLE `{$tableName}`")[0];
    $sql .= "DROP TABLE IF EXISTS `{$tableName}`;\n";
    $sql .= ((array)$create)['Create Table'] . ";\n\n";
    
    // Dump data
    $rows = DB::table($tableName)->get();
    foreach($rows as $row) {
        $row = (array) $row;
        $keys = array_keys($row);
        $values = array_values($row);
        
        $keysStr = '`' . implode('`, `', $keys) . '`';
        
        $escapedValues = array_map(function($val) {
            if ($val === null) return 'NULL';
            $val = addslashes($val);
            $val = str_replace("\n", "\\n", $val);
            $val = str_replace("\r", "\\r", $val);
            return "'{$val}'";
        }, $values);
        
        $valuesStr = implode(', ', $escapedValues);
        
        $sql .= "INSERT INTO `{$tableName}` ({$keysStr}) VALUES ({$valuesStr});\n";
    }
    $sql .= "\n\n";
}

$sql .= "SET FOREIGN_KEY_CHECKS=1;\n";

file_put_contents(__DIR__.'/portal_smkknbi_backup.sql', $sql);
echo "Database dumped successfully with foreign key checks disabled!\n";

<?php
define("DS",DIRECTORY_SEPARATOR);
include dirname(dirname(__FILE__)) . DS . 'configs/app.php';
include APP_BASE_DIR . DS . 'functions' . DS . "db.php";
$db_dir = APP_BASE_DIR . DS . 'databases';
$migrations_files_dir = APP_BASE_DIR . DS . 'databases'.DS."tables_migrations";
$pdo = getPdo();
function migrate_file($pdo,$file_name,$file_path){
    echo "Migration de ".$file_name ."  ... \n";
    echo "----------------------------------------------\n";
    if (is_file($file_name)) {
        $pdo->exec(file_get_contents($file_path));
    }
    echo "Migration de  $file_name Terminer \n";
}

function migrate_tables_file($pdo,$migrations_files_dir){
    foreach ( scandir($migrations_files_dir) as $file_name ){
        migrate_file($pdo,$file_name,$migrations_files_dir.DS.$file_name);
    }
}
function migrate_create_database_file($pdo,$db_dir){
    migrate_file($pdo,"create_database.sql",$db_dir.DS."create_database.sql");
}

echo "== Migration de la Base de donnees de " . APP_NAME . " ==\n";
if (!empty($argv[1]) AND $argv[1] === "migrate-db-and-tables" ){
    migrate_create_database_file($pdo,$db_dir);
    migrate_tables_file($pdo,$migrations_files_dir);
    exit();
}
if (!empty($argv[1]) AND $argv[1] === "migrate-tables" ){
    migrate_tables_file($pdo,$migrations_files_dir);
    exit();
}
do {
    $create_db = (int)readline("1 -> Creer la base de donnees et les tables \n2 -> Ne pas creer la base de donnees et creer les tables \n\n ");
    if ($create_db !== 1 AND $create_db !== 2) {
        echo "**Vous devez choisie entre les different selection**\n";
    }
} while ($create_db !== 1 AND $create_db !== 2);

if ($create_db === 1) {
    migrate_create_database_file($pdo,$db_dir);
    migrate_tables_file($pdo,$migrations_files_dir);
}
if ($create_db === 2) {
    migrate_tables_file($pdo,$migrations_files_dir);
}






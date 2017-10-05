<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1:3307;dbname=yii2basic',
    'username' => 'root',
    'password' => 'hello12345',
    'charset' => 'utf8',
    'enableSchemaCache' => true,

	// Duration of schema cache.
    'schemaCacheDuration' => 3600,
	// Name of the cache component used to store schema information
    'schemaCache' => 'cache',
];

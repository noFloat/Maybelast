<?php

return array(
    'URL_HTML_SUFFIX' => '',
    'URL_CASE_INSENSITIVE' =>true,
    'DEFAULT_FILTER' => 'strip_tags,htmlspecialchars,trim',//过滤
    'APP_DEBUG' => true, // 开启调试模式
    'db_type'  => 'mysql',
    'db_user'  => 'root',
    'db_pwd'   => '',
    'db_host'  => 'localhost',
    'db_port'  => '3306',
    'db_name'  => 'backcont',
    'DB_PREFIX'    =>  'back_',     // 数据库表前缀
    'DB_DSN'       =>  '',     // 数据库连接DSN 用于PDO方式
    'DB_CHARSET'   =>  'utf8', // 数据库的编码 默认为utf8
    '__PUBLIC__'=>'',
    'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true
    'DATA_CACHE_TIME'       => '0',      // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS'   => false,   // 数据缓存是否压缩缓存
    'DATA_CACHE_CHECK'      => false,   // 数据缓存是否校验缓存
    'DATA_CACHE_PREFIX'     => '',     // 缓存前缀
    'DATA_CACHE_TYPE'       => 'Redis',  // 数据缓存类型,
    /*Redis设置*/  
    'REDIS_HOST'            => '127.0.0.1', //主机  
    'REDIS_PORT'            => '6379', //端口  
    'REDIS_CTYPE'           => 1, //连接类型 1:普通连接 2:长连接  
    'REDIS_TIMEOUT'         => 0, //连接超时时间(S) 0:永不超时 
);
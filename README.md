# CsvExport
http分块导出csv

利用http chunk技术，分批导出，减少内存占用！

## composer
> composer require klauspeng/csv_export

## 使用
```php
<?php
use klauspeng\csv_export;

require './vendor/autoload.php';

// 初始化，命名
$csv = new csv_export('导出测试' . '_' . date('YmdHis'));

// 表头
$colums = ['a列', 'b列'];
$csv->setDate($colums, 0);

// 数据
$date[] = [1,2];
$date[] = [3,4];
$csv->setDate($date);
```
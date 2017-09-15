<?php

namespace klauspeng;

/**
*CSV分块导出
*/
class csv_export
{
    // 每次查询数量
    public $pre_count = 5000;
    // PHP文件句柄
    private $fp = null;

    /**
     * csv-export constructor.
     *
     * @param $name 文件名字（默认export）
     */
    public function __construct($name = 'export')
    {
         // 打开输出控制缓冲
        ob_start();

        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:filename=" . iconv("UTF-8", "GB18030", $name) . ".csv");

        // 打开PHP文件句柄
        $this->fp || $this->fp = fopen('php://output', 'a');
    }

    /**
     * 设置输出数据
     * @param     $data              数组
     * @param int $isDoubleDimension 是否为二维数组（默认是）
     */
    public function setDate(array $data,$isDoubleDimension = 1)
    {
        if ($isDoubleDimension)
        {
            foreach ($data as $item)
            {
                $rows = array();
                foreach ($item as &$export_obj)
                {
                    $rows[] = iconv('utf-8', 'GB18030', $export_obj);
                }
                fputcsv($this->fp, $rows);
            }
            unset($export_data);
        }
        else
        {
            $rows = array();
            foreach ($data as &$d)
            {
                $rows[] = iconv('utf-8', 'GB18030', $d);
            }
            unset($d);
            fputcsv($this->fp, $rows);
        }

        // http分块输出
        ob_flush();
        flush();

    }
}

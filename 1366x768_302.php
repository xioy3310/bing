<?php
error_reporting(0); // 完全禁用错误显示
header('Content-Type: image/jpeg');
header('Cache-Control: public, max-age=3600'); // 1小时缓存
header('Expires: '.gmdate('D, d M Y H:i:s', time() + 3600).' GMT');

// 检查内存缓存
$cacheKey = 'bing_1366x768302_'.date('Ymd');
if (function_exists('apcu_exists') && apcu_exists($cacheKey)) {
    $cachedUrl = apcu_fetch($cacheKey);
    header('Location: '.$cachedUrl, true, 302);
    exit;
}

try {
    // 初始化cURL
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1&mkt=zh-CN',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['Accept: application/json'],
        CURLOPT_SSL_VERIFYHOST => false, // 生产环境建议开启
        CURLOPT_SSL_VERIFYPEER => false, // 生产环境建议开启
        CURLOPT_TIMEOUT => 10,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_FOLLOWLOCATION => true
    ]);

    // 获取Bing API数据
    $response = curl_exec($ch);
    if (!$response || curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
        throw new Exception();
    }
    
    // 解析数据
    $data = json_decode($response);
    if (!$data || !isset($data->images[0]->urlbase)) {
        throw new Exception();
    }
    
    // 构建图片URL
    $imageUrl = 'https://cn.bing.com'.$data->images[0]->urlbase.'_1366x768.jpg';
    
    // 验证URL格式
    if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
        throw new Exception();
    }
    
    // 缓存URL
    if (function_exists('apcu_store')) {
        apcu_store($cacheKey, $imageUrl, 3600);
    }
    
    // 重定向到图片
    header('Location: '.$imageUrl, true, 302);
    exit;

} catch (Exception $e) {
	// 显示默认图片或空白
    $defaultImage = __DIR__.'/default.jpg';
    header('Location: '.$defaultImage, true, 302);
    exit;
}
?>
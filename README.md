# 项目介绍

Bing壁纸，是微软Bing搜索引擎推出的一项服务。每天都会推送高质量壁纸，壁纸源均来自世界各地的精美摄影作品。

Bing官方提供了壁纸获取接口，但是只能获取当日及过去7天的历史壁纸。壁纸一般会提供UHD超高清原图、1920x1080高清壁纸、1366x768普清壁纸、1080x1920竖版壁纸的规格。

本项目通过官方提供的API接口每天定时自动获取每日不同规格的壁纸，自动更新，并上传至云端保存。

# 使用演示

Bing今天1366x768规格的壁纸（302跳转直链显示方式）。
<center><img width="500" src="https://api.tntsec.com/bing/1366x768_302.php"></center>

# 项目主页

Bing每日高清壁纸历史归档：[https://img.tntsec.com/](https://img.tntsec.com/)  
Bing每日高清壁纸开放API接口：[https://api.tntsec.com/bing](https://api.tntsec.com/bing)

Bing每日高清壁纸开放API接口使用说明文档：[https://blog.tntsec.com/index.php/archives/69.html](https://blog.tntsec.com/index.php/archives/69.html)

# 开源文件说明

本项目已在github开源，如果你喜欢的话可以为我的项目点点小心心：[https://github.com/xioy3310/bing](https://github.com/xioy3310/bing)

受[Bing](https://github.com/mike126126/bing/)项目启发才有了这个项目，原项目中没有UHD版本在本项目中已补充。

本项目面向生产环境专门优化了代码：
 * 如果在同一天内多次请求图片，优先从缓存中读取，避免重复请求和图片下载，提高了响应速度。
 * 禁用了所有错误显示，防止在生产环境中暴露敏感的错误信息，提高了系统的安全性。
 * 如果找不到图片，则会返回预设好的图片，提供了更好的用户体验。

每种分辨率都写了两种获取方式：服务器显示、302跳转直链显示

服务器显示方式会消耗大量的流量，速度会受服务器限制。建议优先使用302跳转直链显示方式，该方法是通过解析图片地址，直接跳转到Bing图片直链。不会消耗服务器流量，速度也不会受服务器限制，减少运营成本。

如果你不想自己部署，可以直接使用：[https://api.tntsec.com/bing/](https://api.tntsec.com/bing/)提供的API服务（302跳转直链显示方式）。

|  名称  |  作用  |
| :----- | :----- |
|UHD.php          |输出为3840×2160分辨率的图片|
|1366x768.php     |输出为1366×768分辨率的图片 |
|1920x1080.php    |输出为1920×1080分辨率的图片|
|1080x1920.php    |输出为1080×1920分辨率的图片|
|UHD_302.php      |输出为3840×2160分辨率的Bing直链图片|
|1366x768_302.php |输出为1366×768分辨率的Bing直链图片 |
|1920x1080_302.php|输出为1920×1080分辨率的Bing直链图片|
|1080x1920_302.php|输出为1080×1920分辨率的Bing直链图片|

# 接口使用方法

| 请求方式 | 作用 |
| :----- | :----- |
|[https://api.tntsec.com/bing/UHD_302.php](https://api.tntsec.com/bing/UHD_302.php)            |输出为3840×2160分辨率的Bing直链图片|
|[https://api.tntsec.com/bing/1366x768_302.php](https://api.tntsec.com/bing/1366x768_302.php)  |输出为1366×768分辨率的Bing直链图片 |
|[https://api.tntsec.com/bing/1920x1080_302.php](https://api.tntsec.com/bing/1920x1080_302.php)|输出为1920×1080分辨率的Bing直链图片|
|[https://api.tntsec.com/bing/1080x1920_302.php](https://api.tntsec.com/bing/1080x1920_302.php)|输出为1080×1920分辨率的Bing直链图片|

# 高质量壁纸获取

本站为了减少运营成本，站对外展示都是1366x768规格的壁纸。如果你想下载更高品质的壁纸，可以通过文章下面的[打包下载](https://www.123912.com/s/LAooTd-f2rPH)按钮来下载其他规格的壁纸。

<img align="center" width="500" src="https://wkcct.oss-cn-beijing.aliyuncs.com/blog/img2/20250418210009.png">
